@extends('layouts.dash')

@section('title', 'Pilih Materi')

@section('content')
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content p-5">
        <!-- Small boxes (Stat box) -->
        @foreach ($data->chunk(4) as $item)
        <div class="row">

          <!-- Show List of Mapels -->
          @foreach($item as $m)
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                <div class="inner">
                    <h4>{{ $m->judul }}</h4>
                    {{-- <br>
                    <p style="line-height:0px;">{{ $m->deskripsi }}</p>
                    <p>{{ $m->created_at }}</P> --}}
                </div>
                <div class="icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <a href="/Student/Quiz/soal/{{ $m-> id }}" class="small-box-footer">Lihat Quiz Ini <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
          @endforeach

        </div>
        @endforeach
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
