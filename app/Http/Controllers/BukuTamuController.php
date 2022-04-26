<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use Illuminate\Http\Request;

// Model
use App\Models\BukuTamu;

class BukuTamuController extends Controller
{
    protected $path  = 'ava/';
    protected $view  = 'pages.';

    public function index()
    {
        $time    = Carbon::now();
        $tanggal = $time->toDateString();
        $jam     = $time->toTimeString();

        return view($this->view . 'form-daftar', compact(
            'tanggal',
            'jam'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'unique:daftars,email',
            'organization' => 'required',
            'country' => 'required|max:15'
        ]);

        $nama = $request->nama;
        $jenis_paket = $request->jenis_paket;
        $penerima    = $request->penerima;
        $no_plat     = $request->no_plat;
        $tanggal     = $request->tanggal;
        $tujuan      = $request->tujuan;
        $jam         = $request->jam;
        $pemesan     = $request->pemesan;
        $no_telp     = $request->non_telp;
        $no_telp_pemesan = $request->no_telp_pemesan;

        // get Today
        $time = Carbon::now();
        $today = $time->toDateString();

        /**
         * Generete id_registrasi (tanggal, bulan, jenis paket, urutan by jenis paket)
         */
        $digit1 = substr($tanggal, 8);
        $digit2 = substr($tanggal, 5, -3);
        $digit3 = 0 . $jenis_paket;
        $count  = BukuTamu::where('jenis_paket', $jenis_paket)->where('tanggal', $today)->count();

        if ($count != 0) {
            $result = $count + 1;
        } else {
            $result = '1';
        }
        if (\strlen($result) == 1) {
            $digit4 = '000' . $result;
        } elseif (\strlen($result) == 2) {
            $digit4 = '00' . $result;
        } elseif (\strlen($result) == 3) {
            $digit4 = '0' . $result;
        } elseif (\strlen($result) == 4) {
            $digit4 = $result;
        }
        $id_registrasi = $digit1 . '-' . $digit2 . '-' . $digit3 . '-' . $digit4;

        $file     = $request->file('foto');
        $fileName = time() . "." . $file->getClientOriginalName();
        $request->file('foto')->storeAs($this->path, $fileName, 'sftp', 'public');

        $bukuTamu = new BukuTamu();
        $bukuTamu->nama = $nama;
        $bukuTamu->jenis_paket   = $jenis_paket;
        $bukuTamu->id_registrasi = $id_registrasi;
        $bukuTamu->penerima      = $penerima;
        $bukuTamu->pemesan       = $pemesan;
        $bukuTamu->no_telp       = $no_telp;
        $bukuTamu->no_telp_pemesan = $no_telp_pemesan;
        $bukuTamu->no_plat = $no_plat;
        $bukuTamu->foto    = $fileName;
        $bukuTamu->tanggal = $tanggal;
        $bukuTamu->tujuan  = $tujuan;
        $bukuTamu->jam     = $jam;
        $bukuTamu->save();

        return redirect()->route('cetak-data', $id_registrasi);
    }

    public function cetakData($id_registrasi)
    {
        $result = BukuTamu::where('id_registrasi', $id_registrasi)->latest()->first();

        // $pdf = PDF::loadview('pages.cetak-data', compact('result'))->setPaper('a4', 'portrait');
        // return $pdf->stream();

        return view($this->view . 'cetak-data', compact('result'));
    }

    public function cariId()
    {
        return view('pages.cari_idregistrasi');
    }

    public function getId(Request $request)
    {
        $bukuTamu = BukuTamu::where('id_registrasi', $request->id_registrasi)->first();

        if ($bukuTamu == null) {
            return view('pages.notFound', compact('bukuTamu'));
        } else {
            return view($this->view . 'hasil-cari', compact('bukuTamu'));
        }
    }
}
