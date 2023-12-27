<?php 
include '../_config/config.php';
$data_dokter = mysqli_query($koneksi,"SELECT count(id_dokter) as jum from tb_dokter");
$jumlah = mysqli_fetch_assoc($data_dokter);
$jum1 = $jumlah['jum'];

$data_pasien = mysqli_query($koneksi,"SELECT count(id_pasien) as jum from tb_pasien");
$jumlah = mysqli_fetch_assoc($data_pasien);
$jum2 = $jumlah['jum'];

$data_poli = mysqli_query($koneksi,"SELECT count(id_poli) as jum from tb_poliklinik");
$jumlah = mysqli_fetch_assoc($data_poli);
$jum3 = $jumlah['jum'];

$data_obat = mysqli_query($koneksi,"SELECT count(id_obat) as jum from tb_obat");
$jumlah = mysqli_fetch_assoc($data_obat);
$jum4 = $jumlah['jum'];

$data_rekamedis = mysqli_query($koneksi,"SELECT count(id_rm) as jum from tb_rekamedis");
$jumlah = mysqli_fetch_assoc($data_rekamedis);
$jum5 = $jumlah['jum'];



?>

<?php include_once('../header.php'); ?>

<style>
    h1{
        margin-top: 150px;
        font-size: 90px;
        font-family: 'Courier New', Courier, monospace;
        display: flexbox;
        font-weight: bold;
        color: black;
    }
    h4{
        font-size: 60px;
        color: black;
        margin-bottom: 150px;
        font-weight: bold;
        font-family: 'Courier New', Courier, monospace;
    }
    body{
      background-image: url("../Image/ikon4.jpg");
      background-size: cover;
    }
    .box{
        margin-bottom: 30px;
        height: 500px;
        width: 1000px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .kotak{
        margin: 0 5px;
        height:100px;
        width: 200px;
        border: 3px solid black;
        backdrop-filter: blur(10px);
    }
    .kotak p:nth-child(1){
        font-size: 18px;
        text-align: center;
    }
    .kotak p:nth-child(2){
        font-size: 30px;
        text-align: center;
    }
    .kotak i{
        color: grey;
        font-size: 40px;
        padding-right: 20px;
    }
    header p{
        margin: 0;
        text-align: center;
        font-size: 30px;
    }

</style>
<body>
<script src="https://kit.fontawesome.com/b6863abf49.js" crossorigin="anonymous"></script>
<header>
<a href="#menu-toggle" class="btn btn-warning" id="menu-toggle">Menu</a>
<p>Wellcome to WebSite RumahSakit</p>
</header>
    <div class="row">
        <div class="col-lg-14">
                <div class="box">
                        <div class="kotak">
                            <p>DATA DOKTER</p>
                            <p><i class="fa-solid fa-hospital"></i> <?php echo $jum1?></p>
                            
                        </div>
                        <?php if($_SESSION['status']=='admin'){?>
                        <div class="kotak">
                            <p>DATA PASIEN</p>
                            <p><i class="fa-solid fa-hospital"></i><?php echo $jum2?></p>
                        </div>
                        <?php }?>
                        <?php if($_SESSION['status']=='admin'){?>
                        <div class="kotak">
                            <p>DATA POLIKLINIK</p>
                            <p><i class="fa-solid fa-hospital"></i><?php echo $jum3?></p>
                        </div>
                        <?php }?>
                        <?php if($_SESSION['status']=='admin'){?>
                        <div class="kotak">
                            <p>DATA OBAT</p>
                            <p><i class="fa-solid fa-hospital"></i><?php echo $jum4?></p>
                        </div>
                        <?php }?>
                        <div class="kotak">
                            <p>DATA REKAMEDIS</p>
                            <p><i class="fa-solid fa-hospital"></i><?php echo $jum5?></p>
                        </div>

                </div>
             
        </div>
    </div>
</body>              
<?php include_once('../footer.php'); ?>