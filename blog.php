<?php
    session_start();
    require 'koneksi/koneksi.php';
    include 'header.php';
    if($_GET['cari'])
    {
        $cari = strip_tags($_GET['cari']);
        $query =  $koneksi -> query('SELECT * FROM mobil WHERE merk LIKE "%'.$cari.'%" ORDER BY id_mobil DESC')->fetchAll();
    }else{
        $query =  $koneksi -> query('SELECT * FROM mobil ORDER BY id_mobil DESC')->fetchAll();
    }
?>

<div class="container py-5">
    <div class="row mb-4">
        <div class="col-sm-8">
            <?php 
                if($_GET['cari'])
                {
                    echo '<h3 class="mb-3">Hasil Pencarian: <span class="text-primary">"'.$cari.'"</span></h3>';
                }else{
                    echo '<h3 class="mb-3">Daftar Mobil Tersedia</h3>';
                }
            ?>
            <p class="text-muted">Pilih dari berbagai pilihan mobil premium kami untuk pengalaman berkendara terbaik Anda</p>
        </div>
        <div class="col-sm-4">
            <div class="card border-0 shadow-sm p-3">
                <div class="d-flex align-items-center">
                    <i class="fa fa-info-circle text-primary mr-3" style="font-size: 24px;"></i>
                    <div>
                        <h6 class="mb-1">Butuh bantuan?</h6>
                        <p class="small mb-0">Hubungi kami di <?= $info_web->telp ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <?php 
            $no = 1;
            foreach($query as $isi)
            {
        ?>
        <div class="col-sm-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="position-relative">
                    <img src="assets/image/<?php echo $isi['gambar'];?>" class="card-img-top" style="height:220px;object-fit:cover;border-top-left-radius:12px;border-top-right-radius:12px;">
                    <?php if($isi['status'] == 'Tersedia'){ ?>
                        <div class="position-absolute" style="top:15px;right:15px;">
                            <span class="badge badge-pill badge-success px-3 py-2">Available</span>
                        </div>
                    <?php } else { ?>
                        <div class="position-absolute" style="top:15px;right:15px;">
                            <span class="badge badge-pill badge-danger px-3 py-2">Not Available</span>
                        </div>
                    <?php } ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title font-weight-bold"><?php echo $isi['merk'];?></h5>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="price">
                            <span class="text-muted small">Harga per hari</span>
                            <h6 class="font-weight-bold mb-0">Rp. <?php echo number_format($isi['harga']);?></h6>
                        </div>
                        <div class="rating">
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star-half-o text-warning"></i>
                        </div>
                    </div>
                    
                    <div class="features mb-4">
                        <div class="row small">
                            <div class="col-6 mb-2">
                                <i class="fa fa-check-circle text-success mr-1"></i> Free E-toll 50k
                            </div>
                            <div class="col-6 mb-2">
                                <i class="fa fa-user mr-1"></i> <?php echo $isi['seating']; ?> Kursi
                            </div>
                            <div class="col-6">
                                <i class="fa fa-cog mr-1"></i> <?php echo $isi['transmisi']; ?> manual
                            </div>
                            <div class="col-6">
                                <i class="fa fa-tachometer mr-1"></i> <?php echo $isi['tahun']; ?> normal   
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white border-0 pt-0">
                    <div class="d-flex">
                        <a href="detail.php?id=<?php echo $isi['id_mobil'];?>" class="btn btn-outline-primary flex-fill mr-2">
                            <i class="fa fa-info-circle mr-1"></i> Detail
                        </a>
                        <?php if($isi['status'] == 'Tersedia'){ ?>
                            <a href="booking.php?id=<?php echo $isi['id_mobil'];?>" class="btn btn-primary flex-fill">
                                <i class="fa fa-calendar-check-o mr-1"></i> Booking
                            </a>
                        <?php } else { ?>
                            <button class="btn btn-secondary flex-fill" disabled>
                                <i class="fa fa-ban mr-1"></i> Not Available
                            </button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php $no++; } ?>
    </div>
    
    <?php if(empty($query)){ ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-info text-center">
                <i class="fa fa-car fa-2x mb-3 d-block"></i>
                <h5>Tidak ada mobil yang ditemukan</h5>
                <p class="mb-0">Maaf, tidak ada mobil yang sesuai dengan pencarian Anda. Silakan coba dengan kata kunci lain.</p>
            </div>
        </div>
    </div>
    <?php } ?>
    
</div>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="text-center mb-4 mb-md-0">
                    <i class="fa fa-shield fa-3x text-primary mb-3"></i>
                    <h5>Jaminan Keamanan</h5>
                    <p class="text-muted mb-0 small">Mobil terawat dan terjamin keamanannya untuk perjalanan Anda</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center mb-4 mb-md-0">
                    <i class="fa fa-money fa-3x text-primary mb-3"></i>
                    <h5>Harga Terbaik</h5>
                    <p class="text-muted mb-0 small">Jaminan harga terbaik untuk pengalaman rental premium</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center">
                    <i class="fa fa-headphones fa-3x text-primary mb-3"></i>
                    <h5>Layanan 24/7</h5>
                    <p class="text-muted mb-0 small">Tim support kami siap membantu Anda kapan pun dibutuhkan</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php';?>