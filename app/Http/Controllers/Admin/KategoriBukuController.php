<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriBuku;
use Illuminate\Http\Request;

class KategoriBukuController extends Controller
{
    public function index()
    {
        $kategoriBuku = KategoriBuku::all();
        return view('admin.kategori-buku.index', compact('kategoriBuku'));
    }

    public function create()
    {
        return view('admin.kategori-buku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'deskripsi' => 'nullable',
        ]);

        KategoriBuku::create($request->all());

        return redirect()->route('kategori-buku.index')->with('success', 'Kategori Buku berhasil ditambahkan.');
    }

    public function edit(KategoriBuku $kategoriBuku)
    {
        return view('admin.kategori-buku.edit', compact('kategoriBuku'));
    }

    public function update(Request $request, KategoriBuku $kategoriBuku)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $kategoriBuku->update($request->all());

        return redirect()->route('kategori-buku.index')->with('success', 'Kategori Buku berhasil diupdate.');
    }

    public function destroy(KategoriBuku $kategoriBuku)
    {
        $kategoriBuku->delete();
        return redirect()->route('kategori-buku.index')->with('success', 'Kategori Buku berhasil dihapus.');
    }
}
