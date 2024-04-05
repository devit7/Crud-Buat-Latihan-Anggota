@extends('layouts.main')
@section('content')
    <div>

        <div>
            <a href="{{ route('toko.edit',['toko' => $sayang->slug]) }}" >
                <button class="btn btn-primary">Edit</button>
            </a>
            <form action="{{ route('toko.destroy',['toko' => $sayang->slug]) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger" onclick="return confirm('are u sure ?')">Delete</button>
            </form>
        </div>
        <div class="border mb-2">
            <p>{{ $sayang->nama_toko }}</p>
            <p>{{ $sayang->slug }}</p>
            <p>{{ $sayang->deskripsi }}</p>
            <p>{{ $sayang->alamat }}</p>
        </div>
        
    </div>
@endsection