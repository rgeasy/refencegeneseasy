<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ArticleService;
use App\Models\Article;
use App\Models\Gene;
use App\Models\Sample;
use App\Models\Species;

class ArticleController extends Controller
{
    private $service;

    function __construct(ArticleService $service)
    {
        $this->service = $service;
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $species = Species::where('active',1)->get()->pluck(['name']);
        //dd($species);
        return view('articles.create', compact(['species']));
    }


    public function edit(Article $article)
    {
        $genes = Gene::where('article',$article->id)->get();
        $species = Species::where('id',$genes[1]->species)->first('name');

        $sample = Sample::where('article',$article->id)
                    ->get();

        $repeated_samples = array();
        $samples = array();

        array_push($repeated_samples, $sample);

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
        

        return view('articles.edit', compact(['species', 'genes','article','samples']));
    }

    public function update(Request $request, Article $article)
    {
        if($request->active  !== null && $request->active === "on")
        {
            $article->active = 1;
        }else
        {
            $article->active = 0;
        }

        $article->name = $request->name;
        $article->doi = $request->doi;
        $article->year = $request->year;
        $article->author = $request->author;
        $article->save();

        $message = trans('flash.article updated');

        return redirect()->route('admin')->with('message',$message);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        //dd($data);
        // Verficiar se espécie já existe
        $species = Species::where('name', $data['species'])->get();

        if($species->isEmpty())
        {
            $message = trans('validation.New Species');
            return back()->withErrors($message);
        }

        $data = $request->validate([
            'article' => 'required',
            'doi' => 'required',
            'species' => 'required',
            'year' => 'required',
            'authors' => 'required',
            'cq_area' => 'required',
            'gene_area' => 'required'
        ]);   

        $this->service->storeArticle($data);

        $message = trans('flash.article registered');

        return redirect()->route('species.index')->with('message',$message);
    }
}
