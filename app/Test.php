<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    //
    protected $table = 'test'; //nama table

    protected $fillable = ['judul', 'desc']; //isi kolom buat di inputan
}
