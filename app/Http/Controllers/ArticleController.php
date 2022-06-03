<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Gene;
use App\Models\Sample;
use App\Models\Species;

class ArticleController extends Controller
{
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
}
