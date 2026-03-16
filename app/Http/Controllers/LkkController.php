<?php

namespace App\Http\Controllers;

use App\Models\Lkk;
use Illuminate\Http\Request;

class LkkController extends Controller
{
   public function index() {
    return view('lkk.index'); // View yang kamu berikan tadi
}

public function show($kategori) {
    $data = \App\Models\Lkk::where('kategori', $kategori)->firstOrFail();
    return view('lkk.show', compact('data'));
}

public function indexAdmin() {
    $lkks = \App\Models\Lkk::all();
    return view('admin.lkk.index', compact('lkks'));
}

public function edit($id) {
    $lkk = \App\Models\Lkk::findOrFail($id);
    return view('admin.lkk.edit', compact('lkk'));
}

public function update(Request $request, $id) {
    $lkk = \App\Models\Lkk::findOrFail($id);
    $data = $request->validate([
        'nama_lembaga' => 'required',
        'deskripsi' => 'required',
        'konten_detail' => 'required',
        'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
    ]);

    if ($request->hasFile('foto')) {
        if ($lkk->foto) \Storage::disk('public')->delete($lkk->foto);
        $data['foto'] = $request->file('foto')->store('lkk', 'public');
    }

    $lkk->update($data);
    return redirect()->route('admin.lkk.index')->with('success', 'Data LKK berhasil diperbarui');

    }
}
