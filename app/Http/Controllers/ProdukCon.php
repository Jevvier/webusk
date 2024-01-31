<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ProdukCon extends Controller
{
    public function home()
    {
        $produk = DB::table('produk')->get();
        return view('utama', ['produk' => $produk]);
    }

    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $produk = DB::table('produk')->get();
            return view('produk', ['produk' => $produk]);
        } else {
            abort(403);
        }
    }

    public function input()
    {
        return view('tambahproduk');
    }

    public function storeinput(Request $request)
    {
        // insert data ke table tbproduk
        $file = $request->file('gambar');
        $filename = Str::slug($request->nama) . "." . $file->getClientOriginalExtension();
        $file->move(public_path('assets/img'), $filename);
        DB::table('produk')->insert([
            'nama' => $request->nama,
            'tipe' => $request->tipe,
            'jenis' => $request->jenis,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $filename
        ]);
        // alihkan halaman ke route produk
        Session::flash('message', 'Input Berhasil.');
        return redirect('/produk/tampil');
    }

    public function update($id)
    {
        // mengambil data produk berdasarkan id yang dipilih
        $produk = DB::table('produk')->where('kode', $id)->get();
        // passing data produk yang didapat ke view edit.blade.php
        return redirect('/produk/tampil');
    }

    public function storeupdate(Request $request)
    {
        // update data produk

        DB::table('produk')->where('kode', $request->kode)->update([
            'nama' => $request->nama,
            'tipe' => $request->tipe,
            'jenis' => $request->jenis,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $request->gambar
        ]);

        // alihkan halaman ke halaman produk
        return redirect('/produk/tampil');
    }

    public function delete($id)
    {
        // mengambil data produk berdasarkan id yang dipilih
        DB::table('produk')->where('kode', $id)->delete();
        // passing data produk yang didapat ke view edit.blade.php
        return redirect('/produk/tampil');
    }
}
