<?php

namespace App\ChartUtility\HorizontalBarChart;


class Bar{

    private $title;
    private $lenght;
    private $colorRegex = "#^\#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$#";

    function __construct($title, $lenght, $color){
        $this->lenght = $lenght;
        if( 0 <= $lenght && $lenght <= 100 ){
            $this->title = $title;
        }
        else throw new \Exception("The lenght must be a percentage");
        if(preg_match($this->colorRegex, $color) ){
            $this->color = $color;
        }
        else throw new \Exception("The color must be in hexadecimal format");
    }

    public function render(){
        return '<li class="chart-line ">
        <p class="bar-title">'.$this->title.'</p>
        <div class="bar" style="width: '.$this->lenght.'%;background-color: '.$this->color.';"></div>
    </li>';
    }
}