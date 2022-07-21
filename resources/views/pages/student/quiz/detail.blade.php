@extends('layouts.dash')

@section('title', 'Student Home')

@section('content')
<div class="pages-wrapper">
    <div class="header-pages rounded">
        <h3><span class="fas fa-pen mr-4"></span>Quiz</h3>
    </div>
    @foreach ($data as $item)
        <div class="item-soal col-lg-6 mt-4 p-4 shadow-sm rounded">
            <form action="" method="post">
                <div class="row">
                    @csrf
                    @if ($item->jenis_soal == 'pilihan_berganda')
                        <div class="col-lg-10">
                            <p class="text-soal">{{ $loop->iteration }}. {{ $item->soal }}</p>
                            <div class="col ml-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                    <label class="form-check-label" for="exampleRadios2">
                                        <p>{{ $item->option_a }}</p>
                                    </label>
                                  </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                    <label class="form-check-label" for="exampleRadios2">
                                        <p>{{ $item->option_b }}</p>
                                    </label>
                                  </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                    <label class="form-check-label" for="exampleRadios2">
                                        <p>{{ $item->option_d }}</p>
                                    </label>
                                  </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                    <label class="form-check-label" for="exampleRadios2">
                                        <p>{{ $item->option_d }}</p>
                                    </label>
                                  </div>
                            </div>
                        </div>
                    @elseif ($item->jenis_soal == 'essay')
                        <div class="col-lg-10">

                            <p class="text-soal">{{ $loop->iteration }}. {{ $item->soal }}</p>
                            <input type="text" placeholder="" class="form-control">
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
            </form>
        </div>
        @endforeach
    </div>
@endsection
