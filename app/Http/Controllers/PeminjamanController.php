<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Buku;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::all();

        return view('peminjaman.index', compact('peminjamans'));
    }

    public function pinjam(Buku $buku)
    {
        if ($buku->stok_tersisa > 0) {
            $buku->stok_tersisa--;

            $buku->save();

            Peminjaman::create([
                'buku_id' => $buku->id,
                'status' => 'Pinjam',
            ]);

            return redirect()->route('index_siswa')->with('success', 'Buku berhasil dipinjam.');
        } else {
            return redirect()->route('index_siswa')->with('error', 'Maaf, stok buku habis.');
        }
    }

    public function kembalikan(Buku $buku)
    {
        $peminjaman = Peminjaman::where('buku_id', $buku->id)->where('status', 'Pinjam')->first();

        if ($peminjaman) {
            $buku->stok_tersisa++;

            $buku->save();

            $peminjaman->update(['status' => 'Kembali']);

            return redirect()->route('dashboard_siswa')->with('success', 'Buku berhasil dikembalikan.');
        } else {
            return redirect()->route('dashboard_siswa')->with('error', 'Anda tidak meminjam buku ini.');
        }

    }


public function destroy(Peminjaman $peminjaman)
{
    $peminjaman->delete();

    return redirect()->route('dashboard_siswa')->with('success', 'Peminjaman berhasil dihapus.');
}

}

