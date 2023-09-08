@extends('layouts.admin')

@section('content')
    <div class="title">
        <span class="text">Edit Profil Admin</span>
    </div>
    <div class="row justify-content-start">
        <div class="col-4">
            <form action="{{ route('admin.update', $attributes->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Gunakan metode HTTP PUT untuk update -->

                <div class="mb-3">
                    <label for="first_name" class="form-label">Nama Depan</label>
                    <input type="text" class="form-control" id="first_name" name="first_name"
                        value="{{ $attributes->first_name }}">
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Nama Belakang</label>
                    <input type="text" class="form-control" id="last_name" name="last_name"
                        value="{{ $attributes->last_name }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ $attributes->email }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password (kosongkan jika tidak ingin mengubah)</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
@endsection
