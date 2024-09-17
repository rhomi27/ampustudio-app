<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    //
    public function index()
    {
        $title = 'Ampu Studio';
        $produk = Product::latest()->get();
        $contact = Contact::first();
        return view("index", compact('title','produk','contact'));
    }

    public function detail(Product $product)
    {
        $data = $product;
        $produk = Product::where('id', '!=', $product->id)->get();
        $title = 'Detail Produk';
        return view("detail", compact('title','data','produk'));
    }

    public function transaksi(Product $product)
    {
        $title = 'Transaksi';
        return view("transaksi", compact('title','product'));
    }

    public function dashboard()
    {
        $title = 'Dashboard Admin';
        $transaksi = Transaction::latest()->get();
        $labels = $transaksi->pluck('product.name'); // Mengambil nama produk
        $data = $transaksi->pluck('total_biaya');    // Mengambil total biaya
    
        return view("admin.dashboard", compact('title','transaksi','labels','data'));
    }

    public function dataproduk() {
        $title = 'Data Produk';
        $produk = Product::all();
        return view("admin.data-produk", compact('title','produk'));
    }

    public function addproduk() {
        $title = 'Tambah Produk';
        return view('admin.add-produk', compact('title'));
    }

    public function editproduk(Product $product){
        $title = 'Edit Produk';
        return view('admin.edit-produk', compact('title','product'));
    }

    public function kontak(){
        $title = 'Kontak';
        $kontak = Contact::all();
        return view('admin.kontak', compact('title','kontak'));
    }

    public function addkontak(){
        $title = 'Tambah Kontak';
        return view('admin.add-kontak', compact('title'));
    }

    public function editkontak(Contact $contact){
        $title = 'Edit Kontak';
        return view('admin.kontak-edit', compact('title','contact'));
    }
}
