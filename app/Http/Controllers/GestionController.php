<?php

namespace App\Http\Controllers;

use App\Gestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
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
        return DB::table('gestiones')->get();
    }
    /**
     * Display a listing of the resource from  redis cache.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index_with_cache()
    {
        return Cache::remember('gestiones.todas',60*60, function () {
            return DB::table('gestiones')->get();
        });
    }

    public function redis_test(Request $request){
        try{
            $redis=Redis::connection('default');
            return response()->json(['redis_up'=>true,"msg"=>'Redis working!'],200);
        }catch(\Predis\Connection\ConnectionException $e){
            return response()->json(['redis_up'=>false,"msg"=>'Redis not working! :('],500);
        }
    }

    public function ping(Request $request){

        return response()->json(json_encode('pong'),200);
    }

}
