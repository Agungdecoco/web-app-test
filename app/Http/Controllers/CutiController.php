<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuti;
use App\Models\Employee;

class CutiController extends Controller
{
    // Menampilkan daftar cuti
    public function index()
    {
        $cutis = Cuti::all();
        return view('admin.indexCuti', compact('cutis'));
    }

    // Menampilkan form untuk membuat cuti baru
    public function create()
    {
        $employees = Employee::all();
        return view('admin.addCuti', compact('employees'));
    }

    // Menyimpan cuti baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'alasan' => 'required|string',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date|after_or_equal:start_date',
        ]);

        $employee = Employee::findOrFail($request->employee_id);
        $currentYear = date('Y');
        $cutiCount = Cuti::where('employee_id', $employee->id)
            ->whereYear('tgl_mulai', $currentYear)
            ->count();
    
        if ($cutiCount >= 5) {
            return redirect()->route('admin.indexCuti')
                ->with('error', 'Karyawan ini sudah mencapai batas cuti tahunan.');
        }

        Cuti::create($request->all());

        return redirect()->route('admin.indexCuti')
            ->with('success', 'Cuti berhasil dibuat.');
    }

    // Menampilkan detail cuti
    public function show($id)
    {
        // $cuti = Cuti::findOrFail($id);
        // return view('cuti.show', compact('cuti'));
    }

    // Menampilkan form untuk mengedit cuti
    public function edit($id)
    {
        $cuti = Cuti::findOrFail($id);
        $employees = Employee::all();
        return view('admin.editCuti', compact('cuti', 'employees'));
    }

    // Mengupdate cuti yang sudah ada
    public function update(Request $request, $id)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string',
        ]);

        $cuti = Cuti::findOrFail($id);
        $cuti->update($request->all());

        return redirect()->route('admin.indexCuti')
            ->with('success', 'Cuti berhasil diperbarui.');
    }

    // Menghapus cuti
    public function destroy($id)
    {
        $cuti = Cuti::findOrFail($id);
        $cuti->delete();

        return redirect()->route('admin.indexCuti')
            ->with('success', 'Cuti berhasil dihapus.');
    }
}
