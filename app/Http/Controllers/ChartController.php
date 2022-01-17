<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChartUtility\HorizontalBarChart\HorizontalBarChart;
use App\Models\Invoice;

class ChartController extends Controller
{
    public function index(){
        
        $grossVolumeChart->createBar("titre", 60, "#50C976");
        $grossVolumeChart->createBar("titre2", 70, "#50C976");
        $grossVolumeChart->createBar("titre3", 20, "#50C976");
        $grossVolumeChart->createBar("titre4", 10, "#50C976");
        return view("charts", ["grossVolumeChart" => $grossVolumeChart->renderChart()]);
    }

    /*private function ProductLineCount(){
        $list_poduct_Lines = ["" => 0 , 
            "" => 0, 
            "" => 0, 
            "" =>0];
        $max = 0;
        foreach($list_poduct_Lines as $poduct_Line => $count){
            $new_count = count(Invoice::where('Product line', $poduct_Line)->get());
            $list_poduct_Lines[$poduct_Line] =  $new_count;
            if($new_count > $max ) $max = $new_count;
        }
        $grossVolumeChart = new HorizontalBarChart(1, "Revenue brut par catégorie", 600, 25, 0);
        $grossVolumeChart->createBar("titre", 60, "#50C976");
        foreach ()
        
    }*/
}
