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
        <h1>Data Dokter</h1>
        </center>
        <form method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dokter">
            <thead>
                <tr>
                <?php if($_SESSION['status']=='admin'){?>
                    <th>
                    <center>
                        <input type="checkbox"  id="select_all" value="">
                    </center>
                    </th>
                <?php }?>
                    <th>No</th>
                    <th>Nama Dokter</th>
                    <th>Spesialis</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <?php if($_SESSION['status']=='admin'){?>
                    <th><i class="glyphicon glyphicon-cog"></i></th>
                    <?php }?>
                </tr>
            </thead>
            <tbody>
                <?php
                $no=1;
                $sql_poli=mysqli_query($koneksi, "SELECT * FROM tb_dokter") or die (mysqli_error($koneksi)); 
                while($data =mysqli_fetch_array($sql_poli)){?>
                <tr>
                <?php if($_SESSION['status']=='admin'){?>
                    <td align="center">
                        <input type="checkbox" name="checked[]" class="check"  value="<?=$data['id_dokter'];?>">
                    </td>
                <?php }?>
                    <td><?=$no++?>.</td>
                    <td><?=$data['nama_dokter'];?></td>
                    <td><?=$data['spesialis'];?></td>
                    <td><?=$data['alamat'];?></td>
                    <td><?=$data['no_telepon'];?></td>
                    <?php if($_SESSION['status']=='admin'){?>
                    <td align="center">
                        <a href="edit.php?id=<?=$data['id_dokter']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
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
                <a href="tambah.php" class="btn btn-success bt-xs"><i class="glyphicon glyphicon-plus"></i>Tambah Dokter</a>
            </div>
        </h4>
        <div class="box pull-right">
            <button class="btn btn-warning btn-sm" onclick="hapus()"><i class="glyphicon glyphicon-trash"></i>Hapus</button>
        </div>
        <?php }?>   
    </div>
    <?php if($_SESSION['status']=='admin'){?>
        <script>
        $(document).ready(function(){
        $('#dokter').DataTable({
            columnDefs:[
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0, 6]
                }
            ],
            "order": [1, "asc"]
        });    
        $('#select_all').on('click', function(){
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
        function hapus(){
            var conf = confirm('Apakah anda mau menghapus data?');
            if(conf){
                document.proses.action = 'del.php';
                document.proses.submit();
            }
            
        }
    </script>
    <?php include_once('../footer.php'); ?>
        <?php }?>
    </body>
   



