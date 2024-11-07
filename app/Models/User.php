<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class User extends Authenticable
{
    use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'user_nama',
        'user_alamat',
        'user_username',
        'user_email',
        'user_notelp',
        'user_password',
        'user_level'
    ];
    protected static function register($data)
    {
        return self::create($data);
    }
    protected static function upload_profile ($id, $data)
{
    $user = self::find($id);
    
    if ($user->user_pict_url) {
        Storage::delete($user->user_pict_url);
    }

    if ($data) {
        $path = $data->store('public/profile_pictures');
        $user->user_pict_url = $path;
    }

    $user->save();
}
}
