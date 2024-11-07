<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PeminjamanDetail;
use Illuminate\Support\Facades\DB;

class PeminjamanDetailController extends Controller
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
        $user_id = 'ThisUserIsUnique';  //USER ID BISA DIGANTI DISINI UTK SESSION NTI
        $buku_detail = Buku::where('buku_id', $id)->first();
        $peminjaman_id = Str::random(16);
        $current_date = date("Y-m-d");

        $data_peminjaman = [
            'peminjaman_id' => $peminjaman_id,
            'peminjaman_user_id' => $user_id,
            'peminjaman_tglpinjam' => $current_date,
            'peminjaman_tglkembali' => $current_date,
        ];

        $data_detail = [
            'peminjaman_detail_peminjaman_id' => $peminjaman_id,
            'peminjaman_detail_buku_id' => $id
        ];

        // Peminjaman::create($data_peminjaman);
        // PeminjamanDetail::create($data_detail);

        DB::table('peminjaman')->insert($data_peminjaman);
        DB::table('peminjaman_detail')->insert($data_detail);

        return redirect()->route('peminjaman.siswa.index')->with('success', 'Anda telah meminjam buku ' . $buku_detail['buku_judul'] . '!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PeminjamanDetail $peminjamanDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PeminjamanDetail $peminjamanDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePeminjamanDetailRequest $request, PeminjamanDetail $peminjamanDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PeminjamanDetail $peminjamanDetail)
    {
        //
    }
}
