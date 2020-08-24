<?php

namespace App\Http\Controllers;

use App\Gestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class GestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Gestion::all());
    }
    /*
    public function index_with_cache()
    {
        $cache_last_key = Redis::get('last_key');
        $id = Gestion::orderBy('id', 'desc')->first();

        if ($cache_last_key != 'gestion'.$id){
            return response()->json(Gestion::all());
        }
        else{
            return response()->json(Gestion::all());
        }
        
    }*/

}
