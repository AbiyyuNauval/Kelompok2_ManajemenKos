<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $kostsData = [
            [
                'id' => 1,
                'nama' => 'Kost Apik Tipe A Seturan',
                'tipe' => 'Putri',
                'fasilitas_unggulan' => ['AC', 'Wifi', 'K. Mandi Dalam'],
                'lokasi' => 'Caturtunggal, Yogyakarta',
                'harga_per_bulan' => 1700000,
                'gambar_url' => asset('images/Placeholder.jpeg')
            ],
            [
                'id' => 2,
                'nama' => 'Kost Eksklusif Sudirman Park',
                'tipe' => 'Campur',
                'fasilitas_unggulan' => ['AC', 'Wifi', 'Full Furnished'],
                'lokasi' => 'Tanah Abang, Jakarta Pusat',
                'harga_per_bulan' => 3200000,
                'gambar_url' => asset('images/Placeholder.jpeg')
            ],
            [
                'id' => 3,
                'nama' => 'Kos Singgahsini Kencana Loka',
                'tipe' => 'Putra',
                'fasilitas_unggulan' => ['AC', 'Parkir Mobil', 'Akses 24 Jam'],
                'lokasi' => 'Serpong, Tangerang Selatan',
                'harga_per_bulan' => 2100000,
                'gambar_url' => asset('images/Placeholder.jpeg')
            ],

        ];

        return view('home.index', [
            'kosts' => $kostsData
        ]);
    }
}