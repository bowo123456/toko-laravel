@extends('layouts.app')


@section('content')
    <div class="container">
        <h2>Mengedit Data Produk</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error}} </li>
                    @endforeach
                </ul>
            </div>
            
        @endif
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{\Session::get('success')}} </p>
        </div>
            <br/>
        @endif


        <form action="{{action('ProdukController@update', $id)}} " method="post" enctype="multipart/form-data">
        
        {{ csrf_field() }}

        <input type="hidden" name="_method" value="PATCH">

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-form-group col-md-4">
                <label for="nama_produk">Nama Produk :</label>
                <input type="text" name="nama_produk" class="form-control" value="{{$produk->nama_produk}} ">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-form-group col-md-4">
                <label for="id_kategori">ID Kategori : </label>
                <select name="id_kategori" id="id_kategori" class="form-control">

                    @foreach ($data_kategori as $kategori)
                        <option value="{{ $kategori->id_kategori}} " {{$kategori->id_kategori === $produk->nama_kategori ? 'selected' : ''}} >
                        {{$kategori->nama_kategori}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="harga">Harga :</label>
                <input type="text" name="harga" class="form-control" value="{{$produk->harga}} ">
            
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="deskripsi">Deskripsi : </label>
                <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control">
                    {{$produk->deskripsi}}
                </textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="gambar">Gambar </label>
                <br>
                <img src="{{asset('images/'.$produk->gambar )}} " alt="" style="width: 100px">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="gambar">Ganti Gambar </label>
                <br>
                <input type="file" name="gambar"  class="form-control">
                <label > *) Gambar tidak di ganti, kosongkan saja. </label>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    Update
                </button>
                <a href="/Produk" class="btn btn-warning">Kembali</a>
            </div>
            
        </div>
        </form>
    </div>
@endsection