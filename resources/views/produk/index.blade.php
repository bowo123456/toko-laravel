@extends('layouts.app')

@section('content')

<div class="container">
    
<h2>Membuat Produk Baru</h2>

@if (\Session::has('success'))
<div class="alert alert-success">
    <p>{{\Session::get('success') }} </p>
</div>
    
@endif

<div class="row">
    <div class="col-sm">
        <a href="{{action('ProdukController@create')}} " class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="col-sm">
        <a href="{{action('KategoriProdukController@index')}} ">Kategori Produk</a>
    </div>
    <div class="col-sm">
        {{$data_produk->links()}}
    </div>
</div>
<br/>

<table class="table striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Dekripsi</th>
            <th>Gambar</th>
            <th colspan="2" >Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($data_produk as $produk)
            <tr>
                <td>{{$produk['id_produk']}} </td>
                <td>{{$produk['nama_produk']}} </td>
                <td>{{$produk->Kategori->nama_kategori}} </td>
                <td>{{$produk['harga']}} </td>
                <td>{{$produk['deskripsi']}} </td>
                <td>{{$produk['gambar']}} </td>
                <td>
                <a href="{{action('ProdukController@edit',$produk['id_produk'])}} " class="btn btn-warning">Edit</a>    
                </td>
                <td>
                    <form action="{{action('ProdukController@destroy',$produk['id_produk'])}} " method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-danger">
                        Delete
                    </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>    
@endsection