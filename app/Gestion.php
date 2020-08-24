<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gestion extends Model
{

    protected $table = 'gestiones';

    protected $fillable = ['fecha_gestion_inicio','dni','operacion','manejo','conclusion','tipo'];
    
}
