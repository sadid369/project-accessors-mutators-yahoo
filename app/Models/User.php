<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;


use Illuminate\Support\Str;
use Illuminate\Support\Number;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Model
{
    use HasFactory;
    public $timestamps= false;
    protected $guarded = [];
    
    public function setEmailAttribute($value) {
        $this->attributes['email'] =  Str::lower($value);
    }
    public function setUserNameAttribute($value) {
        $this->attributes['user_name'] =  Str::lower($value);
    }
    public function setPasswordAttribute($value) {
        $this->attributes['password'] =  bcrypt($value);
    //   if(Hash::check($value,'$2y$12$GsQpx.eVuFwOxLTupgDCmOMqL8TkO7w3aBOgfIx2rMOZi2lmoqsiO')){
    //     $this->attributes['password'] =  Hash::make($value);
    //   }
    }

    public function getDobAttribute($value) {
       return date('d M Y', strtotime($value));
    }
    public function getUserNameAttribute($value) {
       return Str::ucfirst($value);
    }
    public function getSalaryAttribute($value) {
       return Number::currency($value, in:"BDT");
    //    return Number::spell($value);
    }
}