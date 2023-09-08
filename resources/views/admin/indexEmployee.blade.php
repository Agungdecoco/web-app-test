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
                            @php
                                $num = 1;
                            @endphp
                            @forelse ($employees as $employee)
                                <tr>
                                    <td scope="row">{{ $num++ }}</td>
                                    <td>{{ $employee->first_name }}</td>
                                    <td>{{ $employee->last_name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->alamat }}</td>
                                    <td>{{ $employee->no_hp }}</td>
                                    <td>{{ $employee->gender }}</td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('admin.destroyEmployee', $employee->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary" href="{{ route('admin.showEmployee', $employee->id) }}">Lihat Cuti</a>
                                            <a class="btn btn-sm btn-secondary" scope="col"
                                                href="{{ route('admin.editEmployee', $employee->id) }}">EDIT</a>
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
