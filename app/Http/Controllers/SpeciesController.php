<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ReffinderService;
use App\Services\SpeciesService;
use App\Models\Gene;
use App\Models\Species;
use App\Models\Article;
use App\Models\Sample;
use App\Enums\TipoGene;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use PDF;
use Intervention\Image\Facades\Image;

class SpeciesController extends Controller
{
    private $service;

    function __construct(ReffinderService $service, SpeciesService $speciesService)
    {
        $this->service = $service;
        $this->speciesService = $speciesService;
        //$this->middleware('auth',['except' => ['ativar']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Species::where('tipo', TipoGene::ANIMAL()->value)->where('active', 1)->paginate(15);
        $vegetables = Species::where('tipo', TipoGene::VEGETAL()->value)->where('active', 1)->paginate(15);
        $microorganisms = Species::where('tipo', TipoGene::MICROORGANSIM()->value)->where('active', 1)->paginate(15);

        //dd($vegetables);
        return view('species.index', compact(['animals','vegetables', 'microorganisms']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('species.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $data = $request->validate([
            'accession' => 'required',
            'article' => 'required',
            'bank' => 'required',
            'doi' => 'required',
            'e' => 'required',
            'genes' => 'required',
            'primer_forward' => 'required',
            'primer_reverse' => 'required',
            'r2' => 'required',
            'selected_species' => 'required',
            'species' => 'required',
            'year' => 'required',
            'tipo' => 'required',
            'authors' => 'required',
            'cq_area' => 'required',
            'file' => 'required'
        ]);

        

        $this->speciesService->storeSpecies($data);

        $message = trans('flash.species registered');

        return redirect()->route('species.index')->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Species $species)
    {
        $genes = Gene::where('species',$species->id)->get();

        $article_ids = Gene::where('species',$species->id)->distinct()
                    ->get('article')
                    ->pluck('article');

        $genes = [];
        $articles = [];
        $repeated_samples = [];
        $samples = [];
        
        
        
        $article_ids = Article::whereIn('id',$article_ids)
                    ->where('active',1)
                    ->pluck('id');


        foreach ($article_ids as $id)
        {
            $gene = Gene::where('species',$species->id)
                        ->where('article',$id)->get();
            array_push($genes, $gene);

            $sample = Sample::where('article','=',$id)
                        ->get();

            array_push($repeated_samples, $sample);

            $article = Article::where('id',$id)
                            ->get(['name','id']) //,'pdf'
                            ->first();
            array_push($articles,$article);
        }
        //dd($articles);
        for ($i=0; $i < sizeof($repeated_samples); $i++)
        {
            $sample_collection = [];
            $rs = $repeated_samples[$i];
            //dd($rs);
            foreach ($rs as $key => $sample)//$s as in sample
            {
                if ($key === 0)
                {
                    array_push($sample_collection, $sample);
                }
                else
                {
                    $k = count($sample_collection)-1;

                    if($sample_collection[$k]->name
                        !=
                        $sample->name)
                    {
                        array_push($sample_collection, $sample);
                    }
                }
            }
            array_push($samples, $sample_collection);
        }

        //dd($samples);
        /*dd($repeated_samples);*/
        //PUXAR SAMPLES A PARTIR DOS CTS E COLUNAS E MOSTRAR NOME DO ARTIGO E NÃO ID
        //$samples = Sample::where('article',$genes->)
        //dd($samples[0][0]->article);
        //dd($articles[0]->pdf);
        //dd($genes);
        return view('species.show', compact(['species', 'genes','articles','samples']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Species $species)
    {
        //dd($species);
        return view('species.edit', compact(['species']));
    }

    public function editar()
    {
        $user = Auth::user();

        if($user->can('edit species'))
        {
            $species = Species::all();
        }else
        {
            $article_ids = Article::where('user',$user->id)->get()->pluck('id');
            $species = array();
            for($i = 0; $i < sizeof($article_ids); $i++)
            {
                $genes = Gene::where('article', $article_ids[$i])->first();
                array_push($species,$genes->species);
            }

            $species = Species::where('id', $species)->get();
        }

        //dd($species);

        return view('species.editar', compact(['species']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Species $species)
    {
        //dd($request->tipo );
        if($request->file('file'))
        {
            $file = $request->file('file');
            $full_name = $file->getClientOriginalName();
            $filename = pathinfo($full_name, PATHINFO_FILENAME);
            $extension = pathinfo($full_name, PATHINFO_EXTENSION);
            $time = Carbon::now()->toDateTimeString();

            $path = 'storage/images/'.$filename.'_'.$time.'.'.$extension;

            $image = Image::make($file);
            $image->resize(75, 75);
            $image->save(public_path($path));

            if (isset($species->realpath))
            {
                Storage::delete($species->realpath);
            }

            $species->image = $filename.'.'.$extension;
            $species->realpath = $path;
        }

        //if(Auth::user()->can('edit species') && isset($request->active))
        if($request->active  !== null && $request->active === "on")
        {
            $species->active = 1;
        }

        $species->name = $request->name;
        if($request->tipo != "-1")
            $species->tipo = $request->tipo;

            

        $species->save();

        $message = trans('flash.species updated');

        return redirect()->route('species.index')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Species $species)
    {
        //dd("uddiiiididi");
        try
        {
            $species->delete();
            return response()->json(['Certo'],200);
        }catch (\Exception $e)
        {
            return response()->json(['Usuário Não Encontrado'],400);
        }
    }

    public function activate()
    {
        //$species = Species::where('active', 0)->get();
        $articles = Article::where('active', 0)->get();
        //dd($articles);

        
        return view('articles.activate', compact(['articles']));
    }

    public function ativar(Request $request)
    {
        try
        {
            $article = Article::findOrFail($request->id);
            $article->active = 1;
            $article->save();
            
            $genes = Gene::where('article',$request->id)
                            ->first('species');
            
            $species = Species::findOrFail($genes->species);
            $species->active = 1;
            $species->save();
            
            return response()->json(['Certo'],200);
        }catch (\Exception $e)
        {
            return response()->json([$e->getMessage()],400);
        }
    }

}


/*
    public function activate()
    {
        $articles = Article::where('active', 0)->get();
        return view('articles.activate', compact(['articles']));
    }

    public function ativar(Request $request)
    {
        try
        {
            $articles = Article::findOrFail($request->id);
            $articles->active = 1;
            $articles->save();
            return response()->json(['Certo'],200);
        }catch (\Exception $e)
        {
            return response()->json(['Usuário Não Encontrado'],400);
        }
    }
*/