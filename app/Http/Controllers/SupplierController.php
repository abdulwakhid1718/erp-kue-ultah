<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;

class SupplierController extends Controller
{
    // Menampilkan semua data supplier
    public function index()
    {
        $suppliers = Supplier::all();
        return view('admin.suppliers.index', [
            'suppliers' => $suppliers
        ]);
    }

    // Menampilkan formulir untuk membuat supplier baru
    public function create()
    {
        return view('admin.suppliers.create');
    }

    // Menyimpan supplier baru ke dalam database
    public function store(StoreSupplierRequest $request)
    {
        // Validasi data dari request
        $validatedData = $request->validated();

        // Simpan data ke dalam database
        Supplier::create($validatedData);

        // Redirect ke halaman yang sesuai
        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil ditambahkan.');
    }

    // Menampilkan detail supplier
    public function show($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('admin.suppliers.show', compact('supplier'));
    }

    // Menampilkan formulir untuk mengedit supplier
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('admin.suppliers.edit', [
            'supplier' => $supplier
        ]);
    }

    // Update supplier di dalam database
    public function update(UpdateSupplierRequest $request, $id)
    {
         // Validasi data dari request
        $validatedData = $request->validated();

        // Temukan supplier berdasarkan ID
        $supplier = Supplier::findOrFail($id);

        // Update data di dalam database
        $supplier->update($validatedData);

        // Redirect ke halaman yang sesuai
        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil diperbarui.');
    }

    // Menghapus supplier dari database
    public function destroy($id)
    {
       // Temukan supplier berdasarkan ID
       $supplier = Supplier::findOrFail($id);

       // Hapus supplier
       $supplier->delete();

       // Redirect atau berikan respons sesuai kebutuhan aplikasi Anda
       return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil dihapus.');
    }
}
