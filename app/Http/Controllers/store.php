<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class store extends Controller
{
    public function store(Request $request): RedirectResponse
{
	$name = $request->input('name', 'Indro Adi');
	return redirect('/nama')->with('nama', $name);
}
}
