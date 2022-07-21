<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = Carbon::now();

        $validated = $request->validate([
            'judul' => 'required|min:5',
            'deskripsi' => 'required|min:5',
        ]);



        $judul = $request->judul;
        $deskripsi = $request->deskripsi;

        $store = Quiz::insert([
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'created_at' => $date,
        ]);

        if ($store) {
            return redirect()->back()->with('success', 'Quiz Berhasil ditambah.');
        } else {
            echo "gagal";
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        $user = Auth::user();
        $userId = $user->id;

        $data = Quiz::paginate(5);
        return view('pages.teacher.quiz.index', compact('data', 'user'));
    }

    public function showByStudent(Quiz $quiz)
    {
        $user = Auth::user();
        $userId = $user->id;

        $data = Quiz::get();

        return view('pages.student.quiz.index', compact('data', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengumuman = Quiz::findOrFail($id);
        $pengumuman->delete();
        return redirect()->back()->with('success', 'Soal Berhasil diHapus.');
    }
}
