@extends('layouts.admin')

@section('content')
    <div class="title">
        {{-- <i class="uil uil-clock-three"></i> --}}
        <span class="text">Daftarkan Karyawan</span>
    </div>
    <div class="row justify-content-start">
        <div class="col-4">
            {{-- <div class="card"> --}}
            <form action="{{ route('admin.storeEmployee') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="first_name" class="form-label">Nama Depan</label>
                    <input type="text" class="form-control" id="first_name" name="first_name">
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Nama Belakang</label>
                    <input type="text" class="form-control" id="last_name" name="last_name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label">Nomor HP</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat">
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" aria-label="gender" id="gender" name="gender">
                        <option selected>Pilih jenis kelamin</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                {{-- <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div> --}}
                <button type="submit" class="btn btn-success">Submit</button>
            </form>

            {{-- </div> --}}
        </div>
    </div>
@endsection
