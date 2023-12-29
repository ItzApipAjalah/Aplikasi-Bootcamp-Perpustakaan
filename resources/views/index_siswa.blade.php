@extends('layouts.main_index')
@section('main_index')
    {{-- content --}}
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0">
                <h6>Data Buku Tersedia</h6>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">JUDUL</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">PENERBIT</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">PENGARANG</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">STOK TERSISA</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bukus as $buku)
                                <tr>
                                    <td>{{ $buku->id }}</td>
                                    <td>{{ $buku->judul }}</td>
                                    <td>{{ $buku->penerbit }}</td>
                                    <td>{{ $buku->pengarang }}</td>
                                    <td>{{ $buku->stok_buku }}</td>
                                    <td>
                                        <form action="{{ route('borrow.book', $buku->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Pinjam</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
