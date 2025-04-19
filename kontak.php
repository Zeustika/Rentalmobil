<?php
    session_start();
    require 'koneksi/koneksi.php';
    include 'header.php';
?>
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="mb-4 text-center text-primary fw-bold">Kontak Kami</h4>
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label fw-semibold text-muted">Nama Rental</label>
                            <div class="col-sm-8"><?= $info_web->nama_rental;?></div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label fw-semibold text-muted">Telp</label>
                            <div class="col-sm-8"><?= $info_web->telp;?></div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label fw-semibold text-muted">Alamat</label>
                            <div class="col-sm-8"><?= $info_web->alamat;?></div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label fw-semibold text-muted">Email</label>
                            <div class="col-sm-8"><?= $info_web->email;?></div>
                        </div>
                        <div class="mb-0 row">
                            <label class="col-sm-4 col-form-label fw-semibold text-muted">No Rekening</label>
                            <div class="col-sm-8"><?= $info_web->no_rek;?></div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>
