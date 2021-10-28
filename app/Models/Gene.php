<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Gene extends Model
{
	protected $primaryKey = 'id';
	
    protected $fillable = ['name','species','primer_forward','primer_reverse','r2','e','accession', 'bank','article'];

	public function especie()
	{
		return $this->belongsTo('App\Models\Species');
	}

	public function getArtigoAttribute()
	{
		$name = Article::where('id',$this->article)
					->first();

		return $name->name;
	}	
}