<?php

namespace App\Http\Controllers;

use App\Models\Konser;
use App\Models\Promotor; // BARU
use Illuminate\Http\RedirectResponse; // BARU
use Illuminate\Http\Request; // BARU
use Illuminate\View\View; // BARU

class KonserController extends Controller
{
    public function index(Request $request): View
    {
        $daftarkonser = Konser::with('promotor')
            ->when($request->query('kota'), fn ($query, $kota) => $query->where('kota', $kota))
            ->orderBy('tanggal')
            ->get();

        $daftarKota = Konser::select('kota')->distinct()->orderBy('kota')->pluck('kota');

        return view('konser', compact('daftarkonser', 'daftarKota'));
    }

    public function show($id): View
    {
        $konser = Konser::with('promotor')->findOrFail($id);
        return view('konser-detail', compact('konser'));
    }

    // BARU: menampilkan form tambah
    public function create(): View
    {
        $daftarPromotor = Promotor::orderBy('nama')->get();
        return view('konser-create', compact('daftarPromotor'));
    }

    // BARU: menyimpan data dari form
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'promotor_id' => ['required', 'exists:promotors,id'],
            'nama'        => ['required', 'string', 'max:255'],
            'kota'        => ['required', 'string', 'max:100'],
            'harga'       => ['required', 'integer', 'min:0'],
            'sisa'        => ['required', 'integer', 'min:0'],
            'tanggal'     => ['required', 'date'],
            'deskripsi' => ['nullable', 'string'],
        ]);

        Konser::create($data);

        return redirect()->route('konser.index')
            ->with('success', 'Konser berhasil ditambahkan.');
    }
}