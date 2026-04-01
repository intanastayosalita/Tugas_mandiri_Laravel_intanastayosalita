<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //relasi index
    public function index()
    {
        $produk = Produk::get();
        return view('produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    //relasi ke create(membuat)
    public function create()
    {
        $category = category::get();
        return view('produk.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    //untuk menambahkan nama produk dll, reques.
   public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|min:3|max:255',
            'deskripsi'   => 'required',
            'harga'       => 'required',
            'stok'        => 'required',
            'category_id' => 'required|exists:categories,id',
            'nama_file'   => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

    if ($request->hasFile('nama_file')) {
        $file = $request->file('nama_file');
        $namaFoto = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('images'), $namaFoto);
        $validated['nama_file'] = $namaFoto;
    }

    Produk::create($validated);

    return redirect()->route('produk.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    //untuk mengedit tabel produk dan category
    public function edit($id)
    {
            $produk = Produk::findOrFail($id);
            $category = Category::all();

            return view('produk.edit', compact('produk', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    //untuk meng-update produk sesuai dengan reques.(mengubah jika mengklik "update")
    // sama dengan menambah produk hanya beda sedikit saja.
   public function update(Request $request, Produk $produk)
{
    $validated = $request->validate([
        'nama_produk' => 'required|min:3|max:255',
        'deskripsi'   => 'required',
        'harga'       => 'required|numeric',
        'stok'        => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'nama_file' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

  
    $produk->nama_produk = $validated['nama_produk'];
    $produk->deskripsi   = $validated['deskripsi'];
    $produk->harga       = $validated['harga'];
    $produk->stok        = $validated['stok'];
    $produk->category_id = $validated['category_id'];

   
    if ($request->hasFile('nama_file')) {
        $file = $request->file('nama_file');
        $namaFoto = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('images'), $namaFoto);

        $produk->nama_file = $namaFoto;
    }
//unruk mengsave produk yang sudah di ubah atau di update
    $produk->save();

    return redirect()->route('produk.index')->with('success', 'Produk berhasil diupdate');
}

    /**
     * Remove the specified resource from storage.
     */
    //untuk menghapus produk pada tabel.
    public function destroy(string $id)
    {
        $produk = produk::findOrFail($id);
        $produk->delete();
        return redirect()->route('produk.index');
    }
}