@extends('layouts.dash')

@section('title', 'Admins Home')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="pages-wrapper">
        <div class="header-pages rounded">
            <h3><span class="fas fa-bullhorn mr-4"></span>Pengumuman</h3>
        </div>
        @if (Auth::user()->hasRole('Admin'))
            <button type="button" class="btn btn-success mt-5" data-toggle="modal" data-target="#exampleModal">
                <span class="fas fa-plus"> </span> Menambah Pengumuman
            </button>
        @elseif(Auth::user()->hasRole('Student'))
        @endif


        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block mt-3">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @foreach ($data as $item)
            <div class="item-pengumuman mt-5 p-4 shadow-sm rounded">
                <div class="row">
                    <div class="col-lg-10">

                        <a
                            href=" @if (Auth::user()->hasRole('Admin')) /Okemin/Pengumuman/detail/{{ $item->id }}
                            @elseif(Auth::user()->hasRole('Student'))/Student/Pengumuman/detail/{{ $item->id }} @endif">
                            <h5 class="font-weight-bold">
                                {{ $item->judul }}
                            </h5>
                        </a>
                        <p class="text-muted mt-3">
                            <span class="fas fa-clock"></span>
                            {{ $item->created_at }}
                        </p>
                    </div>
                    @if (Auth::user()->hasRole('Admin'))
                        <div class="col mt-3">
                            <a href="/Okemin/Pengumuman/destroy/{{ $item->id }}" style="font-size: 26px"><span
                                    class="fas fa-trash text-danger"></span></a>
                        </div>
                        <div class="col mt-3">
                            <a href="/Okemin/Pengumuman/edit/{{ $item->id }}" style="font-size: 26px"><span
                                    class="fas fa-pen-to-square text-primary"></span></a>
                        </div>
                    @elseif(Auth::user()->hasRole('Student'))
                    @endif

                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Menambah pengumuman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/Okemin/Pengumuman/store" enctype="multipart/form-data" method="POST" class="p-4">
                        @csrf

                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" aria-describedby="emailHelp"
                                minlength="5" name="judul">
                        </div>
                        <div class="form-group">
                            <label for="judul">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" rows="10" cols="80" minlength="5">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="judul">Upload file</label>
                            <input type="file" class="form-control" id="file" aria-describedby="emailHelp"
                                name="file">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
