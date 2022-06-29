@extends('layouts.dash')

@section('title', 'Admins Home')

@section('content')
    <div class="pages-wrapper">
        <div class="header-pages rounded">
            <h3><span class="fas fa-bullhorn mr-4"></span>Edit Pengumuman</h3>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block mt-3">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="col bg-white p-4 mt-5">
            <form action="/Okemin/Pengumuman/update" enctype="multipart/form-data" method="POST" class="p-4">
                @csrf
                @method('patch')
                <div class="form-group">
                    <input type="hidden" value="{{ $data->id }}" name="id">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" id="judul" aria-describedby="emailHelp" minlength="5"
                        name="judul" value="{{ $data->judul }}">
                    @error('judul')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="judul">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="10" cols="80">
                        {{ $data->deskripsi }}

                    </textarea>
                    @error('deskripsi')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="judul">Upload file</label>
                    <input type="file" class="form-control" id="file" aria-describedby="emailHelp" name="file">
                    @error('file')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
