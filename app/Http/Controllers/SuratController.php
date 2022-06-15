<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;
use App\Models\Jabatan;
use App\Models\Disposisi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class SuratController extends Controller
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
    public function index_masuk()
    {
        if(Auth::user()->id_jabatan == "1" || Auth::user()->id_jabatan == "2"){
            $data_surat = Surat::where('jenis_surat', 'masuk')->orderBy('id', 'DESC')->get();
            $data_jabatan = Jabatan::all()->where('id', '<>', '1')->where('id', '<>', '2');
        }else{
            $data_surat = Surat::select('surats.id', 'disposisis.id as id_disposisi', 'tanggal', 'no_surat', 'surats.file', 'disposisis.status_surat', 'instansi', 'perihal', 'jenis_surat')
            ->join('disposisis', 'surats.id', '=', 'disposisis.id_surat')
            ->where('jenis_surat', 'masuk')
            ->where('disposisi', Auth::user()->id_jabatan)
            ->orderBy('surats.id', 'DESC')
            ->get();
            $data_jabatan = Jabatan::all()->where('id', '<>', '1')->where('id', '<>', '2')->where('id', '<>', Auth::user()->id);
        }
        return view(
            "surat.masuk",
            compact("data_surat", "data_jabatan")
        );
    }

    public function index_disposisi(Request $request)
    {
        // , DB::raw("(DATE_FORMAT(created_at,'%Y-%m'))")
        $disposisi = Disposisi::selectRaw('nama_singkat as nama, DATE_FORMAT(created_at, "%d %M, %Y %H:%i") as terima, DATE_FORMAT(updated_at, "%d %M, %Y %H:%i") as kirim')->join('jabatans', 'disposisis.disposisi', '=', 'jabatans.id')->where('id_surat', $request->id)->get();
        return $disposisi;
    }

    function store_masuk(Request $request)
    {
        if ($request->ajax()) {
            $no_surat = str_replace('/', '-', $request->no_surat);
            $no_surat = str_replace('.', '-', $no_surat);
            $nama_file = $no_surat."_".$request->instansi."_masuk";
            $extention = $request->file("file")->getClientOriginalExtension();
            $nama_file = $nama_file.".".$extention;
            
            $new = new Surat();
            $new->tanggal = date("Y-m-d",strtotime($request->tanggal));
            $new->no_surat = $request->no_surat;
            $new->instansi = $request->instansi;
            $new->perihal = $request->perihal;
            $new->keterangan = $request->keterangan;
            $new->file = $request->file("file")->storeAs("public/surat/masuk/", $nama_file);
            $new->jenis_surat = "masuk";
            $new->save();

            return response()->json(['success' => 'Data berhasil ditambah']);
        }
    }

    function update_masuk(Request $request)
    {
        if ($request->ajax()) {
            $update = Surat::find($request->id);
            $update->tanggal = date("Y-m-d",strtotime($request->tanggal));
            $update->no_surat = $request->no_surat;
            $update->instansi = $request->instansi;
            $update->perihal = $request->perihal;
            $update->keterangan = $request->keterangan;
            if ($request->file("file") != "") {
                $no_surat = str_replace('/', '-', $request->no_surat);
                $no_surat = str_replace('.', '-', $no_surat);
                $nama_file = $no_surat."_".$request->instansi."_masuk";
                $extention = $request->file("file")->getClientOriginalExtension();
                $nama_file = $nama_file.".".$extention;

                Storage::delete($update->file);
                $newPath = $request->file("file")->storeAs("public/surat/masuk/", $nama_file);
                $update->file = $newPath;
            }
            $update->jenis_surat = "masuk";
            $update->save();

            return response()->json(['success' => 'Data berhasil diubah']);
        }
    }

    function delete_masuk(Request $request)
    {
        if ($request->ajax()) {
            $view = Surat::find($request->id);
            Storage::delete($view->file);
            Surat::destroy($request->id);

            return response()->json(['success' => 'Data berhasil dihapus']);
        }
    }

    public function index_keluar()
    {
        $data_surat = Surat::all()->where('jenis_surat', 'keluar');
        return view(
            "surat.keluar",
            compact("data_surat")
        );
    }

    function store_keluar(Request $request)
    {
        if ($request->ajax()) {
            $no_surat = str_replace('/', '-', $request->no_surat);
            $no_surat = str_replace('.', '-', $no_surat);
            $nama_file = $no_surat."_".$request->instansi."_keluar";
            $extention = $request->file("file")->getClientOriginalExtension();
            $nama_file = $nama_file.".".$extention;
            
            $new = new Surat();
            $new->tanggal = date("Y-m-d",strtotime($request->tanggal));
            $new->no_surat = $request->no_surat;
            $new->instansi = $request->instansi;
            $new->perihal = $request->perihal;
            $new->keterangan = $request->keterangan;
            $new->file = $request->file("file")->storeAs("public/surat/keluar/", $nama_file);
            $new->jenis_surat = "keluar";
            $new->status_surat = 1;
            $new->save();

            return response()->json(['success' => 'Data berhasil ditambah']);
        }
    }

    function update_keluar(Request $request)
    {
        if ($request->ajax()) {
            $update = Surat::find($request->id);
            $update->tanggal = date("Y-m-d",strtotime($request->tanggal));
            $update->no_surat = $request->no_surat;
            $update->instansi = $request->instansi;
            $update->perihal = $request->perihal;
            $update->keterangan = $request->keterangan;
            if ($request->file("file") != "") {
                $no_surat = str_replace('/', '-', $request->no_surat);
                $no_surat = str_replace('.', '-', $no_surat);
                $nama_file = $no_surat."_".$request->instansi."_keluar";
                $extention = $request->file("file")->getClientOriginalExtension();
                $nama_file = $nama_file.".".$extention;

                Storage::delete($update->file);
                $newPath = $request->file("file")->storeAs("public/surat/keluar/", $nama_file);
                $update->file = $newPath;
            }
            $update->jenis_surat = "keluar";
            $update->save();

            return response()->json(['success' => 'Data berhasil diubah']);
        }
    }

    function delete_keluar(Request $request)
    {
        if ($request->ajax()) {
            $view = Surat::find($request->id);
            Storage::delete($view->file);
            Surat::destroy($request->id);

            return response()->json(['success' => 'Data berhasil dihapus']);
        }
    }

    function send(Request $request)
    {
        if ($request->ajax()) {
            $new = new Disposisi();
            $new->id_surat = $request->id;
            $new->id_user = Auth::user()->id;
            $new->disposisi = $request->disposisi;
            $new->catatan = $request->catatan;
            if ($request->file("file") != "") {
                $no_surat = str_replace('/', '-', $request->no_surat);
                $no_surat = str_replace('.', '-', $no_surat);
                $nama_file = $no_surat."_".now();
                $extention = $request->file("file")->getClientOriginalExtension();
                $nama_file = $nama_file.".".$extention;

                $new->file = $request->file("file")->storeAs("public/disposisi/", $nama_file);
            }
            $new->save();

            if ($request->id_disposisi != "") {
                $update = Disposisi::find($request->id_disposisi);
                $update->status_surat = 1;
                $update->save();
            }else{
                $update = Surat::find($request->id);
                $update->status_surat = 1;
                $update->save();
            }
            
            return response()->json(['success' => 'Surat berhasil disposisi']);
        }
    }
}
