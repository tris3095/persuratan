<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jabatan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
            $data_user = User::where('id_jabatan', '<>', '1')->orderBy('id', 'ASC')->get();
            $data_jabatan = Jabatan::all()->where('id', '<>', '1');
        } else {
            $data_user = User::where('id_jabatan', '<>', '1')->where('id_jabatan', '<>', '2')->orderBy('id', 'ASC')->get();
            $data_jabatan = Jabatan::all()->where('id', '<>', '1')->where('id', '<>', '2');
        }
        return view(
            "user.index",
            compact("data_user", "data_jabatan")
        );
    }

    public function profil()
    {
        $data_user = User::where('id', Auth::user()->id)->get();
        return view(
            "user.profil",
            compact("data_user")
        );
    }

    function store(Request $request)
    {
        if ($request->ajax()) {
            $new = new User();
            $new->nama = Str::title($request->nama);
            $new->email = $request->email;
            $new->id_jabatan = $request->id_jabatan;
            $new->password = Hash::make('123456');
            $new->save();

            return response()->json(['success' => 'Data berhasil ditambah']);
        }
    }

    function update(Request $request)
    {
        if ($request->ajax()) {
            $update = User::find($request->id);
            $update->nama = Str::title($request->nama);
            $update->email = $request->email;
            $update->id_jabatan = $request->id_jabatan;
            $update->save();

            return response()->json(['success' => 'Data berhasil diubah']);
        }
    }

    public function update_profil(Request $request)
    {
        if ($request->ajax()) {
            $update = User::find($request->id);
            $update->password = Hash::make($request->password);
            $update->save();

            return response()->json(['success' => 'Data berhasil diubah']);
        }
    }

    public function reset(Request $request)
    {
        if ($request->ajax()) {
            $reset = User::find($request->id);
            $reset->password = Hash::make("123456");
            $reset->save();

            return response()->json(['success' => 'Password berhasil direset']);
        }
    }

    function delete(Request $request)
    {
        if ($request->ajax()) {
            User::destroy($request->id);

            return response()->json(['success' => 'Data berhasil dihapus']);
        }
    }
}
