<?php

namespace App\Services;


use App\Models\Sample;
use App\Models\Article;
use App\Models\Gene;

use Config;

class ReffinderService
{
	public function generate($data)
	{
		$url = Config::get("app.api_url");
		//dd($url);

		$json = http_build_query(array('data' => $data));

		$opts = array('http' =>
		    array(
		        'method'  => 'POST',
		        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		        'content' => $json,
		        'timeout' => 500
		    )
		);

		$context  = stream_context_create($opts);

		$response = file_get_contents($url, false, $context);

		$result = json_decode($response, true);
		return $result;
	}

	function compileData($article,$articleId,$sample_names)
	{
        $samples = [];
        $samples = collect();

        foreach ($sample_names as $key => $sample)
        {
            $name = str_replace("op","",$sample);

            $s = Sample::where('name', '=' ,$name)
                    ->where('article', '=', $article)
                    ->get(['id','name','values']);/*->toArray()*/

            foreach ($s as $single_sample)
            {
                $samples->push($single_sample);
            }
        }

        
        $article = Article::find($articleId)->first();

        $unordered_genes = Gene::where('article', '=',$articleId)
                    ->get();
        $genes_line = join("\t", $unordered_genes->pluck('name')->toArray());

        $cq_data = $genes_line."\n";
        //$cq_data = "";


        foreach ($samples as $key => $sample)
        {
            $s = explode(" ",$sample->values,2);
            
            $s = str_replace(" ", "\t", $s[1]);
            
            if (intval($key) == (count($samples)-1))
            {
                $cq_data = $cq_data.$s;
            }else
            {
                $cq_data = $cq_data.$s."\n";
            }
        }

        //dd($cq_data);

        $result = $this->generate($cq_data);

        $html = $result['html'];
        $html = utf8_encode($html);

        $genes = array();

        //dd(['genes' => $result['genes'], 'unordered_genes' => $unordered_genes]);
        $unordered_genes_names = $unordered_genes->pluck('name')->toArray();
        for ($i=0; $i < sizeof($unordered_genes); $i++) 
        {
            $position = array_search($result['genes'][$i], $unordered_genes_names); //$unordered_genes[$i]['name']
            array_push($genes, $unordered_genes[$position]); 
        }

        return array($html, $genes, $article);
	}

	function drawPicture($data,$name, $id)
	{
		$mydata='';
		$mycolors='';
		foreach ($data as $k=>$v)
		{
		   $mydata=$mydata."['$k', ".number_format($v,3, '.', '')."],";
		   $mycolors=$mycolors."'#81C714',";
		}
		$mydata=substr($mydata,0, strlen($mydata)-1);
		$mycolors=substr($mycolors,0, strlen($mycolors)-1);
		return "
		<div id=\"$id\"></div><script type=\"text/javascript\">
			var myData = new Array($mydata);
			var colors = [$mycolors];
			var myChart = new JSChart('$id', 'bar');
			myChart.setDataArray(myData);
			myChart.colorizeBars(colors);
			myChart.setTitle('$name');
			myChart.setTitleColor('#000000');
			myChart.setAxisNameX('<== Most stable genes   Least stable genes ==>');
			myChart.setAxisNameY('');
			myChart.setAxisColor('#000000');
			myChart.setAxisNameFontSize(12);
			myChart.setAxisNameColor('#000000');
			myChart.setAxisValuesColor('#000000');
			myChart.setBarValuesColor('#000000');
			myChart.setAxisPaddingTop(60);
			myChart.setAxisPaddingRight(140);
			myChart.setAxisPaddingLeft(150);
			myChart.setAxisPaddingBottom(40);
			myChart.setTextPaddingLeft(105);
			myChart.setTitleFontSize(12);
			myChart.setBarBorderWidth(1);
			myChart.setBarBorderColor('#C4C4C4');
			myChart.setBarSpacingRatio(50);
			myChart.setGrid(false);
			myChart.setSize(830, 321);
			myChart.setBackgroundImage('chart_bg.jpg');
			myChart.draw();
		</script>";
	}
}