<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoutesController extends Controller
{
    public function Dashboard() {
        return 'Hallo, ini halaman dashboard yang dibuat dengan controller Laravel';
    }
}

