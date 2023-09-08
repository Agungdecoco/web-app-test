@extends('layouts.admin')

@section('content')
    <div class="title">
        {{-- <i class="uil uil-clock-three"></i> --}}
        <span class="text">Edit Karyawan</span>
    </div>
    <div class="row justify-content-start">
        <div class="col-4">
            @foreach ($attributes as $attr)
                <form action="{{ route('admin.updateEmployee', $attr->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Gunakan metode HTTP PUT untuk update -->

                    <div class="mb-3">
                        <label for="first_name" class="form-label">Nama Depan</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                            value="{{ $attr->first_name }}">
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Nama Belakang</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                            value="{{ $attr->last_name }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $attr->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">Nomor HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp"
                            value="{{ $attr->no_hp }}">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat"
                            value="{{ $attr->alamat }}">
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" aria-label="gender" id="gender" name="gender">
                            <option value="Laki-Laki" {{ $attr->gender == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki
                            </option>
                            <option value="Perempuan" {{ $attr->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                    </div>
                    {{-- <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div> --}}
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            @endforeach
        </div>
    </div>
@endsection
