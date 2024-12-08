<?= $this->extend('partials/main') ?>

<?= $this->section('title') ?>
Rincian Produk
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
    padding-left: 300px;
    padding-right: 300px;
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 400px;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
</style>
<?= $this->endSection();?>
<?= $this->section('breadcumb') ?>
<meta name="csrf-token" content="<?= csrf_hash() ?>">

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Rincian Produk</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/superadmin/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Rincian Produk</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="content">
    <div class="container-fluid">
        <table class="table">
            <tr>
                <th>Brand</th>
                <td><?= esc($product['brand']) ?></td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('brand', <?= esc($product['id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Kategori</th>
                <td><?= esc($product['category']) ?></td>
                <td></td>
            </tr>
            <tr>
                <th>Subkategori</th>
                <td><?= esc($product['subcategory']) ?></td>
                <td></td>
            </tr>
            <tr>
                <th>Tipe Produk</th>
                <td><?= esc($product['product_type']) ?></td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button onclick="openProductTypeModal()" class="btn btn-sm btn-primary">Edit</button></td>
                <?php endif; ?>
            </tr>

            <!--<?php if ($product['status'] == 'approved'): ?>
            <tr>
                <th>Harga</th>
                <?php if ($product['harga'] != null): ?>
                <td><?= esc($product['harga'] ?? '') ?></td>
                <?php elseif ($product['harga'] == null): ?>
                <td>Belum Ditentukan</td>
                <?php endif; ?>
                <td><button onclick="openHargaModal()" class="btn btn-sm btn-primary">Edit</button></td>
            </tr>
            <?php endif; ?>-->


            <!--<?php if ($product['status'] == 'approved'): ?>
            <tr>
                <th>Harga</th>
                <?php if ($product['harga'] != null): ?>
                <td><?= esc($product['harga'] ?? '') ?></td>
                <?php elseif ($product['harga'] == null): ?>
                <td>Belum Ditentukan</td>
                <?php endif; ?>
                <td><button onclick="openHargaModal()" class="btn btn-sm btn-primary">Edit</button></td>
            </tr>
            <?php endif; ?>-->

            <tr>
                <th>Warna</th>
                <td><?= esc($product['color']) ?></td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button onclick="setColorModalData('<?= esc($product['id']) ?>', '<?= esc($product['color']) ?>')"
                        class="btn btn-sm btn-primary">Edit</button>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th>Dimensi Produk</th>
                <td id="productDimensionsValue"><?= esc($product['product_dimensions']) ?></td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button onclick="openProductDimensionsModal()" class="btn btn-sm btn-primary">Edit</button></td>
                <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th>Dimensi Kemasan</th>
                <td id="packagingDimensionsValue"><?= esc($product['packaging_dimensions']) ?></td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button onclick="openPackagingDimensionsModal()" class="btn btn-sm btn-primary">Edit</button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Konsumsi Daya</th>
                <td><?= esc($product['daya']) ?> Watt</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button onclick="openPowerModal()" class="btn btn-sm btn-primary">Edit</button>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th>Berat Produk</th>
                <td><?= esc($product['berat']) ?> Kg</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button onclick="openWeightModal()" class="btn btn-sm btn-primary">Edit</button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Negara Pembuat</th>
                <td><?= esc($product['pembuat']) ?></td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button onclick="openManufacturerModal()" class="btn btn-sm btn-primary">Edit</button></td>
                <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th>Keunggulan</th>
                <td>
                    <?= esc($product['advantage1']) ?><br>
                    <?= esc($product['advantage2']) ?><br>
                    <?= esc($product['advantage3']) ?><br>
                    <?= esc($product['advantage4']) ?><br>
                    <?= esc($product['advantage5']) ?><br>
                    <?= esc($product['advantage6']) ?></td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button onclick="openAdvantagesModal()" class="btn btn-sm btn-primary">Edit</button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Foto Produk</th>
                <td>
                    <a href="<?= base_url('uploads/' . esc($product['gambar_depan'])) ?>" target="_blank">Gambar
                        Depan</a><br>
                    <?php if (!empty($product['gambar_belakang'])): ?>
                    <a href="<?= base_url('uploads/' . esc($product['gambar_belakang'])) ?>" target="_blank">Gambar
                        Belakang</a><br>
                    <?php endif; ?>

                    <?php if (!empty($product['gambar_atas'])): ?>
                    <a href="<?= base_url('uploads/' . esc($product['gambar_atas'])) ?>" target="_blank">Gambar
                        Atas</a><br>
                    <?php endif; ?>
                    <?php if (!empty($product['gambar_bawah'])): ?>
                    <a href="<?= base_url('uploads/' . esc($product['gambar_bawah'])) ?>" target="_blank">Gambar
                        Bawah</a><br>
                    <?php endif; ?>

                    <?php if (!empty($product['gambar_samping_kiri'])): ?>
                    <a href="<?= base_url('uploads/' . esc($product['gambar_samping_kiri'])) ?>" target="_blank">Gambar
                        Samping Kiri</a><br>
                    <?php endif; ?>

                    <?php if (!empty($product['gambar_samping_kanan'])): ?>
                    <a href="<?= base_url('uploads/' . esc($product['gambar_samping_kanan'])) ?>" target="_blank">Gambar
                        Samping Kanan</a><br>
                    <?php endif; ?>
                </td>
                <?php if ($product['status'] === 'approved'): ?>
                <td>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#editPicsModal<?= $product['id'] ?>">Edit</button>
                </td>
                <?php endif; ?>
            </tr>
            <?php if (!empty($product['video_produk'])): ?>
            <tr>
                <th>Video Produk</th>
                <td>
                    <a href="<?= esc($product['video_produk'] ?? '')?>" target="_blank">Video Produk</a>
                </td>
                <td>
                    <?php if ($product['status'] == 'approved'): ?>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#editVideoModal">Edit</button>
                    <?php endif; ?>
                </td>

            </tr>
            <?php endif; ?>
            <tr>
                <th>Diajukan Oleh</th>
                <td><?= esc($product['submitted_by']) ?></td>
                <td></td>
            </tr>
            <tr>
                <th>Tanggal Diajukan</th>
                <td><?= esc($product['confirmed_at']) ?></td>
                <td></td>
            </tr>
            <!-- Conditional Fields -->
            <?php if ($product['category'] == 'TV'): ?>
            <!-- For category TV (ID 9): Display "dimensi produk dengan stand" and "resolusi panel" -->
            <tr>
                <th>Dimensi Produk dengan Stand</th>
                <td id="standDimensionsValue"><?= esc($product['pstand_dimensions']) ?></td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button onclick="openStandDimensionsModal()" class="btn btn-sm btn-primary">Edit</button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Ukuran</th>
                <td><?= esc($product['ukuran']) ?></td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('ukuran', <?= esc($product['id']) ?>, <?= esc($product['subcategory_id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Resolusi Panel</th>
                <td id="resolutionValue"><?= esc($product['panel_resolution']) ?> Pixel</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button onclick="openResolutionModal()" class="btn btn-sm btn-primary">Edit</button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Garansi Panel</th>
                <td><?= esc($product['garansi_panel']) ?> Tahun</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('garansi_panel', <?= esc($product['id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Garansi Sparepart</th>
                <td><?= esc($product['sparepart_warranty']) ?> Tahun</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('sparepart_warranty', <?= esc($product['id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <?php endif; ?>

            <?php if ($product['category'] == 'AC'): ?>
            <!-- For category AC (ID 3): Display "kapasitas pendinginan", "cspf rating", "tipe refrigerant" -->
            <tr>
                <th>Kapasitas Pendinginan</th>
                <td><?= esc($product['cooling_capacity']) ?> BTU/h</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button onclick="openCoolingModal()" class="btn btn-sm btn-primary">Edit</button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Kapasitas</th>
                <td><?= esc($product['capacity']) ?></td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('capacity', <?= esc($product['id']) ?>, <?= esc($product['subcategory_id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Garansi Kompresor</th>
                <td><?= esc($product['compressor_warranty']) ?> Tahun</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('compressor_warranty', <?= esc($product['id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Tipe Refrigerant</th>
                <td><?= esc($product['refrigrant']) ?></td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('refrigrant', <?= esc($product['id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Garansi Sparepart</th>
                <td><?= esc($product['sparepart_warranty']) ?> Tahun</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('sparepart_warranty', <?= esc($product['id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            <tr>
                <th>CSPF Rating</th>
                <td>
                    <?= esc($product['cspf']) ?>/5
                    <?php if ($product['cspf'] == 5): ?>
                    <img src="<?= base_url('/images/5stars.png') ?>" alt="cspf-star" style="height:35px; padding: 5px">
                    <?php elseif ($product['cspf'] >= 4.00 && $product['cspf'] < 5): ?>
                    <img src="<?= base_url('/images/4stars.png') ?>" alt="cspf-star" style="height:35px; padding: 5px">
                    <?php elseif ($product['cspf'] >= 3.00 && $product['cspf'] < 4.00): ?>
                    <img src="<?= base_url('/images/3stars.png') ?>" alt="cspf-star" style="height:35px; padding: 5px">
                    <?php elseif ($product['cspf'] >= 2.00 && $product['cspf'] < 3.00): ?>
                    <img src="<?= base_url('/images/2stars.png') ?>" alt="cspf-star" style="height:35px; padding: 5px">
                    <?php elseif ($product['cspf'] >= 1.00 && $product['cspf'] < 2.00): ?>
                    <img src="<?= base_url('/images/1star.png') ?>" alt="cspf-star" style="height:35px; padding: 5px">
                    <?php endif; ?>
                </td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button onclick="opencspfModal()" class="btn btn-sm btn-primary">Edit</button></td>
                <?php endif; ?>
            </tr>

            <?php endif; ?>

            <?php if ($product['category'] == 'KULKAS' || $product['category'] == 'FREEZER' || $product['category'] == 'SHOWCASE' ): ?>
            <tr>
                <th>Kapasitas</th>
                <td><?= esc($product['capacity']) ?></td>
            </tr>
            <tr>
                <th>Garansi Kompresor</th>
                <td><?= esc($product['compressor_warranty']) ?> Tahun</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('compressor_warranty', <?= esc($product['id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Garansi Sparepart</th>
                <td><?= esc($product['sparepart_warranty']) ?> Tahun</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('sparepart_warranty', <?= esc($product['id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <?php endif; ?>

            <?php if ($product['category'] == 'MESIN CUCI'|| $product['subcategory'] == 'CHOPPER' || $product['subcategory'] == 'BLENDER' || $product['subcategory'] == 'JUICER'): ?>
            <tr>
                <th>Kapasitas</th>
                <td><?= esc($product['capacity']) ?></td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('capacity', <?= esc($product['id']) ?>, <?= esc($product['subcategory_id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Garansi Sparepart</th>
                <td><?= esc($product['sparepart_warranty']) ?> Tahun</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('sparepart_warranty', <?= esc($product['id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Garansi Motor</th>
                <td><?= esc($product['garansi_motor']) ?> Tahun</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('garansi_motor', <?= esc($product['id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <?php endif; ?>

            <?php if ($product['subcategory'] == 'SPEAKER'): ?>
            <tr>
                <th>Ukuran</th>
                <td><?= esc($product['ukuran']) ?></td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('ukuran', <?= esc($product['id']) ?>, <?= esc($product['subcategory_id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Garansi Semua Service</th>
                <td><?= esc($product['garansi_semua_service']) ?> Tahun</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('garansi_semua_service', <?= esc($product['id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <?php endif; ?>

            <?php if ($product['subcategory'] == 'KIPAS ANGIN'): ?>
            <tr>
                <th>Ukuran</th>
                <td><?= esc($product['ukuran']) ?></td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('ukuran', <?= esc($product['id']) ?>, <?= esc($product['subcategory_id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Garansi Motor</th>
                <td><?= esc($product['garansi_motor']) ?> Tahun</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('garansi_motor', <?= esc($product['id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <?php endif; ?>

            <?php if ($product['subcategory'] == 'MIXER' || $product['subcategory'] == 'HAND MIXER'): ?>
            <tr>
                <th>Garansi Motor</th>
                <td><?= esc($product['garansi_motor']) ?> Tahun</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('garansi_motor', <?= esc($product['id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <?php endif; ?>

            <?php if ($product['subcategory'] == 'DISPENSER GALON ATAS' || $product['subcategory'] == 'DISPENSER GALON BAWAH'): ?>
            <tr>
                <th>Kapasitas Air Dingin</th>
                <td><?= esc($product['kapasitas_air_dingin']) ?> Liter</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button onclick="openColdCapModal()" class="btn btn-sm btn-primary">Edit</button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Kapasitas Air Panas</th>
                <td><?= esc($product['kapasitas_air_panas']) ?> Liter</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button onclick="openHotCapModal()" class="btn btn-sm btn-primary">Edit</button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Garansi Kompresor</th>
                <td><?= esc($product['compressor_warranty'])?> Tahun</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('compressor_warranty', <?= esc($product['id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <?php endif; ?>

            <?php if ($product['subcategory'] == 'MOTOR LISTRIK'): ?>
            <tr>
                <th>Kapasitas Baterai</th>
                <td><?= esc($product['capacity']) ?></td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('capacity', <?= esc($product['id']) ?>, <?= esc($product['subcategory_id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Kecepatan Maksimal</th>
                <td><?= esc($product['kapasitas_air_dingin']) ?> Km/Jam</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button onclick="openColdCapModal()" class="btn btn-sm btn-primary">Edit</button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Jarak Tempuh</th>
                <td><?= esc($product['kapasitas_air_panas']) ?> Km</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button onclick="openHotCapModal()" class="btn btn-sm btn-primary">Edit</button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Garansi Sparepart</th>
                <td><?= esc($product['compressor_warranty'])?> Tahun</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('sparepart_warranty', <?= esc($product['id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <?php endif; ?>

            <?php if ($product['subcategory'] == 'VACUUM CLEANER'): ?>
            <tr>
                <th>Kapasitas</th>
                <td><?= esc($product['capacity']) ?></td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('capacity', <?= esc($product['id']) ?>, <?= esc($product['subcategory_id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Garansi Sparepart</th>
                <td><?= esc($product['garansi_semua_service']) ?> Tahun</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('garansi_semua_service', <?= esc($product['id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Garansi Jasa Service</th>
                <td><?= esc($product['sparepart_warranty'])?> Tahun</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('sparepart_warranty', <?= esc($product['id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>

            <?php endif; ?>

            <?php if ($product['subcategory'] == 'TOASTER' || $product['subcategory'] == 'WAFFLE MAKER'): ?>
            <tr>
                <th>Kapasitas</th>
                <td><?= esc($product['capacity']) ?></td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('capacity', <?= esc($product['id']) ?>, <?= esc($product['subcategory_id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Garansi Elemen Panas</th>
                <td><?= esc($product['garansi_elemen_panas']) ?> Tahun</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('garansi_elemen_panas', <?= esc($product['id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Garansi Sparepart</th>
                <td><?= esc($product['sparepart_warranty'])?> Tahun</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('sparepart_warranty', <?= esc($product['id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>

            <?php endif; ?>

            <?php if ($product['subcategory'] == 'MICROWAVE' ||$product['subcategory'] == 'MAGIC COM' ||$product['subcategory'] == 'RICE COOKER' ||$product['subcategory'] == 'OVEN'||$product['subcategory'] == 'WATER BOILER'  ||$product['subcategory'] == 'WATER HEATER' || $product['subcategory'] == 'COFFEE MAKER'||$product['subcategory'] == 'CUP SEALER'||$product['subcategory'] == 'PRESSURE COOKER' ||$product['subcategory'] == 'OVEN FRYER'): ?>
            <tr>
                <th>Kapasitas</th>
                <td><?= esc($product['capacity']) ?></td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('capacity', <?= esc($product['id']) ?>, <?= esc($product['subcategory_id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Garansi Elemen Panas</th>
                <td><?= esc($product['garansi_elemen_panas']) ?> Tahun</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('garansi_elemen_panas', <?= esc($product['id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Garansi Service</th>
                <td><?= esc($product['sparepart_warranty'])?> Tahun</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('sparepart_warranty', <?= esc($product['id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>

            <?php endif; ?>

            <?php if ($product['subcategory'] == 'SETRIKA'|| $product['subcategory'] == 'HAIR DRYER'): ?>
            <tr>
                <th>Garansi Elemen Panas</th>
                <td><?= esc($product['garansi_elemen_panas']) ?> Tahun</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('garansi_elemen_panas', <?= esc($product['id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Garansi Service</th>
                <td><?= esc($product['sparepart_warranty'])?> Tahun</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('sparepart_warranty', <?= esc($product['id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <?php endif; ?>


            <?php if ($product['subcategory'] == 'AIR COOLER' || $product['subcategory'] == 'KOMPOR TUNGKU' || $product['subcategory'] == 'KOMPOR TANAM'  || $product['subcategory'] == 'AIR FRYER'|| $product['subcategory'] == 'FREE STANDING GAS COOKER' || $product['subcategory'] == 'GRILLER'|| $product['subcategory'] == 'KOMPOR GAS OVEN' || $product['subcategory'] == 'KOMPOR LISTRIK'): ?>
            <tr>
                <th>Kapasitas</th>
                <td><?= esc($product['capacity']) ?></td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('capacity', <?= esc($product['id']) ?>, <?= esc($product['subcategory_id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Garansi Service</th>
                <td><?= esc($product['garansi_semua_service']) ?> Tahun</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('garansi_semua_service', <?= esc($product['id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Garansi Sparepart</th>
                <td><?= esc($product['sparepart_warranty'])?> Tahun</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('sparepart_warranty', <?= esc($product['id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <?php endif; ?>

            <?php if ($product['subcategory'] == 'SMART DOOR LOCK' || $product['subcategory'] == 'SMART LED'): ?>
            <tr>
                <th>Garansi Service</th>
                <td><?= esc($product['garansi_semua_service']) ?> Tahun</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('garansi_semua_service', <?= esc($product['id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Garansi Sparepart</th>
                <td><?= esc($product['sparepart_warranty'])?> Tahun</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('sparepart_warranty', <?= esc($product['id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <?php endif; ?>

            <?php if ($product['subcategory'] == 'AIR CURTAIN'): ?>
            <tr>
                <th>Ukuran</th>
                <td><?= esc($product['ukuran']) ?></td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('ukuran', <?= esc($product['id']) ?>, <?= esc($product['subcategory_id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Garansi Service</th>
                <td><?= esc($product['garansi_semua_service']) ?> Tahun</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('garansi_semua_service', <?= esc($product['id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Garansi Sparepart</th>
                <td><?= esc($product['sparepart_warranty'])?> Tahun</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('sparepart_warranty', <?= esc($product['id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <?php endif; ?>

            <?php if ($product['subcategory'] == 'COOKER HOOD'): ?>
            <tr>
                <th>Ukuran</th>
                <td><?= esc($product['ukuran']) ?></td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('ukuran', <?= esc($product['id']) ?>, <?= esc($product['subcategory_id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Garansi Motor</th>
                <td><?= esc($product['garansi_semua_service']) ?> Tahun</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('garansi_semua_service', <?= esc($product['id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Garansi Sparepart</th>
                <td><?= esc($product['sparepart_warranty'])?> Tahun</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('sparepart_warranty', <?= esc($product['id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <?php endif; ?>

            <?php if ($product['subcategory'] == 'AIR PURIFIER'): ?>
            <tr>
                <th>Kapasitas</th>
                <td><?= esc($product['kapasitas_air_dingin']) ?> M²</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button onclick="openColdCapModal()" class="btn btn-sm btn-primary">Edit</button></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th>Garansi Sparepart & Jasa Service</th>
                <td><?= esc($product['garansi_semua_service']) ?> Tahun</td>
                <?php if ($product['status'] == 'approved'): ?>
                <td><button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('garansi_semua_service', <?= esc($product['id']) ?>)">
                        Edit
                    </button></td>
                <?php endif; ?>
            </tr>
            <?php endif; ?>

            <?php if ($product['status'] == 'approved'): ?>
            <tr>
                <th>Tanggal Disetujui</th>
                <td><?= esc($product['approved_at']) ?></td>
                <td></td>
            </tr>
            <?php endif; ?>

            <?php if ($product['status'] == 'rejected'): ?>
            <tr>
                <th>Tanggal Ditolak</th>
                <td><?= esc($product['rejected_at']) ?></td>
                <td></td>
            </tr>
            <?php endif; ?>
        </table>

        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="editForm">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit <span id="modalFieldLabel"></span></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="closeModal()"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="productId" name="product_id">
                            <input type="hidden" id="subcategoryId" name="subcategory_id">
                            <input type="hidden" id="fieldName" name="field_name">
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                            <div class="form-group">
                                <label for="fieldValue">Select New Value</label>
                                <select id="fieldValue" name="field_value" class="form-control">
                                    <!-- Options will be dynamically populated -->
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="closeModal()"
                                data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal for Color -->
        <div class="modal fade" id="colorModal" tabindex="-1" role="dialog" aria-labelledby="colorModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="colorModalLabel">Edit Warna</h5>

                    </div>
                    <div class="modal-body">
                        <input type="text" id="colorInput" class="form-control" value="<?= esc($product['color']) ?>"
                            placeholder="Masukan Warna">
                        <input type="hidden" id="id" value="<?= esc($product['id']) ?>"> <!-- Include Product ID -->
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                        <!-- Include CSRF Token -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="updateColor()">Update</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Power -->
        <div class="modal fade" id="powerModal" tabindex="-1" role="dialog" aria-labelledby="powerModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="powerModalLabel">Edit Konsumsi Daya</h5>

                    </div>
                    <div class="modal-body">
                        <input type="text" id="powerInput" class="form-control" value="<?= esc($product['daya']) ?>"
                            placeholder="Konsumsi Daya (watt)">
                        <input type="hidden" id="id" value="<?= esc($product['id']) ?>"> <!-- Include Product ID -->
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                        <!-- Include CSRF Token -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="updatePower()">Update</button>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Weight -->
        <div class="modal fade" id="weightModal" tabindex="-1" role="dialog" aria-labelledby="weightModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="weightModalLabel">Edit Berat Produk</h5>

                    </div>
                    <div class="modal-body">
                        <input type="text" id="weightInput" class="form-control" value="<?= esc($product['berat']) ?>"
                            placeholder="Berat Produk (Kg)">
                        <input type="hidden" id="id" value="<?= esc($product['id']) ?>"> <!-- Include Product ID -->
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                        <!-- Include CSRF Token -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="updateWeight()">Update</button>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="coldcapModal" tabindex="-1" role="dialog" aria-labelledby="coldcapModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="coldcapModalLabel">Edit Data</h5>

                    </div>
                    <div class="modal-body">
                        <input type="text" id="coldcapInput" class="form-control"
                            value="<?= esc($product['kapasitas_air_dingin']) ?>">
                        <input type="hidden" id="id" value="<?= esc($product['id']) ?>"> <!-- Include Product ID -->
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                        <!-- Include CSRF Token -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="updateColdCap()">Update</button>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editPicsModal<?= $product['id'] ?>" tabindex="-1"
            aria-labelledby="editPicsModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="width:600px; height:630px;">
                    <form action="<?= base_url('superadmin/updatePics') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editPicsModalLabel">Edit Foto Produk</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Gambar Depan -->
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Gambar Depan</label><br>
                                    <?php if (!empty($product['gambar_depan'])): ?>
                                    <a href="<?= base_url('uploads/' . esc($product['gambar_depan'])) ?>"
                                        target="_blank">Lihat Gambar Depan</a><br>
                                    <?php else: ?>
                                    <span class="text-muted">Belum ada gambar</span><br>
                                    <?php endif; ?>
                                    <input type="file" class="form-control mt-2" name="gambar_depan">
                                </div>

                                <!-- Gambar Belakang -->
                                <div class="col-md-6">
                                    <label class="form-label">Gambar Belakang</label><br>
                                    <?php if (!empty($product['gambar_belakang'])): ?>
                                    <a href="<?= base_url('uploads/' . esc($product['gambar_belakang'])) ?>"
                                        target="_blank">Lihat Gambar Belakang</a><br>
                                    <?php else: ?>
                                    <span class="text-muted">Belum ada gambar</span><br>
                                    <?php endif; ?>
                                    <input type="file" class="form-control mt-2" name="gambar_belakang">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Gambar Kiri</label><br>
                                    <?php if (!empty($product['gambar_samping_kiri'])): ?>
                                    <a href="<?= base_url('uploads/' . esc($product['gambar_samping_kiri'])) ?>"
                                        target="_blank">Lihat Gambar Kiri</a><br>
                                    <?php else: ?>
                                    <span class="text-muted">Belum ada gambar</span><br>
                                    <?php endif; ?>
                                    <input type="file" class="form-control mt-2" name="gambar_samping_kiri">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Gambar Kanan</label><br>
                                    <?php if (!empty($product['gambar_samping_kanan'])): ?>
                                    <a href="<?= base_url('uploads/' . esc($product['gambar_samping_kanan'])) ?>"
                                        target="_blank">Lihat Gambar Kanan</a><br>
                                    <?php else: ?>
                                    <span class="text-muted">Belum ada gambar</span><br>
                                    <?php endif; ?>
                                    <input type="file" class="form-control mt-2" name="gambar_samping_kanan">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Gambar Atas</label><br>
                                    <?php if (!empty($product['gambar_atas'])): ?>
                                    <a href="<?= base_url('uploads/' . esc($product['gambar_atas'])) ?>"
                                        target="_blank">Lihat Gambar Atas</a><br>
                                    <?php else: ?>
                                    <span class="text-muted">Belum ada gambar</span><br>
                                    <?php endif; ?>
                                    <input type="file" class="form-control mt-2" name="gambar_atas">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Gambar Bawah</label><br>
                                    <?php if (!empty($product['gambar_bawah'])): ?>
                                    <a href="<?= base_url('uploads/' . esc($product['gambar_bawah'])) ?>"
                                        target="_blank">Lihat Gambar Bawah</a><br>
                                    <?php else: ?>
                                    <span class="text-muted">Belum ada gambar</span><br>
                                    <?php endif; ?>
                                    <input type="file" class="form-control mt-2" name="gambar_bawah">
                                </div>
                            </div>

                            <!-- Video Produk Section -->
                            <?php if (empty($product['video_produk'])): ?>
                            <hr>
                            <div class="mb-3">
                                <h6>Video Produk (YouTube)</h6>
                                <input type="url" class="form-control" name="video_produk"
                                    placeholder="Masukkan YouTube Link">
                                <small class="text-muted">Pastikan link valid (YouTube)</small>
                            </div>
                            <?php endif; ?>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editVideoModal" tabindex="-1" aria-labelledby="editVideoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?= base_url('superadmin/updateVideo') ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editVideoModalLabel">Edit Video Produk</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">YouTube Link</label><br>
                                <a href="<?= esc($product['video_produk'] ?? '')?>" target="_blank">Tonton Video
                                    Produk</a>
                                <input type="url" class="form-control" name="video_produk" value=""
                                    placeholder="Link YouTube">
                                <small class="text-muted">Pastikan link valid (YouTube)</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="hargaModal" tabindex="-1" role="dialog" aria-labelledby="hargaModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hargaModalLabel">Tentukan Harga</h5>

                    </div>
                    <div class="modal-body">
                        <input type="text" id="hargaInput" class="form-control" value="<?= esc($product['harga']) ?>"
                            placeholder="Harga (Angka Saja)">
                        <input type="hidden" id="id" value="<?= esc($product['id']) ?>"> <!-- Include Product ID -->
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                        <!-- Include CSRF Token -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="updateHarga()">Update</button>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="hargaModal" tabindex="-1" role="dialog" aria-labelledby="hargaModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hargaModalLabel">Tentukan Harga</h5>

                    </div>
                    <div class="modal-body">
                        <input type="text" id="hargaInput" class="form-control" value="<?= esc($product['harga']) ?>"
                            placeholder="Harga (Angka Saja)">
                        <input type="hidden" id="id" value="<?= esc($product['id']) ?>"> <!-- Include Product ID -->
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                        <!-- Include CSRF Token -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="updateHarga()">Update</button>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="hotcapModal" tabindex="-1" role="dialog" aria-labelledby="hotcapModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hotcapModalLabel">Edit Data</h5>

                    </div>
                    <div class="modal-body">
                        <input type="text" id="hotcapInput" class="form-control"
                            value="<?= esc($product['kapasitas_air_panas']) ?>">
                        <input type="hidden" id="id" value="<?= esc($product['id']) ?>"> <!-- Include Product ID -->
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                        <!-- Include CSRF Token -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="updateHotCap()">Update</button>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Cooling Capacity -->
        <div class="modal fade" id="coolingModal" tabindex="-1" role="dialog" aria-labelledby="coolingModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="coolingModalLabel">Edit Kapasitas Pendinginan</h5>

                    </div>
                    <div class="modal-body">
                        <input type="number" id="ccInput" class="form-control"
                            value="<?= esc($product['cooling_capacity']) ?>"
                            placeholder="Kapasitas Pendinginan (BTU/h)">
                        <input type="hidden" id="id" value="<?= esc($product['id']) ?>"> <!-- Include Product ID -->
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                        <!-- Include CSRF Token -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="updateCooling()">Update</button>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for CSPF -->
        <div class="modal fade" id="cspfModal" tabindex="-1" role="dialog" aria-labelledby="cspfModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cspfModalLabel">CSPF Rating</h5>

                    </div>
                    <div class="modal-body">
                        <input type="number" id="cspfInput" class="form-control" value="<?= esc($product['cspf']) ?>"
                            placeholder="CSPF Rating (1-5)" min="1" max="5" step="0.1">
                        <input type="hidden" id="id" value="<?= esc($product['id']) ?>"> <!-- Include Product ID -->
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                        <!-- Include CSRF Token -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="updateCspf()">Update</button>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Manufacturer -->
        <div class="modal fade" id="manufacturerModal" tabindex="-1" role="dialog"
            aria-labelledby="manufacturerModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="manufacturerModalLabel">Edit Negara Pembuat</h5>

                    </div>
                    <div class="modal-body">
                        <input type="text" id="manufacturerInput" class="form-control"
                            value="<?= esc($product['pembuat']) ?>" placeholder="Negara Pembuat">
                        <input type="hidden" id="id" value="<?= esc($product['id']) ?>"> <!-- Include Product ID -->
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                        <!-- Include CSRF Token -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="updateManufacturer()">Update</button>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Manufacturer -->
        <div class="modal fade" id="producttypeModal" tabindex="-1" role="dialog"
            aria-labelledby="producttypeModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="producttypeModalLabel">Edit Tipe Produk</h5>

                    </div>
                    <div class="modal-body">
                        <input type="text" id="producttypeInput" value="<?= esc($product['product_type']) ?>"
                            class="form-control" placeholder="Masukan Tipe Produk" pattern="^[a-zA-Z0-9\s]+$"
                            title="Only alphanumeric characters are allowed." style="text-transform: uppercase;"
                            required oninput="this.value = this.value.replace(/[^a-zA-Z0-9\s]/g, '')">
                        <input type="hidden" id="id" value="<?= esc($product['id']) ?>"> <!-- Include Product ID -->
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                        <!-- Include CSRF Token -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="updateProductType()">Update</button>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Product Dimensions -->
        <div class="modal fade" id="productDimensionsModal" tabindex="-1" role="dialog"
            aria-labelledby="productDimensionsModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productDimensionsModalLabel">Edit Dimensi Produk</h5>

                    </div>
                    <div class="modal-body">
                        <label for="lengthInput">Panjang (cm)</label>
                        <input type="number" id="lengthInput" class="form-control" required>

                        <label for="widthInput" class="mt-2">Lebar (cm)</label>
                        <input type="number" id="widthInput" class="form-control" required>

                        <label for="heightInput" class="mt-2">Tinggi (cm)</label>
                        <input type="number" id="heightInput" class="form-control" required>

                        <!-- Hidden input for the product ID -->
                        <input type="hidden" id="id" value="<?= esc($product['id']) ?>">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>"> <!-- CSRF Token -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary"
                            onclick="updateProductDimensions()">Update</button>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Product Dimensions -->
        <div class="modal fade" id="packagingDimensionsModal" tabindex="-1" role="dialog"
            aria-labelledby="packagingDimensionsModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="packagingDimensionsModalLabel">Edit Dimensi Kemasan</h5>

                    </div>
                    <div class="modal-body">
                        <label for="plengthInput">Panjang (cm)</label>
                        <input type="number" id="plengthInput" class="form-control" required>

                        <label for="pwidthInput" class="mt-2">Lebar (cm)</label>
                        <input type="number" id="pwidthInput" class="form-control" required>

                        <label for="pheightInput" class="mt-2">Tinggi (cm)</label>
                        <input type="number" id="pheightInput" class="form-control" required>

                        <!-- Hidden input for the product ID -->
                        <input type="hidden" id="id" value="<?= esc($product['id']) ?>">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>"> <!-- CSRF Token -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary"
                            onclick="updatePackagingDimensions()">Update</button>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Stand Dimensions -->
        <div class="modal fade" id="standDimensionsModal" tabindex="-1" role="dialog"
            aria-labelledby="standDimensionsModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="standDimensionsModalLabel">Edit Dimensi Produk (Dengan Stand)</h5>

                    </div>
                    <div class="modal-body">
                        <label for="slengthInput">Panjang (cm)</label>
                        <input type="number" id="slengthInput" class="form-control" required>

                        <label for="swidthInput" class="mt-2">Lebar (cm)</label>
                        <input type="number" id="swidthInput" class="form-control" required>

                        <label for="sheightInput" class="mt-2">Tinggi (cm)</label>
                        <input type="number" id="sheightInput" class="form-control" required>

                        <!-- Hidden input for the product ID -->
                        <input type="hidden" id="id" value="<?= esc($product['id']) ?>">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>"> <!-- CSRF Token -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="updateStandDimensions()">Update</button>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Panel Resolution -->
        <div class="modal fade" id="resolutionModal" tabindex="-1" role="dialog" aria-labelledby="resolutionModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="resolutionModalLabel">Edit Resolusi Panel</h5>

                    </div>
                    <div class="modal-body">
                        <label for="xresolInput">X (Pixel)</label>
                        <input type="number" id="xresolInput" class="form-control" required>

                        <label for="yresolInput" class="mt-2">Y (Pixel)</label>
                        <input type="number" id="yresolInput" class="form-control" required>

                        <!-- Hidden input for the product ID -->
                        <input type="hidden" id="id" value="<?= esc($product['id']) ?>">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>"> <!-- CSRF Token -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="updateResolution()">Update</button>

                    </div>
                </div>
            </div>
        </div>
        <!-- Modal for Advantages -->
        <div class="modal fade" id="advantagesModal" tabindex="-1" role="dialog" aria-labelledby="advantagesModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="advantagesModalLabel">Edit Keunggulan</h5>

                    </div>
                    <div class="modal-body">
                        <label>Keunggulan*</label>
                        <input style="margin-bottom: 10px" type="text" id="adv1Input"
                            value="<?= esc($product['advantage1'])?>" class="form-control" placeholder="Keunggulan 1"
                            required>
                        <input style="margin-bottom: 10px" type="text" id="adv2Input"
                            value="<?= esc($product['advantage2'])?>" class="form-control" placeholder="Keunggulan 2"
                            required>
                        <input style="margin-bottom: 10px" type="text" id="adv3Input"
                            value="<?= esc($product['advantage3'])?>" class="form-control" placeholder="Keunggulan 3"
                            required>
                        <input style="margin-bottom: 10px" type="text" id="adv4Input"
                            value="<?= esc($product['advantage4'])?>" class="form-control" placeholder="Keunggulan 4">
                        <input style="margin-bottom: 10px" type="text" id="adv5Input"
                            value="<?= esc($product['advantage5'])?>" class="form-control" placeholder="Keunggulan 5">
                        <input type="text" id="adv6Input" value="<?= esc($product['advantage6'])?>" class="form-control"
                            placeholder="Keunggulan 6">
                        <p style="padding: 10px">*3 Keunggulan Pertama Harus Diisi</p>
                        <!-- Hidden input for the product ID -->
                        <input type="hidden" id="id" value="<?= esc($product['id']) ?>">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>"> <!-- CSRF Token -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="updateAdvantages()">Update</button>

                    </div>
                </div>
            </div>
        </div>
        <?php if ($product['status'] == 'confirmed'): ?>
        <div class="mt-4">
            <a href="/superadmin/approve/<?= esc($product['id']) ?>" class="btn btn-success">
                Setujui Produk
            </a>
            <a href="/superadmin/reject/<?= esc($product['id']) ?>" class="btn btn-danger">
                Tolak Produk
            </a>
        </div>
        <?php endif; ?>

        <?php if ($product['status'] == 'rejected'): ?>
        <div class="mt-4">
            <button data-id="<?= esc($product['id']) ?>" class="btn-delete btn btn-danger">
                Hapus Produk
            </button>
        </div>
        <?php endif; ?>
    </div>

    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Hapus Produk Ini?</p>
            <form id="deleteForm" method="POST">
                <?= csrf_field() ?>
                <button type="submit" class="btn btn-danger">Hapus</button>
                <button type="button" id="cancelDeleteBtn" class="btn btn-secondary">Batal</button>
            </form>
        </div>
    </div>

</section>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
    }
});

function openProductDimensionsModal() {
    // Get the existing product dimensions value
    const dimensions = document.getElementById('productDimensionsValue').innerText.replace(' cm', '');
    const [length, width, height] = dimensions.split(' x '); // Split by " x "

    // Populate the modal inputs
    document.getElementById('lengthInput').value = length;
    document.getElementById('widthInput').value = width;
    document.getElementById('heightInput').value = height;

    // Show the modal
    $('#productDimensionsModal').modal('show');
}

function closeModal() {
    const modalInstance = bootstrap.Modal.getInstance(document.getElementById('editModal'));
    modalInstance.hide();
}

function openStandDimensionsModal() {
    // Get the existing product dimensions value
    const sdimensions = document.getElementById('standDimensionsValue').innerText.replace(' cm', '');
    const [slength, swidth, sheight] = sdimensions.split(' x '); // Split by " x "

    // Populate the modal inputs
    document.getElementById('slengthInput').value = slength;
    document.getElementById('swidthInput').value = swidth;
    document.getElementById('sheightInput').value = sheight;

    // Show the modal
    $('#standDimensionsModal').modal('show');
}

function openResolutionModal() {
    // Get the existing product dimensions value
    const resolution = document.getElementById('resolutionValue').innerText.replace(' Pixel', '');
    const [xresol, yresol] = resolution.split(' x '); // Split by " x "

    // Populate the modal inputs
    document.getElementById('xresolInput').value = xresol;
    document.getElementById('yresolInput').value = yresol;

    // Show the modal
    $('#resolutionModal').modal('show');
}

function openEditModal(field, productId, subcategoryId) {
    // Set product ID and field name in the modal's hidden inputs
    document.getElementById('productId').value = productId;
    document.getElementById('subcategoryId').value = subcategoryId;
    document.getElementById('fieldName').value = field;
    document.getElementById('modalFieldLabel').innerText = field.charAt(0).toUpperCase() + field.slice(1);

    // Clear previous options
    document.getElementById('fieldValue').innerHTML = '';

    // Fetch options for the field, filtered by subcategory_id
    fetch(`/getOptions?field=${field}&subcategory_id=${subcategoryId}`)
        .then(response => response.json())
        .then(data => {
            data.options.forEach(option => {
                let optionElement = document.createElement('option');
                optionElement.value = option.name || option.value || option.type || option
                .size; // Assuming 'name' holds the value
                optionElement.text = option.name || option.value || option.type || option.size;
                document.getElementById('fieldValue').appendChild(optionElement);
            });
            // Open the modal after loading options
            new bootstrap.Modal(document.getElementById('editModal')).show();
        })
        .catch(error => console.error('Error fetching options:', error));
}

document.getElementById('editForm').addEventListener('submit', function(event) {

    // Get the form data
    const formData = new FormData(document.getElementById('editForm'));
    formData.append('csrf_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

    // Send data via AJAX
    fetch('/updateProductField', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Handle success (e.g., show a success message, close the modal, etc.)
                alert('Field updated successfully!');
                // Optionally close the modal
                let modal = bootstrap.Modal.getInstance(document.getElementById('editModal'));
                modal.hide();
            } else {
                // Handle failure
                alert('Failed to update field.');
            }
        })
        .catch(error => {
            console.error('Error updating product field:', error);
            alert('There was an error updating the field.');
        });
});

function openPackagingDimensionsModal() {
    // Get the existing product dimensions value
    const pdimensions = document.getElementById('packagingDimensionsValue').innerText.replace(' cm', '');
    const [plength, pwidth, pheight] = pdimensions.split(' x '); // Split by " x "

    // Populate the modal inputs
    document.getElementById('plengthInput').value = plength;
    document.getElementById('pwidthInput').value = pwidth;
    document.getElementById('pheightInput').value = pheight;

    // Show the modal
    $('#packagingDimensionsModal').modal('show');
}

function updateColor() {
    const colorInput = document.getElementById('colorInput');
    const idInput = document.getElementById('id');

    if (!colorInput || !idInput) {
        console.error('One or more elements not found:', {
            colorInput: colorInput,
            idInput: idInput
        });
        alert('Unable to find input fields.');
        return; // Exit the function early
    }

    const color = colorInput.value; // Get the color input value
    const id = `<?= $product['id'] ?>`; // Get the product ID

    // Validate the color input
    if (!color) {
        alert("Color cannot be empty.");
        return;
    }

    const csrfTokenName = '<?= csrf_token() ?>';
    const csrfTokenValue = '<?= csrf_hash() ?>';

    // Send the POST request to update the color
    $.post("<?= base_url('superadmin/updateColor') ?>", {
            id: id,
            color: color,
            [csrfTokenName]: csrfTokenValue
        })
        .done(function(response) {
            // Check if the response is in the expected format
            if (typeof response === "object" && response !== null) {
                if (response.success) {
                    alert(response.message); // Show success message
                    location.reload(); // Reload the page to see the updated color
                } else {
                    alert("Error: " + response.message); // Show error message
                }
            } else {
                alert("Unexpected response format.");
            }
        })
        .fail(function(jqXHR) {
            alert("Request failed: " + jqXHR.statusText);
        });
}

function updatePower() {
    const powerInput = document.getElementById('powerInput');
    const idInput = document.getElementById('id');

    if (!powerInput || !idInput) {
        console.error('One or more elements not found:', {
            powerInput: powerInput,
            idInput: idInput
        });
        alert('Unable to find input fields.');
        return; // Exit the function early
    }

    const power = powerInput.value; // Get the color input value
    const id = `<?= $product['id'] ?>`; // Get the product ID

    // Validate the color input
    if (!power) {
        alert("Power Usage cannot be empty.");
        return;
    }

    const csrfTokenName = '<?= csrf_token() ?>';
    const csrfTokenValue = '<?= csrf_hash() ?>';

    // Send the POST request to update the color
    $.post("<?= base_url('superadmin/updatePower') ?>", {
            id: id,
            daya: power,
            [csrfTokenName]: csrfTokenValue
        })
        .done(function(response) {
            // Check if the response is in the expected format
            if (typeof response === "object" && response !== null) {
                if (response.success) {
                    alert(response.message); // Show success message
                    location.reload(); // Reload the page to see the updated color
                } else {
                    alert("Error: " + response.message); // Show error message
                }
            } else {
                alert("Unexpected response format.");
            }
        })
        .fail(function(jqXHR) {
            alert("Request failed: " + jqXHR.statusText);
        });
}

function updateWeight() {
    const weightInput = document.getElementById('weightInput');
    const idInput = document.getElementById('id');

    if (!weightInput || !idInput) {
        console.error('One or more elements not found:', {
            weightInput: weightInput,
            idInput: idInput
        });
        alert('Unable to find input fields.');
        return; // Exit the function early
    }

    const weight = weightInput.value; // Get the color input value
    const id = `<?= $product['id'] ?>`; // Get the product ID

    // Validate the color input
    if (!weight) {
        alert("Weight cannot be empty.");
        return;
    }

    const csrfTokenName = '<?= csrf_token() ?>';
    const csrfTokenValue = '<?= csrf_hash() ?>';

    // Send the POST request to update the color
    $.post("<?= base_url('superadmin/updateWeight') ?>", {
            id: id,
            berat: weight,
            [csrfTokenName]: csrfTokenValue
        })
        .done(function(response) {
            // Check if the response is in the expected format
            if (typeof response === "object" && response !== null) {
                if (response.success) {
                    alert(response.message); // Show success message
                    location.reload(); // Reload the page to see the updated color
                } else {
                    alert("Error: " + response.message); // Show error message
                }
            } else {
                alert("Unexpected response format.");
            }
        })
        .fail(function(jqXHR) {
            alert("Request failed: " + jqXHR.statusText);
        });
}

function updateColdCap() {
    const coldcapInput = document.getElementById('coldcapInput');
    const idInput = document.getElementById('id');

    if (!coldcapInput || !idInput) {
        console.error('One or more elements not found:', {
            coldcapInput: coldcapInput,
            idInput: idInput
        });
        alert('Unable to find input fields.');
        return; // Exit the function early
    }

    const coldcap = coldcapInput.value; // Get the color input value
    const id = `<?= $product['id'] ?>`; // Get the product ID

    // Validate the color input
    if (!coldcap) {
        alert("Cold Water Capacity cannot be empty.");
        return;
    }

    const csrfTokenName = '<?= csrf_token() ?>';
    const csrfTokenValue = '<?= csrf_hash() ?>';

    // Send the POST request to update the color
    $.post("<?= base_url('superadmin/updateColdCap') ?>", {
            id: id,
            kapasitas_air_dingin: coldcap,
            [csrfTokenName]: csrfTokenValue
        })
        .done(function(response) {
            // Check if the response is in the expected format
            if (typeof response === "object" && response !== null) {
                if (response.success) {
                    alert(response.message); // Show success message
                    location.reload(); // Reload the page to see the updated color
                } else {
                    alert("Error: " + response.message); // Show error message
                }
            } else {
                alert("Unexpected response format.");
            }
        })
        .fail(function(jqXHR) {
            alert("Request failed: " + jqXHR.statusText);
        });
}

function updateHarga() {
    const hargaInput = document.getElementById('hargaInput');
    const idInput = document.getElementById('id');

    if (!hargaInput || !idInput) {
        console.error('One or more elements not found:', {
            hargaInput: hargaInput,
            idInput: idInput
        });
        alert('Unable to find input fields.');
        return; // Exit the function early
    }

    const harga = hargaInput.value; // Get the color input value
    const id = `<?= $product['id'] ?>`; // Get the product ID

    // Validate the color input
    if (!harga) {
        alert("Cold Water Capacity cannot be empty.");
        return;
    }

    const csrfTokenName = '<?= csrf_token() ?>';
    const csrfTokenValue = '<?= csrf_hash() ?>';

    // Send the POST request to update the color
    $.post("<?= base_url('superadmin/updateHarga') ?>", {
            id: id,
            harga: harga,
            [csrfTokenName]: csrfTokenValue
        })
        .done(function(response) {
            // Check if the response is in the expected format
            if (typeof response === "object" && response !== null) {
                if (response.success) {
                    alert(response.message); // Show success message
                    location.reload(); // Reload the page to see the updated color
                } else {
                    alert("Error: " + response.message); // Show error message
                }
            } else {
                alert("Unexpected response format.");
            }
        })
        .fail(function(jqXHR) {
            alert("Request failed: " + jqXHR.statusText);
        });
}

function updateHarga() {
    const hargaInput = document.getElementById('hargaInput');
    const idInput = document.getElementById('id');

    if (!hargaInput || !idInput) {
        console.error('One or more elements not found:', {
            hargaInput: hargaInput,
            idInput: idInput
        });
        alert('Unable to find input fields.');
        return; // Exit the function early
    }

    const harga = hargaInput.value; // Get the color input value
    const id = `<?= $product['id'] ?>`; // Get the product ID

    // Validate the color input
    if (!harga) {
        alert("Cold Water Capacity cannot be empty.");
        return;
    }

    const csrfTokenName = '<?= csrf_token() ?>';
    const csrfTokenValue = '<?= csrf_hash() ?>';

    // Send the POST request to update the color
    $.post("<?= base_url('superadmin/updateHarga') ?>", {
            id: id,
            harga: harga,
            [csrfTokenName]: csrfTokenValue
        })
        .done(function(response) {
            // Check if the response is in the expected format
            if (typeof response === "object" && response !== null) {
                if (response.success) {
                    alert(response.message); // Show success message
                    location.reload(); // Reload the page to see the updated color
                } else {
                    alert("Error: " + response.message); // Show error message
                }
            } else {
                alert("Unexpected response format.");
            }
        })
        .fail(function(jqXHR) {
            alert("Request failed: " + jqXHR.statusText);
        });
}

function updateHotCap() {
    const hotcapInput = document.getElementById('hotcapInput');
    const idInput = document.getElementById('id');

    if (!hotcapInput || !idInput) {
        console.error('One or more elements not found:', {
            hotcapInput: hotcapInput,
            idInput: idInput
        });
        alert('Unable to find input fields.');
        return; // Exit the function early
    }

    const hotcap = hotcapInput.value; // Get the color input value
    const id = `<?= $product['id'] ?>`; // Get the product ID

    // Validate the color input
    if (!hotcap) {
        alert("Hot Water Capacity cannot be empty.");
        return;
    }

    const csrfTokenName = '<?= csrf_token() ?>';
    const csrfTokenValue = '<?= csrf_hash() ?>';

    // Send the POST request to update the color
    $.post("<?= base_url('superadmin/updateHotCap') ?>", {
            id: id,
            kapasitas_air_panas: hotcap,
            [csrfTokenName]: csrfTokenValue
        })
        .done(function(response) {
            // Check if the response is in the expected format
            if (typeof response === "object" && response !== null) {
                if (response.success) {
                    alert(response.message); // Show success message
                    location.reload(); // Reload the page to see the updated color
                } else {
                    alert("Error: " + response.message); // Show error message
                }
            } else {
                alert("Unexpected response format.");
            }
        })
        .fail(function(jqXHR) {
            alert("Request failed: " + jqXHR.statusText);
        });
}

function updateCooling() {
    const ccInput = document.getElementById('ccInput');
    const idInput = document.getElementById('id');

    if (!ccInput || !idInput) {
        console.error('One or more elements not found:', {
            ccInput: ccInput,
            idInput: idInput
        });
        alert('Unable to find input fields.');
        return; // Exit the function early
    }

    const cooling = ccInput.value; // Get the color input value
    const id = `<?= $product['id'] ?>`; // Get the product ID

    // Validate the color input
    if (!cooling) {
        alert("Cooling Capacity cannot be empty.");
        return;
    }

    const csrfTokenName = '<?= csrf_token() ?>';
    const csrfTokenValue = '<?= csrf_hash() ?>';

    // Send the POST request to update the color
    $.post("<?= base_url('superadmin/updateCooling') ?>", {
            id: id,
            cooling_capacity: cooling,
            [csrfTokenName]: csrfTokenValue
        })
        .done(function(response) {
            // Check if the response is in the expected format
            if (typeof response === "object" && response !== null) {
                if (response.success) {
                    alert(response.message); // Show success message
                    location.reload(); // Reload the page to see the updated color
                } else {
                    alert("Error: " + response.message); // Show error message
                }
            } else {
                alert("Unexpected response format.");
            }
        })
        .fail(function(jqXHR) {
            alert("Request failed: " + jqXHR.statusText);
        });
}

function updateCspf() {
    const cspfInput = document.getElementById('cspfInput');
    const idInput = document.getElementById('id');

    if (!cspfInput || !idInput) {
        console.error('One or more elements not found:', {
            cspfInput: cspfInput,
            idInput: idInput
        });
        alert('Unable to find input fields.');
        return; // Exit the function early
    }

    const cspf = cspfInput.value; // Get the color input value
    const id = `<?= $product['id'] ?>`; // Get the product ID

    // Validate the color input
    if (!cspf) {
        alert("Cooling Capacity cannot be empty.");
        return;
    }

    const csrfTokenName = '<?= csrf_token() ?>';
    const csrfTokenValue = '<?= csrf_hash() ?>';

    // Send the POST request to update the color
    $.post("<?= base_url('superadmin/updateCspf') ?>", {
            id: id,
            cspf: cspf,
            [csrfTokenName]: csrfTokenValue
        })
        .done(function(response) {
            // Check if the response is in the expected format
            if (typeof response === "object" && response !== null) {
                if (response.success) {
                    alert(response.message); // Show success message
                    location.reload(); // Reload the page to see the updated color
                } else {
                    alert("Error: " + response.message); // Show error message
                }
            } else {
                alert("Unexpected response format.");
            }
        })
        .fail(function(jqXHR) {
            alert("Request failed: " + jqXHR.statusText);
        });
}

function updateManufacturer() {
    const manufacturerInput = document.getElementById('manufacturerInput');
    const idInput = document.getElementById('id');

    if (!manufacturerInput || !idInput) {
        console.error('One or more elements not found:', {
            manufacturerInput: manufacturerInput,
            idInput: idInput
        });
        alert('Unable to find input fields.');
        return; // Exit the function early
    }

    const manufacturer = manufacturerInput.value; // Get the color input value
    const id = `<?= $product['id'] ?>`; // Get the product ID

    // Validate the color input
    if (!manufacturer) {
        alert("Manufacturer cannot be empty.");
        return;
    }

    const csrfTokenName = '<?= csrf_token() ?>';
    const csrfTokenValue = '<?= csrf_hash() ?>';

    // Send the POST request to update the color
    $.post("<?= base_url('superadmin/updateManufacturer') ?>", {
            id: id,
            pembuat: manufacturer,
            [csrfTokenName]: csrfTokenValue
        })
        .done(function(response) {
            // Check if the response is in the expected format
            if (typeof response === "object" && response !== null) {
                if (response.success) {
                    alert(response.message); // Show success message
                    location.reload(); // Reload the page to see the updated color
                } else {
                    alert("Error: " + response.message); // Show error message
                }
            } else {
                alert("Unexpected response format.");
            }
        })
        .fail(function(jqXHR) {
            alert("Request failed: " + jqXHR.statusText);
        });
}

function updateProductType() {
    const producttypeInput = document.getElementById('producttypeInput');
    const idInput = document.getElementById('id');

    if (!producttypeInput || !idInput) {
        console.error('One or more elements not found:', {
            producttypeInput: producttypeInput,
            idInput: idInput
        });
        alert('Unable to find input fields.');
        return; // Exit the function early
    }

    const producttype = producttypeInput.value; // Get the color input value
    const id = `<?= $product['id'] ?>`; // Get the product ID

    // Validate the color input
    if (!producttype) {
        alert("Product Type cannot be empty.");
        return;
    }

    const csrfTokenName = '<?= csrf_token() ?>';
    const csrfTokenValue = '<?= csrf_hash() ?>';

    // Send the POST request to update the color
    $.post("<?= base_url('superadmin/updateProductType') ?>", {
            id: id,
            product_type: producttype,
            [csrfTokenName]: csrfTokenValue
        })
        .done(function(response) {
            // Check if the response is in the expected format
            if (typeof response === "object" && response !== null) {
                if (response.success) {
                    alert(response.message); // Show success message
                    location.reload(); // Reload the page to see the updated color
                } else {
                    alert("Error: " + response.message); // Show error message
                }
            } else {
                alert("Unexpected response format.");
            }
        })
        .fail(function(jqXHR) {
            alert("Request failed: " + jqXHR.statusText);
        });
}

function updateAdvantages() {
    const adv1Input = document.getElementById('adv1Input');
    const adv2Input = document.getElementById('adv2Input');
    const adv3Input = document.getElementById('adv3Input');
    const adv4Input = document.getElementById('adv4Input');
    const adv5Input = document.getElementById('adv5Input');
    const adv6Input = document.getElementById('adv6Input');
    const idInput = document.getElementById('id');

    if (!adv1Input || !adv2Input || !adv3Input || !idInput) {
        console.error('Required elements not found:', {
            adv1Input,
            adv2Input,
            adv3Input,
            idInput
        });
        alert('Unable to find input fields.');
        return;
    }

    // Retrieve values
    const adv1 = adv1Input.value;
    const adv2 = adv2Input.value;
    const adv3 = adv3Input.value;
    const adv4 = adv4Input ? adv4Input.value : '';
    const adv5 = adv5Input ? adv5Input.value : '';
    const adv6 = adv6Input ? adv6Input.value : '';
    const id = `<?= $product['id'] ?>`;

    // Validate required fields
    if (!adv1 || !adv2 || !adv3) {
        alert("First 3 advantages cannot be empty.");
        return;
    }

    // Prepare CSRF token
    const csrfTokenName = '<?= csrf_token() ?>';
    const csrfTokenValue = '<?= csrf_hash() ?>';

    // Send POST request
    $.post("<?= base_url('superadmin/updateAdvantages') ?>", {
            id: id,
            advantage1: adv1,
            advantage2: adv2,
            advantage3: adv3,
            advantage4: adv4,
            advantage5: adv5,
            advantage6: adv6,
            [csrfTokenName]: csrfTokenValue
        })
        .done(function(response) {
            if (response.success) {
                alert(response.message); // Show success message
                location.reload(); // Reload the page
            } else {
                alert("Error: " + response.message);
            }
        })
        .fail(function(jqXHR) {
            alert("Request failed: " + jqXHR.statusText);
        });
}

function updateProductDimensions() {
    const length = document.getElementById('lengthInput').value;
    const width = document.getElementById('widthInput').value;
    const height = document.getElementById('heightInput').value;
    const id = document.getElementById('id').value;

    const csrfTokenName = '<?= csrf_token() ?>';
    const csrfTokenValue = document.querySelector('input[name="<?= csrf_token() ?>"]').value;

    // Combine dimensions with " x " separator and add " cm" at the end
    const combinedDimensions = `${length} x ${width} x ${height} cm`;

    // Send AJAX request to update the product dimensions
    $.ajax({
        type: 'POST',
        url: "<?= base_url('superadmin/updateProductDimensions') ?>",
        data: {
            id: id,
            product_dimensions: combinedDimensions,
            [csrfTokenName]: csrfTokenValue
        },
        success: function(response) {
            if (response.success) {
                alert(response.message);
                document.getElementById('productDimensionsValue').innerText = combinedDimensions;
                $('#productDimensionsModal').modal('hide'); // Close modal
            } else {
                alert("Error: " + response.message);
            }
        },
        error: function(jqXHR) {
            alert("Request failed: " + jqXHR.statusText);
        }
    });
}

function updatePackagingDimensions() {
    const plength = document.getElementById('plengthInput').value;
    const pwidth = document.getElementById('pwidthInput').value;
    const pheight = document.getElementById('pheightInput').value;
    const id = document.getElementById('id').value;

    const csrfTokenName = '<?= csrf_token() ?>';
    const csrfTokenValue = document.querySelector('input[name="<?= csrf_token() ?>"]').value;

    // Combine dimensions with " x " separator and add " cm" at the end
    const combinedDimensions = `${plength} x ${pwidth} x ${pheight} cm`;

    // Send AJAX request to update the product dimensions
    $.ajax({
        type: 'POST',
        url: "<?= base_url('superadmin/updatePackagingDimensions') ?>",
        data: {
            id: id,
            packaging_dimensions: combinedDimensions,
            [csrfTokenName]: csrfTokenValue
        },
        success: function(response) {
            if (response.success) {
                alert(response.message);
                document.getElementById('packagingDimensionsValue').innerText = combinedDimensions;
                $('#packagingDimensionsModal').modal('hide'); // Close modal
            } else {
                alert("Error: " + response.message);
            }
        },
        error: function(jqXHR) {
            alert("Request failed: " + jqXHR.statusText);
        }
    });
}

function updateStandDimensions() {
    const slength = document.getElementById('slengthInput').value;
    const swidth = document.getElementById('swidthInput').value;
    const sheight = document.getElementById('sheightInput').value;
    const id = document.getElementById('id').value;

    const csrfTokenName = '<?= csrf_token() ?>';
    const csrfTokenValue = document.querySelector('input[name="<?= csrf_token() ?>"]').value;

    // Combine dimensions with " x " separator and add " cm" at the end
    const combinedDimensions = `${slength} x ${swidth} x ${sheight} cm`;

    // Send AJAX request to update the product dimensions
    $.ajax({
        type: 'POST',
        url: "<?= base_url('superadmin/updateStandDimensions') ?>",
        data: {
            id: id,
            pstand_dimensions: combinedDimensions,
            [csrfTokenName]: csrfTokenValue
        },
        success: function(response) {
            if (response.success) {
                alert(response.message);
                document.getElementById('standDimensionsValue').innerText = combinedDimensions;
                $('#standDimensionsModal').modal('hide'); // Close modal
            } else {
                alert("Error: " + response.message);
            }
        },
        error: function(jqXHR) {
            alert("Request failed: " + jqXHR.statusText);
        }
    });
}

function updateResolution() {
    const xresol = document.getElementById('xresolInput').value;
    const yresol = document.getElementById('yresolInput').value;
    const id = document.getElementById('id').value;

    const csrfTokenName = '<?= csrf_token() ?>';
    const csrfTokenValue = document.querySelector('input[name="<?= csrf_token() ?>"]').value;

    // Combine dimensions with " x " separator and add " cm" at the end
    const combinedResolution = `${xresol} x ${yresol}`;

    // Send AJAX request to update the product dimensions
    $.ajax({
        type: 'POST',
        url: "<?= base_url('superadmin/updateResolution') ?>",
        data: {
            id: id,
            panel_resolution: combinedResolution,
            [csrfTokenName]: csrfTokenValue
        },
        success: function(response) {
            if (response.success) {
                alert(response.message);
                document.getElementById('resolutionValue').innerText = combinedResolution;
                $('#resolutionModal').modal('hide'); // Close modal
            } else {
                alert("Error: " + response.message);
            }
        },
        error: function(jqXHR) {
            alert("Request failed: " + jqXHR.statusText);
        }
    });
}
// Function to dynamically open and populate the modal
function setColorModalData(id) {
    document.getElementById('id').value = id; // Set the hidden ID input
    $('#colorModal').modal('show'); // Show the modal
}

function openPowerModal(id) {
    document.getElementById('id').value = id; // Set the hidden ID input
    $('#powerModal').modal('show'); // Show the modal
}

function openWeightModal(id) {
    document.getElementById('id').value = id; // Set the hidden ID input
    $('#weightModal').modal('show'); // Show the modal
}

function openColdCapModal(id) {
    document.getElementById('id').value = id; // Set the hidden ID input
    $('#coldcapModal').modal('show'); // Show the modal
}

function openHargaModal(id) {
    document.getElementById('id').value = id; // Set the hidden ID input
    $('#hargaModal').modal('show'); // Show the modal
}

function openHotCapModal(id) {
    document.getElementById('id').value = id; // Set the hidden ID input
    $('#hotcapModal').modal('show'); // Show the modal
}

function openCoolingModal(id) {
    document.getElementById('id').value = id; // Set the hidden ID input
    $('#coolingModal').modal('show'); // Show the modal
}

function opencspfModal(id) {
    document.getElementById('id').value = id; // Set the hidden ID input
    $('#cspfModal').modal('show'); // Show the modal
}

function openProductTypeModal(id) {
    document.getElementById('id').value = id; // Set the hidden ID input
    $('#producttypeModal').modal('show'); // Show the modal
}

function openManufacturerModal(id) {
    document.getElementById('id').value = id; // Set the hidden ID input
    $('#manufacturerModal').modal('show'); // Show the modal
}

function openAdvantagesModal(id) {
    document.getElementById('id').value = id; // Set the hidden ID input
    $('#advantagesModal').modal('show'); // Show the modal
}

var deleteModal = document.getElementById("deleteModal");
var closeDeleteModal = document.getElementsByClassName("close")[0];
var cancelDeleteBtn = document.getElementById("cancelDeleteBtn");

document.querySelectorAll('.btn-delete').forEach(function(button) {
    button.addEventListener('click', function() {
        var id = this.getAttribute('data-id');
        document.getElementById('deleteForm').action = '/product/deleteProduct/' + id;
        deleteModal.style.display = "block";
    });
});

closeDeleteModal.onclick = function() {
    deleteModal.style.display = "none";
}

cancelDeleteBtn.onclick = function() {
    deleteModal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == deleteModal) {
        deleteModal.style.display = "none";
    }
}
</script>
<?= $this->endSection() ?>