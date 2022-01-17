<?php

namespace App\ChartUtility\HorizontalBarChart;


class CaptionBar{

    private $caption;
    private $number;

    function __construct($caption, $number){
        $this->number = $number;
        $this->caption = $caption;
    }

    public function render(){
        return '<li class="chart-line caption">
        <p>Figure '. $this->number.':'.$this->caption.'</p>
    </li>';
    }
}