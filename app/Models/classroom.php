<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\Grade;

class classroom extends Model
{
    use HasFactory;

    use HasTranslations;

    public $translatable = ['Name_Class'];


    protected $table = 'classrooms';
    public $timestamps = true;
    protected $fillable=['Name_Class','Grade_id'];



    public function Grades()
    {
        return $this->belongsTo(Grade::class, 'Grade_id');
    }
}
