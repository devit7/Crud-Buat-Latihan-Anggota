@extends('layouts.main')
@section('content')
    <div class="w-50 shadow p-3 mb-5 bg-white rounded">
        <h1>INI FORM EDIT</h1>
        <form action="{{ route('toko.update',['toko' => $edit->slug]) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="namaToko" class="form-label">Nama Toko</label>
                <input type="text" class="form-control" id="namaToko"  name="nama_toko" value="{{ $edit->nama_toko }}">
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug"  name="slug" value="{{ $edit->slug }}">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat"  name="alamat" value="{{ $edit->alamat }}">
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi"  name="deskripsi" value="{{ $edit->deskripsi }}">
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar"  name="gambar" value="{{ $edit->gambar }}">
            </div>
            @if($edit->gambar)
                <img src="/storage/img/{{$edit->gambar }}" alt="" class="img-fluid" 
                style="height: 200px; object-fit: cover;">
            @endif
            <button type="submit" class="btn mt-2 btn-primary w-100">Submit</button>
        </form>

        {{-- Erro Message --}}
        @if ($errors->any())
            <div class="alert alert-danger mt-2">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>
@endsection