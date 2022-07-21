@extends('layouts.dash')

@section('title', 'Teachers Home')

@section('content')
    <div class="pages-wrapper">
        <div class="header-pages rounded">
            <h3><span class="fas fa-pen mr-4"></span>Detail Quiz</h3>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block mt-3">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        <div class="col mx-auto">
            <button type="button" class="btn btn-success mt-5 mr-5" data-toggle="modal" data-target="#modalPB">
                <span class="fas fa-plus"> </span> Menambah Pilihan Berganda
            </button>
            <button type="button" class="btn btn-success mt-5" data-toggle="modal" data-target="#modalEssay">
                <span class="fas fa-plus"> </span> Menambah Essay
            </button>
        </div>

        @foreach ($data as $item)
            <div class="item-soal col-lg-6 mt-5 p-4 shadow-sm rounded">
                <div class="row">
                    @if ($item->jenis_soal == 'pilihan_berganda')
                        <div class="col-lg-10">
                            <p class="text-soal">{{ $loop->iteration }}. {{ $item->soal }}</p>
                            <div class="col ml-2">
                                <p>a. {{ $item->option_a }}</p>
                                <p>b. {{ $item->option_b }}</p>
                                <p>c. {{ $item->option_c }}</p>
                                <p>d. {{ $item->option_d }}</p>
                                <p class="font-weight-bold">Jawaban : {{ $item->jawaban }}</p>
                            </div>
                        </div>
                    @elseif ($item->jenis_soal == 'essay')
                        <div class="col-lg-10">

                            <p class="text-soal">{{ $loop->iteration }}. {{ $item->soal }}</p>
                            <p class="font-weight-bold ml-3">Jawaban : {{ $item->jawaban }}</p>
                        </div>
                    @endif
                    @if (Auth::user()->hasRole('Admin'))
                        <div class="col mt-3">
                            <a href="/Teacher/Quiz/destroy/{{ $item->id }}" style="font-size: 26px"><span
                                    class="fas fa-trash text-danger"></span></a>
                        </div>
                        <div class="col mt-3">
                            <a href="/Teacher/Quiz/edit/{{ $item->id }}" style="font-size: 26px"><span
                                    class="fas fa-pen-to-square text-primary"></span></a>
                        </div>
                    @elseif(Auth::user()->hasRole('Student'))
                    @endif

                </div>
            </div>
        @endforeach


    </div>

    <div class="modal" id="modalPB" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Menambah Pilihan berganda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/Teacher/Quiz/soal/store" method="POST" class="p-4">
                        @csrf
                        <div class="form-group">
                            <label for="soal">Soal</label>
                            <input type="hidden" name="id_quiz" value="{{ $id_quiz }}">
                            <input type="text" class="form-control" id="soal" aria-describedby="emailHelp"
                                minlength="5" name="soal" required>
                            @error('soal')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="soal">Pilihan a</label>
                            <input type="text" class="form-control" id="judul" aria-describedby="emailHelp"
                                minlength="5" name="option_a" required>
                            @error('option_a')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="judul">Pilihan b</label>
                            <input type="text" class="form-control" id="judul" aria-describedby="emailHelp"
                                minlength="5" name="option_b" required>
                            @error('option_b')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="judul">Pilihan c</label>
                            <input type="text" class="form-control" id="judul" aria-describedby="emailHelp"
                                minlength="5" name="option_c" required>
                            @error('username')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="judul">Pilihan d</label>
                            <input type="text" class="form-control" id="judul" aria-describedby="emailHelp"
                                minlength="5" name="option_d" required>
                            @error('username')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            <input type="hidden" name="jenis_soal" value="pilihan_berganda">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Jawaban</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="jawaban" required>
                                <option selected disabled>Isi jawaban</option>
                                <option value="a">a</option>
                                <option value="b">b</option>
                                <option value="c">c</option>
                                <option value="d">d</option>
                            </select>
                            @error('jawaban')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
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
    <div class="modal fade" id="modalEssay" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Essay</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/Teacher/Quiz/soal/store" method="POST" class="p-4">
                        @csrf
                        <div class="form-group">
                            <label for="soal">Soal</label>
                            <input type="hidden" name="jenis_soal" value="essay">
                            <input type="hidden" name="id_quiz" value="{{ $id_quiz }}">
                            <input type="text" class="form-control" id="soal" aria-describedby="emailHelp"
                                minlength="5" name="soal" required>
                            @error('soal')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Jawaban</label>
                            <input type="text" class="form-control" id="jawaban" aria-describedby="emailHelp" name="jawaban">
                            @error('jawaban')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
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
