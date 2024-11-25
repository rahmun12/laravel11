<?php

namespace App\Models;

use id;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $primaryKey = 'buku_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'buku_id',
        'buku_penulis_id',
        'buku_kategori_id',
        'buku_penerbit_id',
        'buku_rak_id',
        'buku_urlgambar',

        'buku_judul',
        'buku_isbn',
        'buku_thnpenerbit',
    ];

    protected static function createBuku($data)
    {
        return self::create($data);
    }
    protected static function readBuku()
    {
        $data = self::all();

        return $data;
    }

    protected static function updateBuku($id, $data)
    {
        $buku = self::find($id);

        if ($buku) {
            $buku->update($data);
            return $buku;
        }

        return null;
    }

    protected static function readBukuById($id)
    {
        $buku = self::find($id);

        return $buku;
    }

    protected static function deleteBuku($id)
    {
        return self::destroy($id);
    }

    public function penulis()
    {
        return $this->hasOne(Penulis::class, 'penulis_id', 'buku_penulis_id');
    }

    public function penerbit()
    {
        return $this->hasOne(Penerbit::class, 'penerbit_id', 'buku_penerbit_id');
    }

    public function kategori()
    {
        return $this->hasOne(Kategori::class, 'kategori_id', 'buku_kategori_id');
    }

    public function rak()
    {
        return $this->hasOne(Rak::class, 'rak_id', 'buku_rak_id');
    }


    public static function upload($id, $data)
    {
        $buku = self::find($id);

        if ($buku->buku_urlgambar) {
            Storage::delete($buku->buku_urlgambar);
        }

        if ($data) {
            $path = $data->store('public/buku_pictures');
            $buku->buku_urlgambar = $path;
        }

        $buku->save();
    }
    
}
