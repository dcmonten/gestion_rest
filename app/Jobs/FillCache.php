<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


use App\Gestion;
use Illuminate\Support\Facades\Redis;

class FillCache implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $key;

    public function __construct($last_key)
    {   
        $this->key = $last_key;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $gestiones = Gestion::where('id','>',$this->key)->orderBy('id', 'asc');
        $last = 0;
        foreach($gestiones as $gestion){
            $redis = Redis::set('gestiones',$gestion->id,json_encode($gestion));
            $last=$gestion->id;
        }
        Redis::set('last_key','gestion'.$last);
    }
}
