<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $goods = Goods::all();
        return view('goods.index', compact('goods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('goods.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedRequest = $request->validate([
            'name' => 'required|regex:/^[a-zA-Z0-9\s]+$/',
            'description' => 'required',
            'photo' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'where_found' => 'required',
            'status' => 'nullable',
        ], [
            'name.required' => 'Nama barang tidak boleh kosong',
            'name.string' => 'Nama barang harus berupa string',
            'name.regex' => 'Nama barang hanya boleh berisi huruf, angka, dan spasi',
            'description.required' => 'Deskripsi barang tidak boleh kosong',
            'photo.required' => 'Foto barang tidak boleh kosong',
            'photo.image' => 'Foto barang harus berupa gambar',
            'photo.mimes' => 'Foto barang harus berupa gambar dengan format png, jpg, atau jpeg',
            'photo.max' => 'Foto barang tidak boleh lebih dari 2MB',
            'where_found.required' => 'Lokasi ditemukan barang tidak boleh kosong',
        ]);

        $validatedRequest['photo'] = $request->file('photo')->store('goods', 'public');

        Goods::create($validatedRequest);
        return redirect()->route('goods.index')->with('success', 'Barang berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $goods = Goods::findOrFail($id);
        return view('goods.edit', compact('goods'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $goods = Goods::findOrFail($id);
        $validatedRequest = $request->validate([
            'name' => 'required|regex:/^[a-zA-Z0-9\s]+$/',
            'description' => 'required',
            'photo' => 'image|mimes:png,jpg,jpeg|max:2048',
            'where_found' => 'required',
            'status' => 'required',
        ], [
            'name.required' => 'Nama barang tidak boleh kosong',
            'name.string' => 'Nama barang harus berupa string',
            'name.regex' => 'Nama barang hanya boleh berisi huruf, angka, dan spasi',
            'description.required' => 'Deskripsi barang tidak boleh kosong',
            'photo.image' => 'Foto barang harus berupa gambar',
            'photo.mimes' => 'Foto barang harus berupa gambar dengan format png, jpg, atau jpeg',
            'photo.max' => 'Foto barang tidak boleh lebih dari 2MB',
            'where_found.required' => 'Lokasi ditemukan barang tidak boleh kosong',
            'status.required' => 'Status barang tidak boleh kosong',
        ]);

        if($request->hasFile('photo')){
            $validatedRequest['photo'] = $request->file('photo')->store('goods', 'public');
            Storage::disk('public')->delete($goods->photo);
        } else{
            $validatedRequest['photo'] = $goods->photo;
        }

        $goods->update($validatedRequest);
        return redirect()->route('goods.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $goods = Goods::findOrFail($id);
        Storage::disk('public')->delete($goods->photo);
        $goods->delete();
        return redirect()->route('goods.index')->with('success', 'Barang berhasil dihapus');
    }
}
