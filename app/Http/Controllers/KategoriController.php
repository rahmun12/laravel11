<?php

namespace App\Http\Controllers;

use App\Models\Penulis;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function createKategori (Request $request)
{
    $id = mt_rand(1000000000000000, 9999999999999999);

    $data = [
        'kategori_id' => $id,
        'kategori_nama' => $request->input('nama'),
    ];

    Kategori::createKategori($data);

    return redirect()->route('tambah_kategori')->with('success', 'Data kategori berhasil ditambahkan!');
}


public function update (Request $request, $id)
{
    $data = [
        'kategori_id' => $id,
        'kategori_nama' => $request->input('nama'),
    ];

    Kategori::updateKategori($id, $data);

    return redirect()->route('kategori.index')->with('updated', 'Data kategori berhasil diupdate!');
}

public function delete ($id)
{
    Kategori::deleteKategori($id);

    return redirect()->route('kategori.index')->with('deleted', 'Data kategori berhasil dihapus!');
}
}
