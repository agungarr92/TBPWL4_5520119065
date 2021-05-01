<?php

namespace App\Http\Controllers;


use App\Product;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TakeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $products = Product::all();
        $transaksis = Transaksi::all();
        
        return view('transaksi', compact('transaksis', 'products'));

    }


    
    public function submit_transaksi(Request $req){
        $transaksi = new Transaksi;

        $transaksi->id_product = $req->get('id_product');
        $transaksi->qty = $req->get('qty');
        

        $transaksi->save();

        $notification = array(
            'message' => 'Data Produk berhasil ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('transaksi')->with($notification);
    }
}