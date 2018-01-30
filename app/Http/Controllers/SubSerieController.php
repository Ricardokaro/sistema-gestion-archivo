<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubSerie;
use Illuminate\Support\Facades\DB;

class SubSerieController extends Controller
{
    public function listadoSeries($id){
        $sub_series = DB::table('sub_series')->where('serie_id', $id)->get();
        //dd($sub_secciones);
        return response()->json($sub_series);
    }   
}
