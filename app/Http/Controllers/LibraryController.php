<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\Siswa;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index_admin () {
        $bukus = Buku::all();
        $siswas = Siswa::all();
        return view('index_admin', compact("bukus", "siswas"));
    }

    public function panelBukuAdmin()
{
    $bukus = Buku::all();


    return view('panel_buku_admin', compact('bukus'));
}


    public function index_siswa () {
        $bukus = Buku::all();
        return view('index_siswa', compact('bukus'));
    }

    public function login () {
        return view('login');
    }

    public function register () {
        return view('register');
    }

    public function profil () {
        return view('profil');
    }

    public function delete_buku($id) {
        $buku = Buku::findOrFail($id);
        $buku->delete();
        return redirect()->route('dashboard_admin')->with('success', 'Buku berhasil dihapus');
    }

    public function create_buku(Request $request) {
        $datas = $request->validate([
            'judul' => 'required|string',
            'penerbit' => 'required|string',
            'pengarang' => 'required|string',
            'stok_buku' => 'required|integer',
        ]);

        Buku::create($datas);
        return redirect()->route('dashboard_admin')->with('success', 'Buku berhasil ditambahkan');
    }

    public function edit_buku(Request $request, $id) {
        $datas = $request->validate([
            'judul' => 'required|string',
            'penerbit' => 'required|string',
            'pengarang' => 'required|string',
            'stok_buku' => 'required|integer',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($datas);
        return redirect()->route('dashboard_admin')->with('success', 'Buku berhasil diedit');
    }
    public function store_siswa(Request $request)
    {
        // $datas = $request->validate([
        //     'nama' => 'required|string',
        //     'kelas' => 'required|string',
        //     'email' => 'required|email|unique:siswa',
        //     'password' => 'required|min:6',
        // ]);
        Siswa::create([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_status' => 'siswa',
        ]);


        return redirect()->route('dashboard_admin')->with('success', 'Siswa created successfully.');
    }

    public function edit_siswa(Request $request, $id)
    {
        // $datas = $request->validate([
        //     'nama' => 'required|string',
        //     'kelas' => 'required|string',
        //     'email' => 'required|email|unique:siswa',
        //     'password' => 'required|min:6',
        // ]);

        $siswa = Siswa::findOrFail($id);

        $siswa->update([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_status' => 'siswa',
        ]);

        return redirect()->route('dashboard_admin')->with('success', 'Siswa updated successfully');
    }

    public function delete_siswa($id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->delete();

        return redirect()->route('dashboard_admin')->with('success', 'Siswa deleted successfully');
    }
    public function showDataPeminjaman()
    {
        $peminjamans = Peminjaman::all();
        return view('data_peminjaman', compact('peminjamans'));
    }

    public function borrowBook($id)
{
    $buku = Buku::findOrFail($id);

    Peminjaman::create([
        'judul' => $buku->judul,
        'penerbit' => $buku->penerbit,
        'pengarang' => $buku->pengarang,
        'stok_tersisa' => $buku->stok_tersisa - 1, 
    ]);

    return redirect()->back()->with('success', 'Book borrowed successfully.');
}
}
