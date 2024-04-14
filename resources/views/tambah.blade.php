@extends('layouts.main')
@section('content')
    <div class="w-50 shadow p-3 mb-5 bg-white rounded">
        <form action="{{ route('toko.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="namaToko" class="form-label">Nama Toko</label>
                <input type="text" class="form-control @error('nama_toko') is-invalid  @enderror" id="namaToko"  name="nama_toko" value="{{ old('nama_toko') }}">
                @error('nama_toko')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug"  name="slug" value="{{ old('slug') }}">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat"  name="alamat" value="{{ old('alamat') }}">
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi"  name="deskripsi" value="{{ old('deskripsi') }}">
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar"  name="gambar">
            </div>

            <button type="submit" class="btn mt-2 btn-primary w-100">Submit</button>
        </form>


    </div>
@endsection
