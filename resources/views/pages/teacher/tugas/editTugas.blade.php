@extends('layouts.dash')

@section('title', 'Edit Tugas')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kelas</h1>
                    </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">List Tugas</li>
                    <li class="breadcrumb-item active">Edit Tugas</li>
                </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Tugas</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                     <!-- Success And Fail/Error Alert -->
                     <div class="row">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                                <p>Lihat di "Sidebar -> Tugas -> List Tugas"...</p>
                            </div>
                        @endif
                    </div>
                    <!-- End of Success And Fail/Error Alert -->

                    <!-- Info Data Materi Lama sesuai id -->
                    <div class="callout callout-info">
                        <h6>Data lama untuk Tugas ini :</h6>
                        <ul>
                            <li>Mata Pelajaran : {{ $tugas->toMapel->nama_mapel }}</li>
                            <li>Kelas : {{ $tugas->toKelas->nama_kelas }}</li>
                            <li>Judul Tugas : {{ $tugas->judul_tugas }}</li>
                        </ul>
                    </div>


                <form role="form" action="{{ route('teacher.update.tugas', $tugas->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="input1" class="col-sm-2 col-form-label">Mata Pelajaran</label>
                        <div class="col-sm-10">
                            <select name="mapel" class="form-control">
                                @foreach($mapel as $m)
                                    <option value="{{ $m->id }}">{{ $m->nama_mapel }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('mapel'))
                                <div class="text-danger">
                                    {{ $errors->first('mapel')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input2" class="col-sm-2 col-form-label">Kelas</label>
                        <div class="col-sm-10">
                            <select name="kelas" multiple class="form-control">
                                @foreach($kelas as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('kelas'))
                                <div class="text-danger">
                                    {{ $errors->first('kelas')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input2" class="col-sm-2 col-form-label">Judul Tugas</label>
                        <div class="col-sm-10">
                          <input name="judul_tugas" type="text" class="form-control" id="input2" placeholder="Judul Tugas" value="{{ $tugas->judul_tugas }}">
                            @if($errors->has('judul_tugas'))
                                <div class="text-danger">
                                    {{ $errors->first('judul_tugas')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input2" class="col-sm-2 col-form-label">File Tugas</label>
                        <div class="col-sm-10">
                          <input name="file_tugas" type="file" class="form-control" id="input2" placeholder="File Tugas" value="{{ $tugas->file_tugas }}">
                            @if($errors->has('file_tugas'))
                                <div class="text-danger">
                                    {{ $errors->first('file_tugas')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <button name="submit" type="submit" class="btn btn-block bg-gradient-primary">Simpan</button>
                </form>

                </div>
                <!-- /.card-body -->
            </div>

            <!-- /.card -->
            <div class="d-none" id="card-refresh-content">
                The body of the card after card refresh
            </div>
        </div>
        <!-- /.col -->
    </section>
    <!-- /.content -->
    <script>
        var CSRFToken = $('meta[name="csrf-token"]').attr('content');
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token='+CSRFToken,
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='+CSRFToken
        };
    </script>
    <script>
        CKEDITOR.replace('ckeditor', options);
    </script>

@endsection
