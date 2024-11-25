<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use App\Models\Buku;
use App\Models\Penulis;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\PeminjamanDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function buku()
    {
        // $data = Buku::with('penulis', 'penerbit', 'rak', 'kategori')->get();
        $data = DB::table('buku')
            ->join('penulis', 'buku.buku_penulis_id', '=', 'penulis.penulis_id')
            ->join('kategori', 'buku.buku_kategori_id', '=', 'kategori.kategori_id')
            ->join('rak', 'buku.buku_rak_id', '=', 'rak.rak_id')
            ->join('penerbit', 'buku.buku_penerbit_id', '=', 'penerbit.penerbit_id')
            ->select('buku.*', 'penulis.penulis_nama', 'kategori.kategori_nama', 'rak.rak_nama', 'rak.rak_lokasi', 'penerbit.penerbit_nama')
            ->paginate(10);
        // $data = Buku::all();
        // dd($data->toArray());

        return view('buku', [
            'level' => 'admin',
            'data' => $data,
        ]);
    }


    public function kategori()
    {
        $data = Kategori::paginate(5);

        return view('kategori', [
            'level' => 'admin',
            'kategoris' => $data,
        ]);
    }

    public function penulis()
    {
        $data = Penulis::paginate(5);

        return view('penulis', [
            'level' => 'admin',
            'penulisdata' => $data,
        ]);
    }


    public function penerbit()
    {
        $data = Penerbit::paginate(5);

        return view('penerbit', [
            'level' => 'admin',
            'penerbits' => $data,
        ]);
    }


    public function peminjaman()
    {
        $peminjaman_all = Peminjaman::with(['user', 'peminjamanDetail', 'buku'])->get();

        // return $peminjaman_all;

        return view('peminjaman', ['level' => 'admin', 'peminjaman' => $peminjaman_all]);
    }
    

    public function pengaturan()
    {
        $user = Auth::user();
        return view('pengaturan', ['level' => 'admin', 'user' => $user]);
    }

    public function tambahBuku()
    {
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        $kategori = Kategori::all();
        $rak = Rak::all();
        return view('admin_tambah_buku', ['level' => 'admin', 'penulis' => $penulis, 'penerbit' => $penerbit, 'kategori' => $kategori, 'rak' => $rak]);
    }

    public function editBuku()
    {
        return view('admin_update_buku', ['level' => 'admin']);
    }

    public function tambahKategori()
    {
        return view('admin_tambah_kategori', ['level' => 'admin']);
    }

    public function editKategori()
    {
        return view('admin_update_kategori', ['level' => 'admin']);
    }

    public function tambahPenulis()
    {
        return view('admin_tambah_penulis', ['level' => 'admin']);
    }

    public function tambahRak()
    {
        return view('admin_tambah_rak', ['level' => 'admin']);
    }

    public function editPenulis()
    {
        return view('admin_update_penulis', ['level' => 'admin']);
    }

    public function editRak()
    {
        return view('admin_update_rak', ['level' => 'admin']);
    }

    public function tambahPenerbit()
    {

        return view('admin_tambah_penerbit', [
            'level' => 'admin',
        ]);
    }

    public function editPenerbit()
    {
        return view('admin_update_penerbit', [
            'level' => 'admin'
        ]);
    }

    public function tambahPeminjaman()
    {
        return view('admin_tambah_peminjaman', ['level' => 'admin']);
    }

    public function editPeminjaman()
    {
        $peminjaman = Peminjaman::with(['peminjaman'])->get();
        // return $peminjaman;

        return view('admin_update_peminjaman', ['level' => 'admin', 'peminjaman' => $peminjaman]);
    }

    public function pengaturanSiswa()
    {
        return view('pengaturan_siswa', ['level' => 'siswa']);
    }

    public function bukuSiswa()
    {
        $buku = Buku::with(['penulis'])->get();

        // return $buku;

        return view('buku_siswa', ['level' => 'siswa', 'buku' => $buku]);
    }

    public function peminjamanSiswa()
    {
        $user_id = Auth::user()->user_id;

        $peminjaman = PeminjamanDetail::with(['peminjaman_content', 'buku_content'])
            ->whereHas(
                'peminjaman_content',
                function ($query) use ($user_id) { // use adalah menggunakan variabel $user_id di atas karena di function ini tertutup
                    return $query->where('peminjaman_user_id', $user_id);
                }
            )->get();

        // return $peminjaman;

        return view('peminjaman_siswa', [
            'level' => 'siswa',
            'peminjaman' => $peminjaman
        ]);
    }

    public function rak()
    {
        $data = Rak::paginate(5);

        return view('rak', [
            'level' => 'admin',
            'raks' => $data,
        ]);
    }
}
