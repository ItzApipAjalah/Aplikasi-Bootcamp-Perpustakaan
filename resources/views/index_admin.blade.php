@extends('layouts.main_index_admin')
@section('main_index')
    {{-- content --}}
    <div class="container-fluid py-4">
        <button class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            Tambah Akun
        </button>
        <div class="row my-4">
            <div class="col-lg-11 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6 class="mb-0">Akun Siswa/Siswi</h6>
                            </div>
                        </div>
                    </div>
                    @include("partials.siswa.create_modal")
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary font-weight-bold">
                                            Nama</th>
                                        <th class="text-uppercase text-secondary font-weight-bold">
                                            Kelas</th>
                                        <th class="text-uppercase text-secondary font-weight-bold">
                                            Email</th>
                                        <th class="text-uppercase text-secondary font-weight-bold">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($siswas as $siswa)
                                        <tr>
                                            <td>{{ $siswa->nama }}</td>
                                            <td>{{ $siswa->kelas }}</td>
                                            <td>{{ $siswa->email }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <button type="button" class="btn btn-warning me-2"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editModal_{{ $siswa->id }}"
                                                            data-book-id="{{ $siswa->id }}">
                                                        Edit
                                                    </button>
                                                    @include("partials.siswa.edit_modal")
                                                    <form action="{{ route('siswa.delete', $siswa->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Tidak ada data siswa</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
