<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gene;

class GenesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$genes=[
			['name' => '24S',
			 'bank' => 'genbank',
			 'e' => 1536,
			 'primer_forward' => 'AAAAAAAAA',
			 'primer_reverse' => 'BBBBBBBBB',
			 'r2' => 38777,
			 'article' => 1,
			 'accession' => 100,
			 'species' => 1],
			['name' => 'ACT',
			 'bank' => 'genbank',
			 'e' => 1536,
			 'primer_forward' => 'AAAAAAAAA',
			 'primer_reverse' => 'BBBBBBBBB',
			 'r2' => 38777,
			 'article' => 1,
			 'accession' => 100,
			 'species' => 1],
			 ['name' => 'GAPDH',
			 'bank' => 'genbank',
			 'e' => 1536,
			 'primer_forward' => 'AAAAAAAAA',
			 'primer_reverse' => 'BBBBBBBBB',
			 'r2' => 38777,
			 'article' => 1,
			 'accession' => 100,
			 'species' => 1],
			 ['name' => 'CYCL',
			 'bank' => 'genbank',
			 'e' => 1536,
			 'primer_forward' => 'AAAAAAAAA',
			 'primer_reverse' => 'BBBBBBBBB',
			 'r2' => 38777,
			 'article' => 1,
			 'accession' => 100,
			 'species' => 1],
			 ['name' => 'EF1a',
			 'bank' => 'genbank',
			 'e' => 1536,
			 'primer_forward' => 'AAAAAAAAA',
			 'primer_reverse' => 'BBBBBBBBB',
			 'r2' => 38777,
			 'article' => 1,
			 'accession' => 100,
			 'species' => 1],
			 ['name' => 'TUB-b',
			 'bank' => 'genbank',
			 'e' => 1536,
			 'primer_forward' => 'AAAAAAAAA',
			 'primer_reverse' => 'BBBBBBBBB',
			 'r2' => 38777,
			 'article' => 1,
			 'accession' => 100,
			 'species' => 1],
			 ['name' => 'PP2A',
			 'bank' => 'genbank',
			 'e' => 1536,
			 'primer_forward' => 'AAAAAAAAA',
			 'primer_reverse' => 'BBBBBBBBB',
			 'r2' => 38777,
			 'article' => 1,
			 'accession' => 100,
			 'species' => 1],
			 ['name' => 'AP47',
			 'bank' => 'genbank',
			 'e' => 1536,
			 'primer_forward' => 'AAAAAAAAA',
			 'primer_reverse' => 'BBBBBBBBB',
			 'r2' => 38777,
			 'article' => 1,
			 'accession' => 100,
			 'species' => 1],
			 ['name' => 'RPL39',
			 'bank' => 'genbank',
			 'e' => 1536,
			 'primer_forward' => 'AAAAAAAAA',
			 'primer_reverse' => 'BBBBBBBBB',
			 'r2' => 38777,
			 'article' => 1,
			 'accession' => 100,
			 'species' => 1],
			 ['name' => 'APRT',
			 'bank' => 'genbank',
			 'e' => 1536,
			 'primer_forward' => 'AAAAAAAAA',
			 'primer_reverse' => 'BBBBBBBBB',
			 'r2' => 38777,
			 'article' => 1,
			 'accession' => 100,
			 'species' => 1],
			 ['name' => 'UBQ',
			 'bank' => 'genbank',
			 'e' => 1536,
			 'primer_forward' => 'AAAAAAAAA',
			 'primer_reverse' => 'BBBBBBBBB',
			 'r2' => 38777,
			 'article' => 1,
			 'accession' => 100,
			 'species' => 1],
			 ['name' => '14-3-3',
			 'bank' => 'genbank',
			 'e' => 1536,
			 'primer_forward' => 'AAAAAAAAA',
			 'primer_reverse' => 'BBBBBBBBB',
			 'r2' => 38777,
			 'article' => 1,
			 'accession' => 100,
			 'species' => 1]
		];

		foreach ($genes as $key=>$value)
		{
			Gene::create($value);
		}
	}
}