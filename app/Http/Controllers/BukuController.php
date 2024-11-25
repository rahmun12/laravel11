<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class BukuController extends Controller
{

    public function createBuku(Request $request)
    {
        $id = mt_rand(1000000000000000, 9999999999999999);

        $data = [
            'buku_id' => $id,
            'buku_penulis_id' => $request->input('buku_penulis_id'),
            'buku_kategori_id' => $request->input('buku_kategori_id'),
            'buku_penerbit_id' => $request->input('buku_penerbit_id'),
            'buku_rak_id' => $request->input('buku_rak_id'),
            'buku_judul' => $request->input('buku_judul'),
            'buku_isbn' => $request->input('buku_isbn'),
            'buku_thnpenerbit' => $request->input('buku_thnpenerbit'),
        ];
        // dd($data);

        Buku::createBuku($data);

        if ($request->hasFile('buku_gambar')) {
            $data = $request->file('buku_gambar');
            Buku::upload($id, $data);
            return redirect()->route('buku.index', ['action' => 'show'])->with('success', 'Foto buku berhasil ditambahkan!');
        }

        return redirect()->route('create_buku')->with('success', 'Data buku berhasil ditambahkan!');
    }


    public function update(Request $request, $id)
    {
        $data = [
            'buku_id' => $id,
            'buku_penulis_id' => $request->input('buku_penulis_id'),
            'buku_kategori_id' => $request->input('buku_kategori_id'),
            'buku_penerbit_id' => $request->input('buku_penerbit_id'),
            'buku_rak_id' => $request->input('buku_rak_id'),
            'buku_judul' => $request->input('buku_judul'),
            'buku_isbn' => $request->input('buku_isbn'),
            'buku_thnpenerbit' => $request->input('buku_thnpenerbit'),
        ];

        Buku::updateBuku($id, $data);

        return redirect()->route('buku.index')->with('updated', 'Data penerbit berhasil diupdate!');
    }

    public function delete($id)
    {
        Buku::deleteBuku($id);

        return redirect()->route('buku.index')->with('deleted', 'Data penerbit berhasil dihapus!');
    }
}
