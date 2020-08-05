<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk= DB::table('produk')
                ->get();
        return view('produk/index',compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cek = DB::table('produk')->where('id_produk',$request->id)->count();
        if($cek == 1){
            return redirect()->back();
        }
        else
        {
            DB::table('produk')->insert([
                'id_produk' => $request->id_produk,
                'nama_produk' => $request->nama_produk,
                'stok' => $request->stok,
                'harga_produk' => $request->harga,
        ]);
        Alert::success('Success', 'Data Telah Terinput');
        return redirect('/produk');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $produk= DB::table('produk')->where('id_produk',$id)
                ->first();

       
        return view('produk/edit',compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('produk')->where('id_produk',$request->id_produk)->update([
            'nama_produk' => $request->nama_produk,
            'harga_produk' => $request->harga,
            'stok' => $request->stok,
         
        ]);
        Alert::success('Success', 'Data Telah Terupdate');
        return redirect('/produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('produk')->where('id_produk',$id)->delete();
        Alert::warning('Terhapus', 'Data Berhasil Terhapus');
        return redirect('produk');
    }
}
