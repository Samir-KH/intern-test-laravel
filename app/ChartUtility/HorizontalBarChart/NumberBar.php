<?php

namespace App\ChartUtility\HorizontalBarChart;


class NumberBar{

    private $width;
    private $step;
    private $startValue;

    function __construct($width, $step, $startValue){
        $this->width = $width;
        $this->step = $step;
        $this->startValue = $startValue;
    }
    private function generateNumbers(){
        $numbers = $this->numberSpan($this->startValue, 0);
        $i = 1;
        while($i * 50 < $this->width - 220){
            $leftDistance = $i * 50;
            $numbers = $numbers.$this->numberSpan($this->startValue + $i * $this->step, $leftDistance);
            $i++;
        }
        return $numbers;
    }
    private function numberSpan($number, $leftDistance){
        return '<span class="number" style="left:'.$leftDistance.'px;">'.$number.'</span>';
    }
    public function render(){
        return '<li class="chart-line number-line">'.$this->generateNumbers().'</li>';
    }
}