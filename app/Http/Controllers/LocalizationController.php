<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class LocalizationController extends Controller
{
    public function index($locale)
    {
        App::setlocale($locale);
        session()->put('locale', $locale);
        return redirect('language');
    }

    public function language()
    {
        $url = config('app.url');
        $url = $url."/";
    	return view('home.language',compact('url'));
    }
}
