<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - TOKO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .dashboard-header {
            padding-top: 2rem;
            padding-bottom: 2rem;
        }
        .table-container {
            background: white;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        .table th, .table td {
            vertical-align: middle;
            text-align: left;
            font-size: 14px;
        }
        .table th:first-child, .table td:first-child {
            text-align: center;
        }
    </style>
  </head>
  <body>
    <?php 
    function curl(){ 
        $curl = curl_init(); 
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://localhost:8080/api",
            CURLOPT_RETURNTRANSFER => true, 
            CURLOPT_TIMEOUT => 10,
            CURLOPT_CUSTOMREQUEST => "GET", 
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: random123678abcghi",
            ),
        ));
            
        $output = curl_exec($curl);     
        curl_close($curl);      
        
        $data = json_decode($output);   
        
        return $data;
    } 
    ?>
    <div class="container">
        <div class="dashboard-header text-center">
            <h1 class="display-5 fw-normal text-body-emphasis">Dashboard - TOKO</h1>
            <p class="fs-5 text-body-secondary"><?= date("l, d-m-Y H:i:s") ?></p>
        </div> 

        <div class="table-container">
            <h4 class="mb-4">Transaksi Pembelian</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Alamat</th>
                            <th>Total Harga</th>
                            <th>Ongkir</th>
                            <th>Status</th>
                            <th>Tanggal Transaksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $send1 = curl();
                            if (is_object($send1) && property_exists($send1, 'status') && is_object($send1->status) && $send1->status->code == 200) {
                                $hasil1 = $send1->results;
                                $i = 1; 

                                if(!empty($hasil1)){
                                    foreach($hasil1 as $item1){ 
                        ?>
                                        <tr>
                                            <td class="text-center"><?= $i++ ?></td>
                                            <td><?= $item1->username; ?></td>
                                            <td><?= $item1->alamat; ?></td>
                                            <td>
                                                <?= "IDR " . number_format($item1->total_harga, 0, ',', '.') ?>
                                                <br>
                                                <small class="text-muted">(<?= $item1->jumlah_item ?? 0; ?> Item)</small>
                                            </td>
                                            <td><?= "IDR " . number_format($item1->ongkir, 0, ',', '.') ?></td>
                                            <td>
                                                <!-- ===== BAGIAN YANG DIPERBAIKI ===== -->
                                                <!-- Kelas text-danger dan text-success dihapus -->
                                                <?php if ($item1->status == 0) : ?>
                                                    <span>Belum Selesai</span>
                                                <?php else : ?>
                                                    <span>Sudah Selesai</span>
                                                <?php endif; ?>
                                                <!-- ================================= -->
                                            </td>
                                            <td><?= $item1->created_at; ?></td>
                                        </tr> 
                        <?php
                                    } 
                                } else {
                                    echo '<tr><td colspan="7" class="text-center">Tidak ada data transaksi.</td></tr>';
                                }
                            } else {
                                echo '<tr><td colspan="7" class="text-center">Tidak ada data atau gagal mengambil data dari API.</td></tr>';
                            }
                        ?> 
                    </tbody>
                </table>
            </div>
        </div> 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
