<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
	protected $primaryKey = 'id';

	/*tipo é o tipo de espécie: 1 - animal ou 2 - vegetal - 3 microorganismo */
    protected $fillable = ['name', 'tipo','image','fullpath','active','image_citation'];

    public function genes()
    {
    	return $this->hasMany('App\Models\Gene','id');
    }
}
