<?php

namespace App\Services;

use App\Models\Sample;
use App\Models\Article;
use App\Models\Gene;
use App\Models\Species;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Intervention\Image\ImageManagerStatic as Image;

class SpeciesService
{
	public function storeSpecies($data)
	{
        $species = explode(',', $data['species']);

        /* Tratamento de Imagens */
        $file = $data['file'];

        if($file)
        {
            $full_name = $file->getClientOriginalName();
            $filename = pathinfo($full_name, PATHINFO_FILENAME);
            $extension = pathinfo($full_name, PATHINFO_EXTENSION);
            $time = Carbon::now()->toDateTimeString();

            

            $path = 'storage/images/'.$filename.'_'.$time.'.'.$extension;
            //dd(public_path($path));
            //dd(gd_info());
            $image = Image::make($file);
            $image->resize(75, 75);
            $image->save(public_path($path));
        }

        if (is_string($species))
        {
            $species = array($species);
        }   
     

        for ($i=0; $i < sizeof($species); $i++)
        {
            $species[$i] = ltrim($species[$i]);
            $species[$i] = rtrim($species[$i]);

            if (!Species::where('name','=',strtolower($species[$i]))->exists())
            {
                $new_species = Species::create(['name' => strtolower($species[$i]), 'tipo' => $data['tipo'][$i]]);
                $new_species->image = $filename.'.'.$extension;
                $new_species->realpath = $path;
                $new_species->save();
            }
        }

        $authors = explode(",", $data['authors']);
        
        $full_name = explode(" ", $authors[0]);
        $citation = ucfirst($full_name[count($full_name)-1]);
           
        if (count($authors) > 1)
        {
            $citation = $citation . ", et al.";  
        }

        $article = new Article();
        $article->name = $data['article'];
        $article->doi = $data['doi'];
        $article->year = $data['year'];
        $article->user = 1; //Auth::user()->id;
        $article->author = $citation;
        $article->save();

        $samples_cqs = str_replace("\r\n","\t",$data['cq_area']);
        $samples_cqs = explode("\t",$samples_cqs);
        $samples_cqs = array_chunk($samples_cqs, sizeof($data['genes']));


        for ($i=0; $i <  sizeof($samples_cqs) ; $i++)
        {
            $samples = new Sample();
            $samples->article = $article->id;
            $samples_cqs[$i][0] = ltrim($samples_cqs[$i][0],"__");
            $samples_cqs[$i][0] = rtrim($samples_cqs[$i][0],"__");
            $samples->values = join(" ",$samples_cqs[$i]);
            $samples->name = $samples_cqs[$i][0];
            $samples->save();
        }

        //dd($samples);

        for ($i=0; $i < sizeof($data['primer_forward']); $i++)
        {
            //dd($data);
            $gene = new Gene();
            $gene->name = $data['genes'][$i+1];
            $gene->bank = $data['bank'][$i];
            $gene->e = $data['e'][$i];
            $gene->primer_forward = $data['primer_forward'][$i];
            $gene->primer_reverse = $data['primer_reverse'][$i];
            $gene->r2 = $data['r2'][$i];
            $gene->article = $article->id;
            $gene->accession = $data['accession'][$i];
            $species_index = $data['selected_species'][$i];
            $species_name = strtoupper($species[$species_index]);
            $selected_species = Species::where('name', '=',$species_name )->first();
            $gene->species = $selected_species->id;

            $gene->save();
        }
	}
}