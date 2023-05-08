<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Talent extends Model
{
    use SoftDeletes;

    public $table = "talents";
    // fillable = jd kita bs menyimpan secara langsung
    protected $fillable = [
        'title', 'slug', 'height', 'weight', 'status_hijab',
        'schedule','price'
    ]; //sesuai table

    protected $hidden =[

    ];

    public function galleries(){
        return $this->hasMany( Gallery::class, 'talents_id', 'id' );  // menginformasikan bahwa travel package ini punya banyak galeri

    }

}
