<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;

class PegawaiController extends Controller
{

    public function index()
    {

        $nama_saya = "Zaki Yasri Ramadhan";
        $tanggal_lahir = "2005-10-06";
        $hobi = [
            "Ngoding", "Baca buku", "Main futsal", "Dengar musik", "Jalan-jalan"
        ];
        $target_wisuda = "2026-08-30";
        $semester_sekarang = 3;
        $cita_cita = "Jadi Pahlawan Rongawi";

        $hari_ini = new DateTime('now');
        $tgl_lahir_obj = new DateTime($tanggal_lahir);
        $umur = $hari_ini->diff($tgl_lahir_obj)->y;

        $target_wisuda_obj = new DateTime($target_wisuda);
        $sisa_waktu = $hari_ini->diff($target_wisuda_obj);
        $sisa_waktu_studi = $sisa_waktu->y . " tahun, " . $sisa_waktu->m . " bulan, " . $sisa_waktu->d . " hari";

        if ($semester_sekarang < 3) {
            $pesan_semangat = "Masih Awal, Kejar TAK";
        } else {
            $pesan_semangat = "Jangan main-main, kurangi-kurangi main game!";
        }


        $data_mahasiswa = [
            "Nama" => $nama_saya,
            "Umur gweh" => $umur,
            "hobi gweh" => $hobi,
            "Tanggal harus wisuda" => $target_wisuda,
            "Sisa waktu studi saya" => $sisa_waktu_studi,
            "Semester sekarang" => $semester_sekarang,
            "pesan_untukmu" => $pesan_semangat,
            "Cita-cita my favorit gweh" => $cita_cita
        ];

        return response()->json($data_mahasiswa);
    }
}
