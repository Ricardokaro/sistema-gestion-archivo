<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;


class SeriesController extends Controller
{
    public function listadoSeries(){
        $listadoSeries = Serie::all();
        return $listadoSeries;
    }   

}
