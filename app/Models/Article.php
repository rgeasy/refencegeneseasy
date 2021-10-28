<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $primaryKey = 'id';

    protected $fillable = ['name','doi','year', 'user','author', 'active']; //'pdf',

    public function sample()
    {
    	return $this->hasMany('App\Models\Sample', 'id');
    }

    public function userId()
    {
        return $this->hasOne('App\Models\User', 'id');
    }
}
