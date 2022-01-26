<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Grade extends Model
{
    //

     use HasTranslations;
     public $translateable = ['Name'];
    protected $fillable = ['name','Notes'];
    protected $table= 'grade';
    public $timestamps =true;
}
