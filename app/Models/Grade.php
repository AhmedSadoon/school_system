<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{
    use HasFactory;
    use HasTranslations;


    protected $fillable=['Name','Notes'];

    public $translatable = ['Name'];


    protected $table='grades';
    public $timestamps=true;



}
