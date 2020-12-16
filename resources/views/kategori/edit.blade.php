@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Kategori Produk</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }} </li>
                @endforeach
            </ul>
        </div>
            
        @endif

        @if (\Session::has('success'))
            <div class="alert-alert-success">
                <p>{{\Session::get('success')}} </p>
            </div>
            <br/>
            
        @endif

        <form method="post"  action="{{action('KategoriProdukController@update', $id)}} " >
            {{ csrf_field() }}

            <input name="_method" type="hidden" value="PATCH">

            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="nama_kategori">Nama Kategori </label>
                    <input type="text" name="nama_kategori" class="form-control" 
                    value="{{$kategori->nama_kategori}}" >
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-3">
                    <button type="submit" class="btn btn-success">
                        Simpan Kategori Produk
                    </button>
                </div>
            </div>
        
        </form>
    </div>
@endsection