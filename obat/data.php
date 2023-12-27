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
    }
</style>
<body>
    <div class="box">
        <center>
        <h1> Data Obat</h1>
        </center>
        <!--source pencarian-->
        <div style="margin-bottom: 20px;">
            <form class="form-inline" action="" method="post">
                <div class="form-group">
                   <input type="text" name="pencarian" class="form-control" placeholder="pencarian">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                </div>
            </form>
        </div>
        <!--source tampil data-->
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Keterangan</th>
                    <?php if($_SESSION['status']=='admin'){?>
                    <th><i class="glyphicon glyphicon-cog"></i></th>
                    <?php }?>
                </tr>
                
            </thead>
            <tbody>
                <?php
                $batas = 5;
                $hal = @$_GET['hal'];
                if(empty($hal)) {
                    $posisi = 0;
                    $hal = 1;
                }else{
                    $posisi = ($hal - 1)* $batas;
                } 
                $no = 1;
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $pencarian = trim(mysqli_real_escape_string($koneksi, $_POST['pencarian']));
                    if($pencarian !=''){
                        $sql = "SELECT * FROM tb_obat WHERE nama_obat LIKE '%$pencarian%'";
                        $query = $sql;
                        $queryJml = $sql;
                    }else{
                        $query = "SELECT * FROM tb_obat LIMIT $posisi,$batas";
                        $queryJml= "SELECT * FROM tb_obat";
                        $no = $posisi + 1;
                    }
                }else{
                    $query = "SELECT * FROM tb_obat LIMIT $posisi,$batas";
                    $queryJml= "SELECT * FROM tb_obat";
                    $no = $posisi + 1;
                }
                
                 $sql_obat = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
                 if(mysqli_num_rows($sql_obat) > 0){
                    while($data = mysqli_fetch_array($sql_obat)){?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$data['nama_obat']?></td>
                        <td><?=$data['ket_obat']?></td>
                        <?php if($_SESSION['status']=='admin'){?>
                        <td class="text-center">
                            <a href="edit.php?id=<?=$data['id_obat']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="del.php?id=<?=$data['id_obat']?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                        </td>
                        <?php }?>
                    </tr>
                  <?php 
                }
                 }else{
                    echo "<tr><td colspan=\"4\" align=\"center\">data tidak ditemukan</td></tr>";
                 }
                 
                ?>
            </tbody>
            </div>
        </table>
        <?php if($_SESSION['status']=='admin'){?>
        <h4>
            <div class="pull-right">
                <a href="" class="btn btn-default bt-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="tambah.php" class="btn btn-success bt-xs"><i class="glyphicon glyphicon-plus"></i>Tambah obat</a>
            </div>
        </h4>
        <?php }?>
        </div>
        </body>

        <!--tampilan pagination-->
        <?php 
        if(@$_POST['pencarian'] == ''){ ?>
            <div style="float:left;">
                <?php 
                $jml = mysqli_num_rows(mysqli_query($koneksi,$queryJml));
                echo "Jumlah data : <b>$jml</b>";
                ?> 
            </div>
            <div style="float:right;">
                <ul class="pagination pagination-sm" syle="margin:0">
                    <?php
                    $jml_hal = ceil($jml / $batas);
                    for ($i=1; $i <= $jml_hal; $i++) { 
                          if($i != $hal){
                            echo "<li><a href=\"?hal=$i\">$i</a></li>";
                          }else{
                            echo "<li class=\"active\"><a>$i</a></li>";
                          }
                    } 
                    ?>
                </ul>
            </div>
            <?php
            
        }else{
            echo "<div style=\"float:left;\">";
            $jml = mysqli_num_rows(mysqli_query($koneksi, $queryJml));
            echo "Data hasil pencarian : <b>$jml</b>";
            echo "</div>";
        }
        ?>
    </div>
 
<?php include_once('../footer.php'); ?>


