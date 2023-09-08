@extends('layouts.admin')

@section('content')
    <div class="title">
        {{-- <i class="uil uil-clock-three"></i> --}}
        <span class="text">Daftarkan Karyawan</span>
    </div>
    <div class="row justify-content-start">
        <div class="col-4">
            {{-- <div class="card"> --}}
            <form action="{{ route('admin.storeCuti') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="employee_id" class="form-label">Pilih Karyawan</label>
                    <select class="form-select" id="employee_id" name="employee_id">
                        <option selected>Pilih karyawan</option>
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->employee_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="alasan" class="form-label">Alasan Cuti</label>
                    <textarea class="form-control" id="alasan" name="alasan" rows="4"></textarea>
                </div>
                <div class="mb-3">
                    <label for="tgl_mulai" class="form-label">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai">
                </div>
                <div class="mb-3">
                    <label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
                    <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
            {{-- </div> --}}
        </div>
    </div>
@endsection
