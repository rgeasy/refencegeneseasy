<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Species;

class SpeciesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$species=[
			['name' => 'Apis Cerana',
			 'tipo' => 1],
			['name' => 'Apis Cordata',
			'tipo' => 1]	
		];

		foreach ($species as $key=>$value)
		{
			Species::create($value);
		}
	}
}