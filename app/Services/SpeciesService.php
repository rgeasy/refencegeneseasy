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
        //dd($data);
        $file = $data['file'];

        $genes = $this->getGeneNames($data['cq_area']);
        
        $this->saveImage($file);

        $this->saveSpecies($data['species'],$file, $data['tipo'],$data['image_citation']);

        $article = $this->saveArticle($data);

        $this->saveSamples($data['cq_area'],$article->id,$genes);

        $this->saveGenes($data['gene_area'], $article->id,$data['species'],$genes);

	}


    private function saveImage($file)
    {
        if($file)
        {
            $full_name = $file->getClientOriginalName();
            $filename = pathinfo($full_name, PATHINFO_FILENAME);
            $extension = pathinfo($full_name, PATHINFO_EXTENSION);
            $time = Carbon::now()->toDateTimeString();

            $path = 'storage/images/'.$filename.'_'.$time.'.'.$extension;
            
            if(!is_dir(public_path("storage/images")))
            {
                mkdir(public_path("storage/images"), 0777, true);
            }

            $image = Image::make($file);
            $image->resize(75, 75);
            $image->save(public_path($path));
        }
    }

    private function saveSpecies($species,$file,$tipo,$image_citation)
    {
        $full_name = $file->getClientOriginalName();
        $filename = pathinfo($full_name, PATHINFO_FILENAME);
        $extension = pathinfo($full_name, PATHINFO_EXTENSION);
        $time = Carbon::now()->toDateTimeString();
        $path = 'storage/images/'.$filename.'_'.$time.'.'.$extension;

        //Tratando o nome da espécie, removendo espaços no fim e começo da string
        $species = ltrim($species);
        $species = rtrim($species);

        if (!Species::where('name','=',strtolower($species))->exists())
        {
            $new_species = Species::create(['name' => strtolower($species), 'tipo' => $tipo]);
            $new_species->image = $filename.'.'.$extension;
            $new_species->realpath = $path;
            $new_species->image_citation = $image_citation;
            $new_species->save();
        }
    }

    private function saveArticle($data)
    {
        $authors = explode(",", $data['authors']);

        $full_name = explode(" ", $authors[0]);
        $citation = ucfirst($full_name[count($full_name)-1]);

        if (count($authors) > 1)
        {
            $citation = $citation . " et al.";  
        }

        $article = new Article();
        $article->name = $data['article'];
        $article->doi = $data['doi'];
        $article->year = $data['year'];
        $article->user = 1; //Auth::user()->id;
        $article->author = $citation;
        $article->save();

        return $article;
    }

    private function saveSamples($cqs, $article,$genes)
    {
        //Salvando amostras e removendo os genes do Gene Area
        $samples_cqs = explode("\n",$cqs);
        $removed_sample = array_shift($samples_cqs);
        //dd($samples_cqs);

        for ($i=0; $i <  sizeof($samples_cqs) ; $i++)
        {
            $samplex = str_replace("\r\n","",$samples_cqs[$i]);
            $samplex = str_replace("\r","",$samplex);
            $samplex = str_replace(" ","__",$samplex);
            $samplex = ltrim($samplex,"__");
            $samplex = rtrim($samplex,"__");
            $samplex =  str_replace("\t"," ",$samplex);

            $sample = new Sample();
            $sample->article = $article;
            $sample->values = $samplex;
            //dump($samplex)
            $sample_name = explode(" ", $samplex);
            $sample->name = $sample_name[0];
            $sample->save();
        }

        //dd($samples_cqs);
    }

    private function saveGenes($gene_area,$article,$species,$genes)
    {
        $genes_data = explode("\n",$gene_area);
        $removed_sample = array_shift($genes_data);
        //dd($genes_data);
        for ($i=0; $i < sizeof($genes_data); $i++)
        {
            $gene_data = str_replace("\r\n","",$genes_data[$i]);
            $gene_data = str_replace("\r","",$gene_data);
            $gene_data = explode("\t",$gene_data);

            $gene = new Gene();
            $gene->name = $gene_data[0];
            $gene->primer_forward = $gene_data[1];
            $gene->primer_reverse = $gene_data[2];
            $gene->r2 = $gene_data[3];
            $gene->e = $gene_data[4];
            $gene->accession = $gene_data[5];
            $gene->bank = $gene_data[6];
            $gene->article = $article;
            
            $selected_species = Species::where('name', '=',strtoupper($species) )->first();
            $gene->species = $selected_species->id;
            //dump($gene);
            $gene->save();
        }
        //dd($genes);
    }

    private function getGeneNames($cq_area)
    {

        $genes = explode("\n",$cq_area);
        $genes = $genes[0];
        $genes = str_replace("\r\n","",$genes);
        $genes = str_replace("\r","",$genes);
        $genes = explode("\t",$genes);
        $removed_sample = array_shift($genes);
        return $genes;
    }
}