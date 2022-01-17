<?php

namespace App\ChartUtility\HorizontalBarChart;


class HorizontalBarChart {

    private $bars = array();
    private $width;
    
    function __construct($number, $caption, $width, $step, $startValue){
        $this->number = $number;
        $this->caption = $caption;
        $this->width = $width;
        $this->step = $step;
        $this->startValue = $startValue;
    }

    public function createBar($title, $lenght, $color){
        $bar = new Bar($title, $lenght, $color);
        $this->bars[$title] =  $bar;
    }
    public function RemoveBar($title){
        unset($this->bars[$title]);
    }

    private function renderBars(){
        $barsHTML = "";
        foreach ($this->bars as $title => $bar) {
            $barsHTML = $barsHTML.$bar->render();
        }
        return $barsHTML;
    }

    private function generateContent(){
        $caption = new CaptionBar($this->caption, $this->number);
        $numberBar = new NumberBar($this->width, $this->step, $this->startValue);

        return $caption->render().
        $this->renderBars().
        $numberBar->render();
    }

    public function renderChart(){
        return '<div class="chart horizontal-bar-graph">
        <ul class="chart-body" style="width:'.$this->width.'px;">'
            .$this->generateContent().
        '</ul>
        </div>';
    }

}