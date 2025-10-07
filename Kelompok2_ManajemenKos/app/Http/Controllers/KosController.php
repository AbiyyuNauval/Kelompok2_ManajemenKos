<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KosController extends Controller
{
    public function index()
    {
        return view('kos.index');
    }

    public function create()
    {
        return view('kos.create');
    }

    public function store(Request $request)
    {
        return "Menyimpan data kos baru";
    }

    public function show(string $id = null)
    {
        if ($id) {
            return view('kos.show', ['kos_id' => $id]);
        } else {
            return "Masukkan ID kos yang ingin di lihat";
        }
    }

    public function edit(string $id)
    {
        return "Mengedit data kos dengan ID: ".$id;
    }

    public function update(Request $request, string $id)
    {
        return "Mengupdate data kos dengan ID: ".$id;
    }

    public function destroy(string $id)
    {
        return "Menghapus data kos dengan ID: ".$id;
    }
}
