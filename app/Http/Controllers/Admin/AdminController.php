<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Species;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $adminIds = DB::table('model_has_roles')->get('model_id')->pluck('model_id')->toArray();
        $admins = User::findMany($adminIds,['id','name']);
        $users = User::whereNotIn('id', $adminIds)->paginate(15);


        return view('admin.index', compact(['users','admins']));
    }

    public function species()
    {
        $species = Species::paginate(15,['id','name','active']);
        
        return view('admin.species', compact(['species']));
    }

    public function articles()
    {
        $articles = Article::paginate(15,['id','name','active']);
        return view('admin.articles', compact(['articles']));
    }

}
