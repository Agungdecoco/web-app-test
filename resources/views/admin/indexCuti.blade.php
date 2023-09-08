@extends('layouts.admin')

@section('content')
    <div class="title">
        {{-- <i class="uil uil-clock-three"></i> --}}
        <span class="text">Daftar Cuti</span>
    </div>
    <a class="btn btn-primary mb-3" href="{{ route('admin.addCuti') }}" role="button">Tambah Cuti</a>
    <div class="activity-data text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card" style="max-width: 400px; width: 100%;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Karyawan</th>
                                <th scope="col">Alasan</th>
                                <th scope="col">Tanggal Mulai</th>
                                <th scope="col">Tanggal Selesai</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $num = 1;
                            @endphp
                            @forelse ($cutis as $cuti)
                                <tr>
                                    <td scope="row">{{ $num++ }}</td>
                                    <td>{{ $cuti->employee->first_name }}</td>
                                    <td>{{ $cuti->alasan }}</td>
                                    <td>{{ $cuti->tgl_mulai }}</td>
                                    <td>{{ $cuti->tgl_selesai }}</td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('admin.destroyCuti', $cuti->id) }}" method="POST">
                                            <a class="btn btn-sm btn-secondary" scope="col"
                                                href="{{ route('admin.editCuti', $cuti->id) }}">EDIT</a>
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data belum Tersedia.
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
