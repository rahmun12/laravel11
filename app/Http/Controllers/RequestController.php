<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RequestController extends Controller
{
    public function store(Request $request)
    {
        $data = Http::get('https://jsonplaceholder.typicode.com/users');
        $jsonData = $data->json();
        dd($jsonData);
    }

    public function perpustakaan ($buku)
    {
        if ($buku === 'malam') {
            return abort(403, 'Kamu tidak memiliki hak akses ke buku ' . $buku);
        } else if ($buku === 'siang') {
            return 'Kamu mengakses buku ' . $buku;
        } else {
            return abort(404);
        }
    }
}
