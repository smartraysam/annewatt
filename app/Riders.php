<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Riders extends Model
{
    //
    protected $fillable = [
        'phonenumber',
        'firstname',
        'middlename',
        'surname',
        'status',
        'nickname',
        'gender',
        'martialstatus',
        'nationality',
        'stateoforigin',
        'lga',
        'placeofbirth',
        'bvn',
        'dob',
        'address',
        'housenumname',
        'streetname',
        'villagetown',
        'parttime_details',
        'profilepic',
    ];
}