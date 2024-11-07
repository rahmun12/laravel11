<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use Illuminate\Http\Request;

class RakController extends Controller
{
    public function createRak (Request $request)
{
    $id = mt_rand(1000000000000000, 9999999999999999);

    $data = [
        'rak_id' => $id,
        'rak_nama' => $request->input('nama'),
        'rak_lokasi' => $request->input('lokasi'),
        'rak_kapasitas' => $request->input('kapasitas'),
    ];

    Rak::createRak($data);

    return redirect()->route('tambah_rak')->with('success', 'Data kategori berhasil ditambahkan!');
}


public function update (Request $request, $id)
{
    $data = [
        'rak_id' => $id,
        'rak_nama' => $request->input('nama'),
        'rak_lokasi' => $request->input('lokasi'),
        'rak_kapasitas' => $request->input('kapasitas'),
    ];

    Rak::updateRak($id, $data);

    return redirect()->route('rak.index')->with('updated', 'Data rak berhasil diupdate!');
}

public function delete ($id)
{
    Rak::deleteRak($id);

    return redirect()->route('rak.index')->with('deleted', 'Data rak berhasil dihapus!');
}
}
