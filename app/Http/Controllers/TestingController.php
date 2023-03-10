<?php

namespace App\Http\Controllers;

use App\Events\MyEvent;
use App\Models\Notifikasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestingController extends Controller
{
    public function index(Request $request)
    {
        //ini ujicoba pertama, sekarang bisa diabaikan
        return response()->json([
            'test' => $request->test
        ]);
    }

    public function create()
    { 
        //kirim jumlah notifikasi yang ada dalam database sesuai id user
        $notifikasi = Notifikasi::where('id_user', Auth::user()->id)->count(); 
        $user = User::where('role', 'user')->get();
        return response()->json([
            'notifikasi' => $notifikasi,
            'count' => $user->count(),
            'user' => $user
        ]);
    }

    public function store(Request $request)
    { 
        //notifikasi konfirmasi dari admin
        $notifikasi = new Notifikasi();
        $notifikasi->id_user = $request->id_user; 
        $notifikasi->save();
        event(new MyEvent('Ada notifikasi'));
        return back(); 
    }
}