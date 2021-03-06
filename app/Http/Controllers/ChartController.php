<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChartUtility\HorizontalBarChart\HorizontalBarChart;
use App\Models\Invoice;

class ChartController extends Controller
{
    private $color = ["#f46544", "#50C976", "#44baef", "#b8c401", "#b03c36"];
    private $index = 0;
    public function index(){
        return view("charts", ["grossVolumeChart" => $this->ProductLineCount()]);
    }

    private function getColor(){
        $colorNumber = count($this->color);
        $color = $this->color[$this->index];
        $this->index = ($this->index+1) % $colorNumber;
        return $color;
    }
    private function ProductLineCount(){
        $list_poduct_Lines = ["Health and beauty" => 0 , 
            "Electronic accessories" => 0, 
            "Home and lifestyle" => 0, 
            "Sports and travel" =>0,
            "Fashion accessories"=>0];
        $max = 0;
        foreach($list_poduct_Lines as $poduct_Line => $count){
            $new_count = count(Invoice::where('Product line', $poduct_Line)->get());
            $list_poduct_Lines[$poduct_Line] =  $new_count;
            if($new_count > $max ) $max = $new_count;
        }
        /**
         * Between the vertical lines, there are 50 pixels
         */
        $step = 20;
        $width = 700;
        
        $grossVolumeChart = new HorizontalBarChart(1, "Revenue brut par catégorie", $width, $step , 0);

        foreach($list_poduct_Lines as $poduct_Line => $count){

            $barWidth = $count *  50 / $step;    
            $grossVolumeChart->createBar($poduct_Line, $barWidth, $this->getcolor() );
        }
        return $grossVolumeChart->renderChart();
    }
}
