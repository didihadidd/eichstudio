<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    // fillable = jd kita bs menyimpan secara langsung
    protected $fillable = [
        'talents_id', 'users_id',
        'transactional_total', 'transaction_status'
    ]; //sesuai table

    protected $hidden =[

    ];

    //relasi transaction_details untuk melihat transaction detailsnya
    public function details(){
        return $this->hasMany( TransactionDetail::class, 'transactions_id', 'id' );
    } // ini yg salah satunya ada yg sama antara tabel transaction & transaction_detail


    //relasi travel_packages u/ melihat travel packages yg dipilih
    public function talent(){
        return $this->belongsTo( Talent::class, 'talents_id', 'id' );
    }

    //relasi user u/siapa yg mendaftar si travel packages ini
    public function user(){
        return $this->belongsTo( User::class, 'users_id', 'id' );
    }

}
