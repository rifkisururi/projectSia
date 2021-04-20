<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    //
    protected $table = "akun";
    protected $primaryKey = 'kd_akun';
    public $timestamps = false;
}
