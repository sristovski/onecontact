<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Person extends Authenticatable
{
    use Notifiable;

    protected $table = 'person';
    protected $primaryKey = 'person_id';
    public $timestamps = false;

    protected $fillable = [
        'First_name', 'Last_Name', 'EMail', 'Mobile', 'PostCode_Zipcode', 
        'password', 'email_token'
    ];

    protected $hidden = [
        'password', 'remember_token', 'email_token'
    ];

    public function setEmailAttribute ($email){
        $this->attributes['email'] = strtolower($email);
    }

    public static function generateVerificationToken () {
        return str_random(255);
    }
}
