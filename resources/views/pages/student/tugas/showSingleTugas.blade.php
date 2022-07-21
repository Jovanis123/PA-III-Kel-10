@extends('layouts.dash')

@section('title', 'Lihat Materi' )

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $singleTugas->judul_tugas }}</h1>
                    </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Tugas</li>
                    <li class="breadcrumb-item">Pilih Mapel</li>
                    <li class="breadcrumb-item">Pilih Tugas</li>
                    <li class="breadcrumb-item">Detail Tugas</li>
                </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Deskripsi Tugas</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <p><strong>Mata Pelajaran :</strong>  {{ $singleTugas->toMapel->nama_mapel }}</p>
                        <p><strong>Untuk Kelas :</strong>  {{ $singleTugas->toKelas->nama_kelas }}</p>
                        <p><strong>File Tugas: </strong>  
                            <a href="{{ route('student.tugas.mapel.list.tugas.download', $singleTugas->id) }}">
                                {{ $singleTugas->file_tugas }}
                            </a>
                        </p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>


        </div>
        </div>

    </section>
    <!-- /.content -->
@endsection
