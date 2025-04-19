<?php
    session_start();
    require 'koneksi/koneksi.php';
    include 'header.php';
    if(empty($_SESSION['USER']))
    {
        echo '<script>alert("Harap login !");window.location="index.php"</script>';
    }
    $id = $_GET['id'];
    $isi = $koneksi->query("SELECT * FROM mobil WHERE id_mobil = '$id'")->fetch();
?>
<div class="container" id="content-page">
    <div class="row">
        <div class="col-sm-4">
            <div class="card shadow-sm">
                <img src="assets/image/<?php echo $isi['gambar'];?>" class="card-img-top img-responsive" style="height:220px;">
                <div class="card-body">
                    <h5 class="card-title text-primary"><?php echo $isi['merk'];?></h5>
                </div>
                <ul class="list-group list-group-flush">
                    <?php if($isi['status'] == 'Tersedia'){?>
                        <li class="list-group-item status-available text-white">
                            <i class="fa fa-check"></i> Available
                        </li>
                    <?php }else{?>
                        <li class="list-group-item status-unavailable text-white">
                            <i class="fa fa-close"></i> Not Available
                        </li>
                    <?php }?>
                    <li class="list-group-item status-feature text-white"><i class="fa fa-check"></i> Free E-toll 50k</li>
                    <li class="list-group-item status-price text-white">
                        <i class="fa fa-money"></i> Rp. <?php echo number_format($isi['harga']);?>/ day
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="text-primary mb-4">Booking Form</h4>
                    <form method="post" action="koneksi/proses.php?id=booking">
                        <div class="form-group mb-3">
                            <label for="ktp" class="form-label">KTP</label>
                            <input type="text" name="ktp" id="ktp" required class="form-control" placeholder="KTP / NIK Anda">
                        </div> 
                        <div class="form-group mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" id="nama" required class="form-control" placeholder="Nama Anda">
                        </div> 
                        <div class="form-group mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" name="alamat" id="alamat" required class="form-control" placeholder="Alamat">
                        </div> 
                        <div class="form-group mb-3">
                            <label for="no_tlp" class="form-label">Telepon</label>
                            <input type="text" name="no_tlp" id="no_tlp" required class="form-control" placeholder="Telepon">
                        </div> 
                        <div class="form-group mb-3">
                            <label for="tanggal" class="form-label">Tanggal Sewa</label>
                            <input type="date" name="tanggal" id="tanggal" required class="form-control">
                        </div> 
                        <div class="form-group mb-4">
                            <label for="lama_sewa" class="form-label">Lama Sewa</label>
                            <input type="number" name="lama_sewa" id="lama_sewa" required class="form-control" placeholder="Lama Sewa (hari)">
                        </div> 
                        <input type="hidden" value="<?php echo $_SESSION['USER']['id_login'];?>" name="id_login">
                        <input type="hidden" value="<?php echo $isi['id_mobil'];?>" name="id_mobil">
                        <input type="hidden" value="<?php echo $isi['harga'];?>" name="total_harga">
                        <hr class="my-4"/>
                        <?php if($isi['status'] == 'Tersedia'){?>
                            <button type="submit" class="btn btn-primary float-right">Booking Now</button>
                        <?php }else{?>
                            <button type="submit" class="btn btn-danger float-right" disabled>Booking Now</button>
                        <?php }?>
                    </form>
                </div>
            </div> 
        </div>
    </div>
</div>

<?php include 'footer.php';?>