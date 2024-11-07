<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';
    protected $primaryKey = 'peminjaman_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'peminjaman_id',
        'peminjaman_user_id',
        'peminjaman_tglpinjam',
        'peminjaman_tglkembali',
        'peminjaman_statuskembali',
        'peminjaman_note',
        'peminjaman_denda',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'peminjaman_user_id', 'user_id');
    }

    public function peminjamanDetail()
    {
        return $this->belongsTo(PeminjamanDetail::class, 'peminjaman_detail_peminjaman_id');
    }

    public function buku()
    {
        return $this->hasManyThrough(Buku::class, PeminjamanDetail::class, 'peminjaman_detail_peminjaman_id', 'buku_id', localKey: 'peminjaman_id', secondLocalKey: 'peminjaman_detail_buku_id');
    }
}
