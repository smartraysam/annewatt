<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nextkin_details extends Model
{
    //
    protected $fillable = [
        'kinphonenumber',
        'phonenumber',
        'title',
        'firstname',
        'middlename',
        'surname',
        'relationship',
        'address',
        'stateoforigin',
        'lga',
        'gender',
        'bvn',
    ];
}