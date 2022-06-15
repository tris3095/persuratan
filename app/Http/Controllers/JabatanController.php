<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;

class JabatanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        if (auth()->user()->id_jabatan == "1") {
            $data_jabatan = Jabatan::where('id', '<>', '1')->orderBy('id', 'ASC')->get();
        } else {
            $data_jabatan = Jabatan::where('id', '<>', '1')->where('id', '<>', '2')->orderBy('id', 'ASC')->get();
        }
        return view(
            "jabatan.index",
            compact("data_jabatan")
        );
    }

    function store(Request $request)
    {
        if ($request->ajax()) {
            $new = new Jabatan();
            $new->nama = $request->nama;
            $new->nama_singkat = $request->nama_singkat;
            $new->save();

            return response()->json(['success' => 'Data berhasil ditambah']);
        }
    }

    function update(Request $request)
    {
        if ($request->ajax()) {
            $update = Jabatan::find($request->id);
            $update->nama = $request->nama;
            $update->nama_singkat = $request->nama_singkat;
            $update->save();

            return response()->json(['success' => 'Data berhasil diubah']);
        }
    }

    function delete(Request $request)
    {
        if ($request->ajax()) {
            Jabatan::destroy($request->id);

            return response()->json(['success' => 'Data berhasil dihapus']);
        }
    }
}
