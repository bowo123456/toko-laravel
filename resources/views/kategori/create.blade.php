@extends('layouts.app')

@section('content')
    
<div class="container">
    <h2>Membuat Kategori Baru</h2>
    @if ($errors->any())

    <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>
                {{$error}}
            </li>
        @endforeach    
    </ul>    
    </div>    
    @endif

    @if (\Session::has('success'))
    <div class="alert alert-success">
        <p>
            {{\Session::get('success')}}
        </p>
    </div>

    <br/>    
    @endif

    <form action="{{url('kategori')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="nama_kategori">Nama Kategori :</label>
            <input type="text" name="nama_kategori" class="form-control">
        </div>
    </div>

    
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-3">
            <button class="btn btn-success" type="submit">
                Tambah Data
            </button>
        </div>
        <div class="form-group col-md-2">
            <a href="{{URL::previous()}} " class="btn btn-primary">
            Cancel
            </a>
        </div>
    </div>
    </form>
</div>
@endsection