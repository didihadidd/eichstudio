<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use SoftDeletes;

    // fillable = jd kita bs menyimpan secara langsung
    protected $fillable = [
        'transactions_id', 'nama_brand', 'email', 'jumlah_item', 'description', 'bukti_bayar'
    ]; //sesuai table

    protected $hidden =[

    ];

    //relasi transaction_details untuk melihat transaction detailsnya
    public function transaction(){
        return $this->belongsTo( Transaction::class, 'transactions_id', 'id' );
    } // ini yg salah satunya ada yg sama antara tabel transaction & transaction_detail krn mau nyambungin keduanya


}
