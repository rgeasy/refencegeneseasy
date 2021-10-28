<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Sample extends Model
{
	protected $primaryKey = 'id';
	protected $appends = ['article_name'];

	protected $fillable = ['name','values','article'];
	
    public function eagle_article()
    {
    	return $this->belongsTo(Article::class,'id');
    }

    public function getDoiAttribute()
    {
    	$article = Article::where('id',$this->article)
    				->first();
    	return $article->doi;
    }

	public function getArticleNameAttribute()
    {
    	$article = Article::where('id',$this->article)
    				->first();
    	return $article->name;
    }    
}
