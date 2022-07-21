<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Soal;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

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
        // dd($request);

        $jenis_soal = $request->jenis_soal;

        if ($jenis_soal == "pilihan_berganda") {
            $request->validate([
                'soal' => 'required',
                'option_a' => 'required',
                'option_b' => 'required',
                'option_c' => 'required',
                'option_d' => 'required',
                'jawaban' => 'required|',
            ]);

            $id_quiz = $request->id_quiz;
            $soal = $request->soal;
            $option_a = $request->option_a;
            $option_b = $request->option_b;
            $option_c = $request->option_c;
            $option_d = $request->option_d;
            $jawabanTemp = $request->jawaban;

            switch ($jawabanTemp) {
                case 'a':
                    $jawaban = $option_a;
                    break;
                case 'b':
                    $jawaban = $option_b;
                    break;
                case 'c':
                    $jawaban = $option_c;
                    break;
                case 'd':
                    $jawaban = $option_d;
                    break;

                default:
                    $jawaban = "";
                    break;
            }


            $storePilihanBerganda = Soal::insert([
                'soal' => $soal,
                'jenis_soal' => $jenis_soal,
                'id_quiz' => $id_quiz,
                'option_a' => $option_a,
                'option_b' => $option_b,
                'option_c' => $option_c,
                'option_d' => $option_d,
                'jawaban' => $jawaban,
            ]);

            if($storePilihanBerganda){
                return redirect()->back()->with('success', 'Kamu berhasil menambah soal pilihan berganda');
            } else{
                echo "error";
            }

        } else if($jenis_soal = "essay") {
            $request->validate([
                'soal' => 'required',
                'jawaban' => 'required',
            ]);

            $id_quiz = $request->id_quiz;
            $soal = $request->soal;
            $jawaban = $request->jawaban;

            $storeEssay = Soal::insert([
                'soal' => $soal,
                'jenis_soal' => $jenis_soal,
                'id_quiz' => $id_quiz,
                'jawaban' => $jawaban,
            ]);

            if($storeEssay){
                return redirect()->back()->with('success', 'Kamu berhasil menambah soal essay');
            } else{
                echo "error";
            }
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function show(soal $soal)
    {
        //
    }

    public function showById($id)
    {
        $user = Auth::user();
        $userId = $user->id;
        $id_quiz = $id;
        $data = Soal::get()->where('id_quiz', $id_quiz);

        return view('pages.teacher.quiz.detail', compact('data', 'user', 'id_quiz'));
    }

    public function showDetailByStudent($id){
        $user = Auth::user();
        $userId = $user->id;
        $id_quiz = $id;
        $data = Soal::get()->where('id_quiz', $id_quiz);

        return view('pages.student.quiz.detail', compact('data', 'user', 'id_quiz'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function edit(soal $soal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, soal $soal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function destroy(soal $soal)
    {
        //
    }
}
