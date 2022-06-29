@extends('layouts.dash')

@section('title', 'Admins Home')

@section('content')
    <div class="pages-wrapper">
        <div class="header-pages rounded">
            <h3><span class="fas fa-bullhorn mr-4"></span>{{$data->judul}}</h3>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block mt-3">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="col bg-white p-4 mt-5 shadow-sm border rounded">
            {!! $data->deskripsi !!}
        </div>
        <div class="col-lg-2 bg-white p-4 mt-5 shadow-sm border rounded">
            <span class="fas fa-file text-primary"></span><br>
            <a href="{{ asset('storage/upload/' . $data->file) }}" class="font-weight-bold">klik untuk menampilkan file</a>
        </div>
    </div>
@endsection
