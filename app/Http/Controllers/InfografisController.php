<?php

namespace App\Http\Controllers;

use App\Models\Infografis;

class InfografisController extends Controller
{
    public function index()
    {
        $data = Infografis::latest()->first();

        if (!$data) {
            $data = new Infografis();
        }

        return view('pages.infografis', compact('data'));
    }
}