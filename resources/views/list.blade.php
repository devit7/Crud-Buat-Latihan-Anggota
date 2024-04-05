@extends('layouts.main')
@section('content')
    <div>

        @foreach ($sayang as $item)
            <div class="border mb-2">
                <p>{{ $item->nama_toko }}</p>
                <a href="{{ route('toko.show', ['toko' => $item->slug]) }}">{{ $item->slug }}</a>
            </div>
        @endforeach
    </div>
@endsection
