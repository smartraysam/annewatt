<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bike_details extends Model
{
    //
    protected $fillable = [
        'ridername',
        'bikebrand',
        'enginenumber',
        'chasisno',
        'registrationnum',
        'receiptnumber',
        'dateofpurchase',

    ];

}