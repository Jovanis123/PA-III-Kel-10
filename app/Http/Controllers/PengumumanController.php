<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
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
    { }

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
            'file' => 'required',
        ]);

        $input = $request->all();

        // up file
        $file = $request->file('file');
        $input['file'] = $file->getClientOriginalName();
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('storage/upload'), $fileName);

        $judul = $request->judul;
        $deskripsi = $request->deskripsi;

        $store = Pengumuman::insert([
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'file' => $fileName,
            'created_at' => $date,
        ]);

        if ($store) {
            return redirect()->back()->with('success', 'Pengumuman Berhasil ditambah.');
        } else {
            echo "gagal";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengunguman  $pengunguman
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = Pengumuman::paginate(10);
        $user = Auth::user();

        return view('pages.okemin.pengumuman.index', compact('data', 'user'));
    }

    public function showById($id)
    {
        $data = Pengumuman::find($id);
        $user = Auth::user();

        return view('pages.okemin.pengumuman.detail', compact('data', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengunguman  $pengunguman
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pengumuman::find($id);
        $user = Auth::user();

        return view('pages.okemin.pengumuman.edit', compact('data', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengunguman  $pengunguman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $date = Carbon::now();

        $validated = $request->validate(
            [
                'judul' => 'required|min:5',
                'deskripsi' => 'required|min:5',
                'file' => 'required',
            ],
            [
                'judul.required' => 'judul tidak boleh kosong',
                'deskripsi.required' => 'deskripsi tidak boleh kosong',
                'file.required' => 'file tidak boleh kosong',
            ]
        );


        // up file
        $input = $request->all();
        $file = $request->file('file');
        $input['file'] = $file->getClientOriginalName();
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('storage/upload'), $fileName);

        $id = $request->id;
        $judul = $request->judul;
        $deskripsi = $request->deskripsi;

        $update = Pengumuman::where('id', '=', $id)->update([
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'file' => $fileName,
            'updated_at' => $date,
        ]);

        if ($update) {
            return redirect()->route('admin_pengumuman')->with('success', 'Pengumuman Berhasil diedit.');
        } else {
            echo "gagal";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengunguman  $pengunguman
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->delete();
        return redirect()->back()->with('success', 'Pengumuman Berhasil diHapus.');
    }
}
