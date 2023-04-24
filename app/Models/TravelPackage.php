<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelPackage extends Model
{
    use SoftDeletes;

    // fillable = jd kita bs menyimpan secara langsung
    protected $fillable = [
        'title', 'slug', 'location', 'about', 'featured_event',
        'language','foods','departure','duration',
        'type', 'price'
    ]; //sesuai table

    protected $hidden =[

    ];

    public function galleries(){
        return $this->hasMany( Gallery::class, 'travel_packages_id', 'id' );  // menginformasikan bahwa travel package ini punya banyak galeri

    }

}
