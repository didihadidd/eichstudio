<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;

    // fillable = jd kita bs menyimpan secara langsung
    protected $fillable = [
        'talents_id', 'image'
    ]; //sesuai table

    protected $hidden =[

    ];

    //relasi antara galery dengan travel_package
    public function talent(){
        return $this->belongsTo( Talent::class, 'talents_id', 'id' );
    } // data galeri punyanya travelPackage

}
