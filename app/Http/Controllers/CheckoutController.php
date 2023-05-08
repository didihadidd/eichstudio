<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Talent;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth; //buat masukin id user

class CheckoutController extends Controller
{
    public function index(Request $request, $id) //tambahin id karena di route nya ada {id}
    {
        $item = Transaction::with(['details','talent','user'])->findOrFail($id); //sesuai relasinya, findOrFail = kl ketemu dimunculkan kl gaketemu 404

        return view('pages.checkout',[
            'item' => $item //akan memunculkan data yg ada di atas
        ]);
    }

    //di process ini posisinya = dia masih dalam cart (transaction_statusnya akan jadi in_cart)
    // public function process(Request $request, $id) //tambahin id karena di route nya ada {id}
    // {
    //     $talent = Talent::findOrFail($id); //mau ambil data TravelPackage sesuai idnya

    //     $transaction = Transaction::create([
    //         'talents_id' => $id,
    //         'users_id' => Auth::user()->id,
    //         'transactional_total' => $talent->price , //menyesuaikan harganya dgn yg ada di travel_package (harga dr travel tsb)
    //         'transaction_status' => 'IN_CART'
    //     ]);

    //     TransactionDetail::create([ //ada di modul integrasi bagian checkout I
    //         'transactions_id' => $transaction->id,
    //         'email' => Auth::user()->email,
    //         'nama_brand' => 'Nama Brand',
    //         'jumlah_item' => 0,
    //         'description' => 'Deskripsi',
    //         'bukti_bayar' => false, //di set defaultnya jd false
    //     ]);

    //     return redirect()->route('checkout', $transaction->id);
    // }



    public function remove(Request $request, $detail_id) //tambahin detail_id karena di route nya ada {id}
    {
        $item = TransactionDetail::findorFail($detail_id); //mau ambil detail dr transaction_detail

        $transaction = Transaction::with(['details','talent'])
            ->findOrFail($item->transactions_id);

        if($item->jumlah_item)
        {
            $transaction->transactional_total -= price;
            // $transaction->additional_visa -= 190;
        }

        $transaction->transactional_total -= $transaction->talent->price;

        $transaction->save();
        $item->delete();

        return redirect()->route('checkout', $item->transactions_id); //butuh id transactionnya, krn ga ditulis di pas public itu krn public udh ada $detail_id jd ambil idnya dr item
    }

    public function create(Request $request, $id) ////tambahin id karena di route nya ada {id}
    {
        $talent = Talent::findOrFail($id); //mau ambil data TravelPackage sesuai idnya

        $transaction = Transaction::create([
            'talents_id' => $id,
            'users_id' => Auth::user()->id,
            'transactional_total' => $talent->price , //menyesuaikan harganya dgn yg ada di travel_package (harga dr travel tsb)
            'transaction_status' => 'IN_CART'
        ]);

        TransactionDetail::create([ //ada di modul integrasi bagian checkout I
            'transactions_id' => $transaction->id,
            'email' => Auth::user()->email,
            'nama_brand' => 'Nama Brand',
            'jumlah_item' => 0,
            'description' => 'Deskripsi',
            'bukti_bayar' => false, //di set defaultnya jd false
        ]);

        // return redirect()->route('checkout', $transaction->id);

         //akan memvalidasi data yg masuk dari user
         $request->validate([
             //'username' => 'required|string|exists:users,username',
             'email' => 'required|string|exists:users,email',
             'nama_brand' => 'required|string',
             'jumlah_item' => 'required|integer',
             'nama_brand' => 'required|string',
             'description' => 'required',
             'bukti_bayar' => 'required|image',
         ]);

         //akan mengatur data yg akan kita masukin ke transaction_detail
         $data = $request->all();

        $data['image'] = $request->file('image')->store(
            'assets/gallery', 'public'
        );

         $data['transactions_id'] = $id;

         TransactionDetail::create($data); //untuk insert , $data = isi dari request all & tambahan dr transaction_id

         $transaction = Transaction::with(['talent'])->find($id); //ngambil data transaction itu sendiri

     //kan di dalam tabel ada total visa brp & total transaksi brp, berarti kl kita nambahin org kan kita hrs update jg visanya hrs bayar berapa nah ini ditambahin disini
         if($request->jumlah_item)
         {
             $transaction->transactional_total += price;
             // $transaction->additional_visa += 190;
         }

         $transaction->transactional_total +=
             $transaction->talent->price;

        $transaction->save();

         return redirect()->route('checkout', $id);
    }

    public function success(Request $request, $id) //tambahin id karena di route nya ada {id}
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->transaction_status = 'PENDING'; //mau update dr IN_CART jd PENDING

        $transaction->save();

        return view('pages.success');
    }
}
