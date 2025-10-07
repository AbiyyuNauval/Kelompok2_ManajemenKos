<?php

namespace App\Http\Controllers;

use App\Models\Kos; // <-- Import model Kos
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemilikKosController extends Controller
{

     public function dashboard()
    {
        // Tetap gunakan logika ini, karena tampilan Anda membutuhkan variabel totalKos
        // Asumsi relasi Kos() di model User sudah ada dan terhubung.

        // Mengarahkan ke views pemilik/kelolakos.blade.php
        return view('pemilik.kelolakos');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil hanya kos yang dimiliki oleh user yang sedang login
        $daftarKos = Auth::user()->kos()->latest()->paginate(10);
        return view('pemilik.manajemenkos', compact('daftarKos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pemilik.properti'); // Menggunakan satu view untuk create & edit
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kos' => 'required|string|max:255',
            'alamat' => 'required|string',
            'deskripsi' => 'nullable|string',
            'harga_bulanan' => 'required|numeric',
        ]);

        Auth::user()->kos()->create($validatedData);

        return redirect()->route('manajemen-kos.index')->with('success', 'Kos baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kos $manajemen_ko)
    {
        // Tidak digunakan untuk CRUD, bisa redirect atau tampilkan detail
        return redirect()->route('manajemen-kos.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kos $manajemen_ko)
    {
        // Otorisasi: Pastikan user ini adalah pemilik kos yang akan diedit
        if ($manajemen_ko->user_id !== Auth::id()) {
            abort(403, 'AKSES DITOLAK');
        }
        return view('pemilik.properti', ['kos' => $manajemen_ko]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kos $manajemen_ko)
    {
        if ($manajemen_ko->user_id !== Auth::id()) {
            abort(403, 'AKSES DITOLAK');
        }

        $validatedData = $request->validate([
            'nama_kos' => 'required|string|max:255',
            'alamat' => 'required|string',
            'deskripsi' => 'nullable|string',
            'harga_bulanan' => 'required|numeric',
        ]);

        $manajemen_ko->update($validatedData);

        return redirect()->route('manajemen-kos.index')->with('success', 'Data kos berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kos $manajemen_ko)
    {
        if ($manajemen_ko->user_id !== Auth::id()) {
            abort(403, 'AKSES DITOLAK');
        }
        $manajemen_ko->delete();
        return redirect()->route('manajemen-kos.index')->with('success', 'Kos berhasil dihapus.');
    }
}
