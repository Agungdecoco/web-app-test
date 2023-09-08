<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;
use App\Models\Cuti;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return view('admin.indexEmployee', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addEmployee');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $password = Hash::make($request->password);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
            'gender' => 'required|in:Laki-Laki,Perempuan', // Sesuaikan dengan opsi gender yang diizinkan.
        ]);

        Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'gender' => $request->gender,
        ]);

        return redirect()->route('admin.indexEmployee')->with('success', 'Pengajuan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Cari karyawan berdasarkan ID
        $employee = Employee::findOrFail($id);

        // Ambil daftar cuti yang dimiliki karyawan tersebut
        $cutis = Cuti::where('employee_id', $employee->id)->get();

        return view('admin.showEmployee', compact('employee', 'cutis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $attributes = Employee::all()->where('id', $id);
        return view('admin.editEmployee', compact('attributes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
            'gender' => 'required|in:Laki-Laki,Perempuan', // Sesuaikan dengan opsi gender yang diizinkan.
        ]);

        $employee = Employee::where('nip', $id)->first();
    
        if (!$employee) {
            return redirect()->route('admin.editEmployee')->with('error', 'Employee not found.');
        }

        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->email = $request->input('email');
        $employee->no_hp = $request->input('no_hp');
        $employee->alamat = $request->input('alamat');
        $employee->gender = $request->input('gender');
 
        $employee->save();
    
        return redirect()->route('admin.indexEmployee')->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Employee::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Employee deleted successfully.');
    }
}
