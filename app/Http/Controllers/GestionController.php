<?php

namespace App\Http\Controllers;

use App\Gestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class GestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DB::table('gestiones')->get();
    }
    /**
     * Display a listing of the resource from  redis cache.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index_with_cache()
    {
        return Cache::remember('gestiones.todas',60, function () {
            return DB::table('gestiones')->get();
        });
    }

}
