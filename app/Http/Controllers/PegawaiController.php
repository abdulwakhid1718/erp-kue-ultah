<?php
namespace App\Http\Controllers;

use App\Models\Devisi;
use App\Models\Jabatan;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StorePegawaiRequest;
use App\Http\Requests\UpdatePegawaiRequest;

class PegawaiController extends Controller
{
    // Controller Method
    public function getJabatanByDevisi($devisi_id)
    {
        $jabatans = Jabatan::where('devisi_id', $devisi_id)->get();
        return response()->json($jabatans);
    }

    public function index()
    {
        $pegawais = Pegawai::all();
        return view('admin.pegawai.index', compact('pegawais'));
    }

    public function create()
    {
        $devisi = Devisi::all();
        return view('admin.pegawai.create', [
            'devisis' => $devisi,
        ]);
    }

    public function store(StorePegawaiRequest $request)
    {
        // Validasi data dari request
        $validatedData = $request->validated();
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Simpan data ke dalam database
        Pegawai::create($validatedData);
        return redirect('admin/pegawai')->with('success', 'Pegawai berhasil ditambahkan.');
    }

    public function show(Pegawai $pegawai)
    {
        return view('admin.pegawai.show', compact('pegawai'));
    }

    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $devisis = Devisi::all();
        $jabatans = Jabatan::where('devisi_id', $pegawai->jabatan->devisi_id)->get();
        
        return view('admin.pegawai.edit', [
            'pegawai' => $pegawai,
            'jabatans' => $jabatans,
            'devisis' => $devisis
        ]);
    }

    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $request->validate([
            'nama_pegawai' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'tanggal_masuk' => 'required|date',
            'jabatan_id' => 'required|exists:jabatans,id',
            'gaji_pokok' => 'required|numeric|min:0',
            'nomor_telepon' => 'required|string|max:20',
            'alamat' => 'required|string',
            'username' => 'required|string|max:255|unique:pegawais,username,' . $pegawai->id,
            'password' => 'nullable|string|min:8',
        ]);
        
        $pegawai->nama_pegawai = $request->nama_pegawai;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->tanggal_lahir = $request->tanggal_lahir;
        $pegawai->tanggal_masuk = $request->tanggal_masuk;
        $pegawai->jabatan_id = $request->jabatan_id;
        $pegawai->gaji_pokok = $request->gaji_pokok;
        $pegawai->nomor_telepon = $request->nomor_telepon;
        $pegawai->alamat = $request->alamat;
        $pegawai->username = $request->username;
        
        if ($request->filled('password')) {
            $pegawai->password = Hash::make($request->password);
        }

        $pegawai->save();

        return redirect('/admin/pegawai')->with('success', 'Pegawai berhasil diupdate!');
    }

    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect('/admin/pegawai')->with('success', 'Pegawai berhasil dihapus.');
    }
}

