<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Invoice extends Model
{
    protected $connection = 'mongodb';
     //protected $fillable = ["Invoice ID", "Branch", ];
}
