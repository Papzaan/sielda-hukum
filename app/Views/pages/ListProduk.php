<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Rancangan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="/produk/new">
                                <button type="submit" class="btn btn-primary"> <i class="fas fa-plus mr-2"></i>
                                    Tambah</button>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php if (!empty(session()->getFlashdata('pesan'))) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo session()->getFlashdata('pesan'); ?>
                                </div>
                            <?php endif; ?>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <!-- <th>Nama OPD</th> -->
                                        <th>Kode Surat</th>
                                        <th>Nomor Usulan</th>
                                        <th>Judul Rancangan</th>
                                        <th>Jenis</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Perihal Nota Dinas</th>
                                        <th>Isi Nota Dinas</th>
                                        <th>Usulan</th>
                                        <th>Status</th>
                                        <th>Tanggal Surat</th>
                                        <th>Penanggung Jawab</th>
                                        <th>No WA</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($produk as $product) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <!-- <td><?= $product->nama_opd; ?></td> -->
                                            <td><?= $product->id; ?></td>
                                            <td><?= $product->no_usulan; ?></td>
                                            <td><?= $product->judul; ?></td>
                                            <td><?= $product->jenis; ?></td>

                                            <td><?= $product->tgl_input; ?></td>
                                            <td><?= $product->perihal_nota; ?></td>
                                            <td><a class="btn btn-info" href="<?= base_url(); ?>/uploads/berkas/<?= $product->nota_dinas; ?>">Download</a></td>
                                            <td><a class="btn btn-info" href="<?= base_url(); ?>/uploads/berkas/<?= $product->usulan_produk; ?>">Download</a></td>
                                            <td><?= $product->status; ?></td>
                                            <td><?= $product->tgl_surat; ?></td>
                                            <td><?= $product->penanggung_jawab; ?></td>
                                            <td><?= $product->no_wa; ?></td>

                                            <td>
                                                <div class="row">
                                                    <div class="col-auto">
                                                        <a href="/produk/<?= $product->id; ?>/edit" class="btn btn-outline-warning mr-2">Edit</a>
                                                        <a href="/home/CetakKodeSurat/<?= $product->id; ?>" class="btn btn-outline-info mr-2">Print Kode Surat</a>
                                                    </div>
                                                    <div class="col-auto px-0">
                                                        <form action="/produk/<?= $product->id; ?>" method="POST">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda Yakin ?') ">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>