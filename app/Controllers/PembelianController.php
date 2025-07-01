<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransactionModel; // Pastikan nama model transaksi Anda benar

class PembelianController extends BaseController
{
    protected $transactionModel;

    public function __construct()
    {
        helper('number');
        $this->transactionModel = new TransactionModel();
    }

    /**
     * Menampilkan halaman daftar semua pembelian.
     */
    public function index()
    {
        $data = [
            'pembelian' => $this->transactionModel->findAll() // Ambil semua data transaksi
        ];

        // Arahkan ke file view v_pembelian.php
        return view('v_pembelian', $data);
    }

    /**
     * Mengubah status pesanan antara 0 dan 1.
     */
    public function updateStatus($id)
    {
        // Cari data transaksi berdasarkan ID
        $pembelian = $this->transactionModel->find($id);

        if ($pembelian) {
            // Logika untuk mengubah status: jika 0 jadi 1, jika 1 jadi 0
            $newStatus = $pembelian['status'] == 0 ? 1 : 0;
            
            // Update status di database
            $this->transactionModel->update($id, ['status' => $newStatus]);

            session()->setFlashdata('success', 'Status pesanan berhasil diubah.');
        } else {
            session()->setFlashdata('failed', 'Data pesanan tidak ditemukan.');
        }

        return redirect()->to('/pembelian');
    }
}