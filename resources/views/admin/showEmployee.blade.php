@extends('layouts.admin')

@section('content')
    <div class="title">
        {{-- <i class="uil uil-clock-three"></i> --}}
        <span class="text">Daftar Karyawan</span>
    </div>
    <a class="btn btn-primary mb-3" href="{{ route('admin.addEmployee') }}" role="button">Tambah Karyawan</a>
    <div class="activity-data text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card" style="max-width: 400px; width: 100%;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Depan</th>
                                <th scope="col">Nama Belakang</th>
                                <th scope="col">Email</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">No HP</th>
                                <th scope="col">Gender</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $employee->id }}</td>
                                <td>{{ $employee->first_name }}</td>
                                <td>{{ $employee->last_name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->alamat }}</td>
                                <td>{{ $employee->no_hp }}</td>
                                <td>{{ $employee->gender }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <h2>Daftar Cuti</h2>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tgl Mulai</th>
                                <th scope="col">Tgl Selesai</th>
                                <th scope="col">Alasan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $num = 1;
                            @endphp
                            @forelse ($cutis as $cuti)
                                <tr>
                                    <td>{{ $num++ }}</td>
                                    <td>{{ $cuti->tgl_mulai }}</td>
                                    <td>{{ $cuti->tgl_selesai }}</td>
                                    <td>{{ $cuti->alasan }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada data cuti untuk karyawan ini.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
