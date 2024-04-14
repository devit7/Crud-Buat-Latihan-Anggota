<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('list', [
            'sayang' => Toko::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $validateData = $request->validate([
            'nama_toko' => 'required',
            'slug' => 'required|unique:tokos',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $fileName = '';
        // Rename dan menyimpan file gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            //rename file
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/img', $fileName);
        }


        Toko::create([
            'nama_toko' => $request->nama_toko,
            'slug' => $validateData['slug'],
            'alamat' => $validateData['alamat'],
            'deskripsi' => $validateData['deskripsi'],
            'gambar' => $fileName
        ]);

        return redirect('/toko');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function show(Toko $toko)
    {
        //
        return view('detail', [
            'sayang' => $toko
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function edit(Toko $toko)
    {
        //
        return view('edit', [
            'edit' => $toko
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Toko $toko)
    {
        //validasi
        $validateData = $request->validate([
            'nama_toko' => 'required',
            'slug' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required'
        ]);

        $NamaFileLama = $toko->gambar;

        $fileName = $toko->gambar;
        // Jika ada perubahan pada gambar
        if ($request->hasFile('gambar')) {
            // Validasi untuk jenis file gambar
            $request->validate([
                'gambar' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);

            // Rename dan menyimpan file gambar
            $file = $request->file('gambar');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/img', $fileName);

            //delete file gambar lama
            Storage::delete('public/img/' . $NamaFileLama);
        } 
        
        $toko->update([
            'nama_toko' => $validateData['nama_toko'],
            'slug' => $validateData['slug'],
            'alamat' => $validateData['alamat'],
            'deskripsi' => $validateData['deskripsi'],
            'gambar' => $fileName
        ]);
        


        return redirect('/toko');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function destroy(Toko $toko)
    {
        //delete img
        Storage::delete('public/img/' . $toko->gambar);
        $toko->delete();

        return redirect('/toko')->with('pesan', 'Data berhasil dihapus');
    }
}
