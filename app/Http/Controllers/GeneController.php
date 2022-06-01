<?php

namespace App\Http\Controllers;

use App\Models\Genes;
use Illuminate\Http\Request;
use App\Services\ReffinderService;


class GeneController extends Controller
{
    private $service;

    function __construct(ReffinderService $service)
    {
        $this->service = $service;
        //$this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('genes.create');
    }

}
