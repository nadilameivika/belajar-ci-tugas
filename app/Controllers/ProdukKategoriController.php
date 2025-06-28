<?php

namespace App\Controllers;

use App\Models\ProdukKategoriModel; 

class ProdukKategoriController extends BaseController
{
    protected $produkKategori;

    public function __construct()
    {
        $this->produkKategori = new ProdukKategoriModel();
    }

    public function index()
    {
        $data['produkKategori'] = $this->produkKategori->findAll(); 
        return view('v_produk_kategori', $data); 
    }

    public function create()
    {
        $dataForm = [
            'category_name' => $this->request->getPost('category_name'), 
            'created_at' => date("Y-m-d H:i:s")        
        ];

        $this->produkKategori->insert($dataForm); 
        return redirect('product-category')->with('success', 'Data Berhasil Ditambah'); 
    }

    public function edit($id)
    {
        $dataForm = [
            'category_name' => $this->request->getPost('category_name'), 
            'updated_at' => date("Y-m-d H:i:s") 
        ];

        $this->produkKategori->update($id, $dataForm); 
        return redirect('product-category')->with('success', 'Data Berhasil Diubah'); 
    }

    public function delete($id)
    {
        $this->produkKategori->delete($id); 
        return redirect('product-category')->with('success', 'Data Berhasil Dihapus'); 
    }
}