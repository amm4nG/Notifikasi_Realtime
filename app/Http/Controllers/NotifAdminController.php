<?php

namespace App\Http\Controllers;

use App\Events\MyEvent;
use App\Models\Notifikasi;
use App\Models\User;
use Illuminate\Http\Request;

class NotifAdminController extends Controller
{
    public function store()
    {
        //cari user yang levelnya admin
        $user = User::where('role', 'admin')->first();
        //tambahkan kedalam database notifikasi
        $notifikasi = new Notifikasi();
        $notifikasi->id_user = $user->id;
        $notifikasi->save();
        //kirim notifikasi baru
        event(new MyEvent('Ada notifikasi'));
        return back();
    }
}