<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arsip;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
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
        $data_arsip = Arsip::orderBy('id', 'DESC')->get();
        return view(
            "arsip.index",
            compact("data_arsip")
        );
    }

    function store(Request $request)
    {
        if ($request->ajax()) {
            $no_surat = str_replace('/', '-', $request->no_surat);
            $no_surat = str_replace('.', '-', $no_surat);
            $nama_file = $no_surat."_".$request->instansi."_".$request->jenis_surat;
            $extention = $request->file("file")->getClientOriginalExtension();
            $nama_file = $nama_file.".".$extention;
            
            $new = new Arsip();
            $new->tanggal = date("Y-m-d",strtotime($request->tanggal));
            $new->no_surat = $request->no_surat;
            $new->instansi = $request->instansi;
            $new->file = $request->file("file")->storeAs("public/arsip/".$request->jenis_surat."/", $nama_file);
            $new->jenis_surat = $request->jenis_surat;
            $new->save();

            return response()->json(['success' => 'Data berhasil ditambah']);
        }
    }

    function update(Request $request)
    {
        if ($request->ajax()) {
            $update = Arsip::find($request->id);
            $update->tanggal = date("Y-m-d",strtotime($request->tanggal));
            $update->no_surat = $request->no_surat;
            $update->instansi = $request->instansi;
            if ($request->file("file") != "") {
                $no_surat = str_replace('/', '-', $request->no_surat);
                $no_surat = str_replace('.', '-', $no_surat);
                $nama_file = $no_surat."_".$request->instansi."_".$request->jenis_surat;
                $extention = $request->file("file")->getClientOriginalExtension();
                $nama_file = $nama_file.".".$extention;

                Storage::delete($update->file);
                $newPath = $request->file("file")->storeAs("public/arsip/".$request->jenis_surat."/", $nama_file);
                $update->file = $newPath;
            }
            $update->jenis_surat = $request->jenis_surat;
            $update->save();

            return response()->json(['success' => 'Data berhasil diubah']);
        }
    }

    function delete(Request $request)
    {
        if ($request->ajax()) {
            $view = Arsip::find($request->id);
            Storage::delete($view->file);
            Arsip::destroy($request->id);

            return response()->json(['success' => 'Data berhasil dihapus']);
        }
    }
}
