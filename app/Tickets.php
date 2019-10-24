<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $fillable = [
        'collectiondate',
        'collectorname',
        'collectionlga',
        'transID',
        'payername',
        'payerID',
        'payerphone',
        'vehicleno',
        'payerlga',
        'amount',
    ];
}