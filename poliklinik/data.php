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
        <h1> Data Poliklinik</h1>
        </center>
        <form method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Poli</th>
                    <th>Gedung</th>
                    <th>Spesialis</th>
                    <?php if($_SESSION['status']=='admin'){?>
                    <th>
                        <center>
                            <input type="checkbox"  id="select_all" value="">
                        </center>
                    </th>
                    <?php }?>
                </tr>
            </thead>
            <tbody>
                <?php
                $no=1;
                $sql_poli=mysqli_query($koneksi, "select id_poli,nama_poli,gedung,tb_dokter.spesialis as spesialis from tb_poliklinik inner join tb_dokter using(id_dokter) order by nama_poli ASC") or die (mysqli_error($koneksi)); 
                if(mysqli_num_rows($sql_poli)>0){
                while($data =mysqli_fetch_array($sql_poli)){?>
                <tr>
                    <td><?=$no++?>.</td>
                    <td><?=$data['nama_poli'];?></td>
                    <td><?=$data['gedung'];?></td>
                    <td><?=$data['spesialis'];?></td>
                    <?php if($_SESSION['status']=='admin'){?>
                    <td align="center">
                        <input type="checkbox" name="checked[]" class="check"  value="<?=$data['id_poli'];?>">
                    </td>
                    <?php }?>
                </tr>
                <?php
                }
                }else{
                    echo "<tr><td colspan =\"4\" align =\"center\">Data tidak ditemukan</td></tr>";
                }
                ?>
            </tbody>
        </table>
        </div>
        </form>
        <?php if($_SESSION['status']=='admin'){?>
        <div class="box">
            <div class="pull-left">
            <a href="" class="btn btn-default bt-xs"><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="generate.php" class="btn btn-success bt-xs"><i class="glyphicon glyphicon-plus"></i>Tambah Poli</a>
            </div>
            <div class="pull-right">
            <button class="btn btn-warning btn-sm" onclick="edit()"><i class="glyphicon glyphicon-edit"></i>Edit</button>
            <button class="btn btn-warning btn-sm" onclick="hapus()"><i class="glyphicon glyphicon-trash"></i>Hapus</button>
            </div>
        </div> 
        <?php }?>   
    </div>
    </body>
    <script>
        $(document).ready(function(){
        $("#select_all").on('click', function(){
            if(this.checked){
                $('.check').each(function(){
                    this.checked=true;
                })
            }else{
                $('#checked').each(function(){
                    this.checked=false;
                })
            }   
        });
        $('.check').on('click', function(){
            if($('.check:checked').length == $('.check').length){
                $('#select_all').prop('checked', true)
            }else{
                $('#select_all').prop('checked', false)
            }
        })
        });

        function edit(){
            document.proses.action = 'edit.php';
            document.proses.submit();
        }
        function hapus(){
            var conf = confirm('Apakah anda mau menghapus data?');
            if(conf){
                document.proses.action = 'del.php';
                document.proses.submit();
            }
            
        }
    </script>
<?php include_once('../footer.php'); ?>


