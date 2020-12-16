@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Membuat Produk Baru </h2>

    @if ($errors->any())
    <div class="alert danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error }} </li>
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

    <form action="{{url('produk')}} " method="post" enctype="multipart/form-data">
    
    {{ csrf_field() }}

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="nama_produk"> Nama Poduk :</label>
            <input type="text" name="nama_produk" class="form-control">
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="id_kategori">Kategori : </label>

                    <select name="id_kategori" id="id_kategori" class="form-control input-sm">
        @foreach ($data_kategori as $kategori)
            <option value="{{$kategori->id_kategori}} ">{{$kategori->nama_kategori}} </option>
        @endforeach

            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="harga">Harga : </label>
            <input type="text" name="harga"class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="deskripsi">Deskripsi : </label>
            <textarea name="deskripsi"  cols="30" rows="10" class="form-control">

            </textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="gambar">gambar : </label>
            <input type="file" name="gambar" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-3">
            <button type="submit" class="btn btn-success">
                Simpan Produk
            </button>
        </div>
        <div class="form-group col-md-2">
            <a href="{{ URL::previous() }} ">Batal</a>
        </div>
    </div>
    </form>
</div>
    
@endsection