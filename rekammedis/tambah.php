<?php include_once('../header.php'); ?>
    <div class="box">
        <h1>Rekam Medis</h1>
        <h4>
            <small>Tambah Rekam Medis</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning bt-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="pasien">Pasien</label>
                        <select name="pasien" id="pasien" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <?php 
                            $sql_pasien =mysqli_query($koneksi, "SELECT * FROM tb_pasien ORDER BY nama_pasien ASC") or die (mysqli_error($koneksi));
                            while($data_pasien=mysqli_fetch_array($sql_pasien)){
                                echo '<option value="'.$data_pasien['id_pasien'].'">'.$data_pasien['nama_pasien'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="klhn">Keluhan</label>
                        <textarea name="klhn" id="klhn" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="dokter">Dokter</label>
                        <select name="dokter" id="dokter" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <?php 
                            $sql_dokter =mysqli_query($koneksi, "SELECT * FROM tb_dokter") or die (mysqli_error($koneksi));
                            while($data_dokter=mysqli_fetch_array($sql_dokter)){
                                echo '<option value="'.$data_dokter['id_dokter'].'">'.$data_dokter['nama_dokter'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="diagnosa">Diagnosa</label>
                        <textarea name="diagnosa" id="diagnosa" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="poli">Poliklinik</label>
                        <select name="poli" id="poli" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <?php 
                            $sql_poli =mysqli_query($koneksi, "SELECT * FROM tb_poliklinik ORDER BY nama_poli ASC") or die (mysqli_error($koneksi));
                            while($data_poli=mysqli_fetch_array($sql_poli)){
                                echo '<option value="'.$data_poli['id_poli'].'">'.$data_poli['nama_poli'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="obat">Obat</label>
                        <select multiple name="obat[]" id="obat" class="form-control" size="5" required>
                            <?php 
                            $sql_obat =mysqli_query($koneksi, "SELECT * FROM tb_obat") or die (mysqli_error($koneksi));
                            while($data_obat=mysqli_fetch_array($sql_obat)){
                                echo '<option value="'.$data_obat['id_obat'].'">'.$data_obat['nama_obat'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tgl">Tanggal Periksa</label>
                        <input type="date" name="tgl" id="tgl" value="<?=date('Y-m-d')?>" class="form-control" required>  
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" name="tambah" value="simpan" class="btn btn-success">
                        <input type="reset" name="reset" value="reset" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include_once('../footer.php');?>