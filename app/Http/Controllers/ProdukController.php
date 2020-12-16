<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriProduk;
use App\Produk;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        //halaman utama produk Controller
        $data_produk = Produk::simplePaginate(10);
        $data_kategori = KategoriProduk::all();
        return view('produk.index',compact('data_produk','data_kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //untuk tambah data
        $data_kategori = KategoriProduk::all();
        return view('produk.create', compact('data_kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //fungsi untuk input data
        
            $produk = new Produk;
            $produk->nama_produk = $request->nama_produk;
            $produk->id_kategori = $request->id_kategori;
            $produk->harga = $request->harga;
            $produk->deskripsi = $request->deskripsi;

            $gambar = $request->gambar;
            $namafile = time().'.'.$gambar->getClientOriginalExtension();
            $gambar->move('images/' ,$namafile);

            $produk->gambar =$namafile;
            $produk->save();
            return redirect('produk')->with('success','Produk Telah di tambahkan');
        
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $produk = Produk::find($id);
        $data_kategori = KategoriProduk::all();
        return view('produk.edit',compact('produk','id','data_kategori'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $produk = Produk::find($id);
        if ($request->has('gambar')) {
            $produk->nama_produk = $request->get('nama_produk');
        $data_kategori = KategoriProduk::find($request->get('id_kategori'));
        $produk->kategori()->associate($data_kategori);
        $produk->harga = $request->get('harga');
        $produk->deskripsi = $request->get('deskripsi');
        
        $gambar =  $request->gambar;
        $namafile = time().'.'.$gambar->getClientOriginalExtension();
        $produk->gambar = $namafile;
        
        
        
        }else{
            $produk->nama_produk = $request->get('nama_produk');
            $data_kategori = KategoriProduk::find($request->get('id_kategori'));
            $produk->kategori()->associate($data_kategori);
            $produk->harga = $request->get('harga');
            $produk->deskripsi = $request->get('deskripsi');
        }
        $produk->update();
        return redirect('produk')->with('success','Data Produk berhsil di update');
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //fngsi untuk mengapus data
        $produk = Produk::find($id);
        $produk->delete();
        return redirect('produk')->with('success','Data Berhasil di hapus');
    }
}
