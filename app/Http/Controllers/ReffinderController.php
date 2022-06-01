<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sample;
use App\Models\Article;
use App\Models\Gene;
use App\Services\ReffinderService;
use Auth;

class ReffinderController extends Controller
{
    private $service;

    function __construct(ReffinderService $service)
    {
        $this->service = $service;
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $sample_names = $request->except(['_token','article']);

        $article = $request->article;
        $articleId = $request->only('article');

        $result = $this->service->compileData($article, $articleId,$sample_names);

        $html = $result[0];
        $genes = $result[1];
        $article = $result[2];
        $legacy = true;

        

        return view('reffinder.show', compact(['html','legacy','genes', 'article']));
    }

}

/*
"\t\t\tvar myData = new Array(['PP2A', 2.115],['RPL39', 2.913],['24S', 3.310],['CYCL', 3.663],['AP47', 4.356],['ACT', 4.356],['UBQ', 6.447],['14-3-3', 6.447],['APRT', 7.000],['EF1a', 9.188],['GAPDH', 9.457],['TUB-b', 11.242]);"
*/