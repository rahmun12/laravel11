<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use App\Models\Buku;
use App\Models\Penulis;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function loginPage()
    {
        return view('public.login');
    }

    public function registerPage()
    {
        return view('auth.register');
    }


    public function dashboard()
    {
        return view('dashboard', ['level' => 'siswa']);
    }

    public function dashboardAdmin()
    {
        return view('admin.dashboard', ['level' => 'admin']);
    }

    //penerbit
    public function penerbit()
    {
        $data = Penerbit::readPenerbit();

        return view('pages.penerbit', ['level' => 'admin'])->with('penerbit', $data);
    }

    public function admin_update_penerbit($id)
    {

        $penerbit = Penerbit::where('penerbit_id', $id)->first();

        return view('admin_update_penerbit', ['level' => 'admin'])->with('penerbit', $penerbit);
    }

    //penulis
    public function penulis()
    {
        $data = Penulis::readPenulis();

        return view('pages.penulis', ['level' => 'admin'])->with('penulis', $data);
    }

    public function admin_update_penulis($id)
    {

        $penulis = Penulis::where('penulis_id', $id)->first();

        return view('admin_update_penulis', ['level' => 'admin'])->with('penulis', $penulis);
    }

    //kategori
    public function kategori()
    {
        $data = Kategori::readKategori();

        return view('pages.kategori', ['level' => 'admin'])->with('kategori', $data);
    }

    public function admin_update_kategori($id)
    {

        $kategori = Kategori::where('kategori_id', $id)->first();

        return view('admin_update_kategori', ['level' => 'admin'])->with('kategori', $kategori);
    }


    //rak

    public function rak()
    {
        $data = Rak::readRak();

        return view('pages.rak', ['level' => 'admin'])->with('rak', $data);
    }

    public function admin_update_rak($id)
    {

        $rak = Rak::where('rak_id', $id)->first();

        return view('admin_update_rak', ['level' => 'admin'])->with('rak', $rak);
    }

    //buku

    public function buku()
    {
        $data = Buku::readBuku();

        return view('pages.buku', ['level' => 'admin'])->with('buku', $data);
    }

    public function admin_update_buku($id)
    {
        $buku = Buku::with('penulis', 'kategori', 'penerbit', 'rak')->where('buku_id', $id)->first();
        // dd($buku->toArray());
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        $kategori = Kategori::all();
        $rak = Rak::all();
        return view('admin_update_buku', ['level' => 'admin', 'penulis' => $penulis, 'penerbit' => $penerbit, 'kategori' => $kategori, 'rak' => $rak, 'buku' => $buku]);
    }

    public function peminjaman()
    {
        $data = Peminjaman::readPeminjaman();

        return view('pages.peminjaman', ['level' => 'admin'])->with('peminjaman', $data);
    }

    public function admin_update_peminjaman($id)
    {

        $peminjaman = Peminjaman::where('peminjaman_id', $id)->first();

        return view('admin_update_peminjaman', ['level' => 'admin'])->with('peminjaman', $peminjaman);
    }
}
