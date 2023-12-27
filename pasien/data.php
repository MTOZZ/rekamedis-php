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
        <h1> Data Pasien</h1>
        </center>
        <div class="table-responsive">
            
            <table class="table table-striped table-bordered table-hover" id="pasien">
            <thead>
                <tr>
                    <th>Nomor Identitas</th>
                    <th>Nama Pasien</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th><i class="glyphicon glyphicon-cog"></i></th>
                </tr>
            </thead>
        </table>
        
        <h4>
            <div class="pull-left">
                <a href="" class="btn btn-default bt-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="tambah.php" class="btn btn-success bt-xs"><i class="glyphicon glyphicon-plus"></i> Tambah Pasien</a>
            </div>
        </h4>
        </div>
        <script>
        $(document).ready(function () {
            $('#pasien').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'data_pasien.php',
            dom : 'Bfrtip',
            
            buttons :[
                {
                    extend : 'pdf',
                    orientation : 'potrait',
                    pageSize : 'legal',
                    title : 'Data Pasien',
                    download : 'open',
                },
                'csv','excel','print','copy'
            ],
            columnDefs:[
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": 5,
                    "render": function(data, type, row){
                        var btn="<center><a href=\"edit.php?id="+data+"\" class=\"btn btn-warning btn-xs\"><i class=\"glyphicon glyphicon-edit\"></i></a><a href=\"del.php?id="+data+"\" onclick=\"return confirm('Apakah yakin ingin mengahapus')\"class=\"btn btn-danger btn-xs\"><i class=\"glyphicon glyphicon-trash\"></i></a></center>";
                        return btn;
                    }
                }
            ],
         });
        });
        </script>
    </div>
    </body>

<?php include_once('../footer.php'); ?>


