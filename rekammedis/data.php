<?php include_once('../header.php'); ?>
 
<style>
    h1{
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        text-decoration: underline;
    }
    body{
        background-image: url("../Image/ikon3.jpg");
        background-size: cover;
        font-weight: bold;
    }
</style>
<body>
    <div class="box">
        <center>
        <h1>Rekam Medis</h1>
        </center>
        <form method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="reka">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Periksa</th>
                    <th>Nama Pasien</th>
                    <th>Keluhan</th>
                    <th>Nama Dokter</th>
                    <th>Diagnosa</th>
                    <th>Poliklinik</th>
                    <th>Obat</th>
                    <?php if($_SESSION['status']=='admin'){?>
                    <th><i class="glyphicon glyphicon-cog"></i></th>
                    <?php }?>
                </tr>
            </thead>
            <tbody>
                <?php
                $no =1;
                $query = "SELECT * FROM tb_rekamedis 
                        INNER JOIN tb_pasien ON tb_rekamedis.id_pasien = tb_pasien.id_pasien
                        INNER JOIN tb_dokter ON tb_rekamedis.id_dokter = tb_dokter.id_dokter
                        INNER JOIN tb_poliklinik ON tb_rekamedis.id_poli = tb_poliklinik.id_poli
                        ";
                $sql_rm =mysqli_query($koneksi,$query) or die (mysqli_error($koneksi));
                while($data = mysqli_fetch_array($sql_rm)){?>
                    <tr>
                        <td><?=$no++?>.</td>
                        <td><?=$data['tgl_periksa']?></td>
                        <td><?=$data['nama_pasien']?></td>
                        <td><?=$data['keluhan']?></td>
                        <td><?=$data['nama_dokter']?></td>
                        <td><?=$data['diagnosa']?></td>
                        <td><?=$data['nama_poli']?></td>
                        <td>
                            <?php 
                            $query_o = "SELECT * FROM tb_rm_obat JOIN tb_obat ON tb_rm_obat.id_obat = tb_obat.id_obat
                                        WHERE id_rm='$data[id_rm]'";
                            $sql_rm_obat =mysqli_query($koneksi, $query_o) or die (mysqli_error($koneksi));
                            while($data_obat=mysqli_fetch_array($sql_rm_obat)){
                                echo $data_obat['nama_obat']."<br>";
                            }
                            ?>
                        </td>
                        <?php if($_SESSION['status']=='admin'){?>
                        <td>
                        <a href="del.php?id=<?=$data['id_rm']?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Ingin Mengahapus')"><i class="glyphicon glyphicon-trash"></i></a>
                        </td>
                        <?php }?>
                    </tr>
                <?php
                } 
                ?>
            </tbody>
        </table>
        </div>
        </form>
        <?php if($_SESSION['status']=='admin'){?>
        <h4>
            <div class="pull-left">
                <a href="" class="btn btn-default bt-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="tambah.php" class="btn btn-success bt-xs"><i class="glyphicon glyphicon-plus"></i>Tambah RekamMedis</a>
            </div>
        </h4>  
        <?php }?>
    </div>
    <?php if($_SESSION['status']=='admin'){?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#reka').DataTable({
            columnDefs:[
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": 8
                }
            ]
        });
        });
    </script>
    <?php }?>
    </body>

<?php include_once('../footer.php'); ?>


