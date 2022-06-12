<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Rancangan</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Rancangan Produk Hukum</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/produk/<?= $product['id']; ?>" method="POST" enctype='multipart/form-data'>
                            <?php csrf_field() ?>
                            <input type="hidden" name="_method" value="PUT">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama OPD</label>
                                    <input type="text" class="form-control" value="<?= $product['opd']; ?>" name="opd" placeholder="OPD">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nomor Usulan</label>
                                    <input type="text" class="form-control" value="<?= $product['no_usulan']; ?>" name="no_usulan" placeholder="Nomor Usulan">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Judul Rancangan</label>
                                    <input type="text" class="form-control" value="<?= $product['judul']; ?>" name="judul" placeholder="Judul Rancangan">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Jenis</label>
                                    <input type="text" class="form-control" value="<?= $product['jenis']; ?>" name="jenis" placeholder="Jenis">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tanggal Surat</label>
                                    <input type="date" class="form-control" value="<?= $product['tgl_surat']; ?>" name="tgl_surat" placeholder="Tanggal Surat">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tanggal Input</label>
                                    <input type="date" class="form-control" value="<?= $product['tgl_input']; ?>" name="tgl_input" placeholder="Tanggal Input">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Perihal Nota Dinas</label>
                                    <input type="text" class="form-control" value="<?= $product['perihal_nota']; ?>" name="perihal_nota" placeholder="Perihal Nota Dinas">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Isi Nota Dinas</label>
                                    <input type="text" class="form-control" value="<?= $product['isi_nota']; ?>" name="isi_nota" placeholder="Isi Nota Dinas">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Usulan Produk Hukum</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" value="<?= $product['usulan_produk']; ?>" name="usulan_produk">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Penanggung Jawab</label>
                                    <input type="text" class="form-control" value="<?= $product['penanggung_jawab']; ?>" name="penanggung_jawab" placeholder="Penanggung Jawab">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nomor WhatsApp</label>
                                    <input type="text" class="form-control" value="<?= $product['no_wa']; ?>" name="no_wa" placeholder="Nomor WhatsApp">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>