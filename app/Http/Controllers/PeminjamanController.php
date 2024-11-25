<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\PeminjamanDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id)
    {
        $user_id = Auth::user()->user_id;
        $peminjaman_id = mt_rand(1000000000000000, 9999999999999999);
        $date = date("Y-m-d");

        $peminjaman = [
            'peminjaman_id' => $peminjaman_id,
            'peminjaman_user_id' => $user_id,
            'peminjaman_tglpinjam' => $date,
            'peminjaman_tglkembali' => $date,
        ];

        $peminjaman_detail = [
            'peminjaman_detail_peminjaman_id' => $peminjaman_id,
            'peminjaman_detail_buku_id' => $id
        ];

        // Peminjaman::create($peminjaman);
        // PeminjamanDetail::create($peminjaman_detail);

        DB::table('peminjaman')->insert($peminjaman);
        DB::table('peminjaman_detail')->insert($peminjaman_detail);

        return redirect()->route('peminjaman.siswa')->with('success', 'Anda berhasil meminjam buku!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $date_now = date("Y-m-d");

        $data = [
            'peminjaman_tglkembali' => $date_now,
            'peminjaman_statuskembali' => 1,
            'peminjaman_note' => $request->catatan,
            'peminjaman_denda' => $request->denda,
        ];

        Peminjaman::where('peminjaman_id', $id)->update($data);

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil diselesaikan!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Peminjaman::where('peminjaman_id', $id)->delete();

        return redirect('/daftar-peminjaman-admin')->with('success', 'Peminjaman berhasil dihapus!');
    }
}
