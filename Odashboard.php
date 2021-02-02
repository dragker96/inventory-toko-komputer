<?php include('owner.php'); ?>
<?php include ('koneksi.php'); ?>
<body>
<div class="jumbotron mt-3 m-2">
	<h1> SELAMAT DATANG DI</h1>
    <h1  class="display-4"> Aplikasi Inventori Pejuang Komputer Sejahtera</h1>
    <h6>Anda login sebagai Manajer</h6>
</div>
<?php 
include ('koneksi.php');
$jml_msk = mysql_num_rows(mysql_query("SELECT * FROM dt_unit_masuk"));
$jml_unit = mysql_num_rows(mysql_query("SELECT * FROM unit"));
$jml_keluar = mysql_num_rows(mysql_query("SELECT * FROM unit_keluar"));
$jml_laku = mysql_num_rows(mysql_query("SELECT unit_keluar.no_nota, unit_keluar.nm_p AS namap, dt_unit_masuk.harga_beli AS hrgbeli, unit.harga AS hrgjual, unit.nm_unit, dt_unit_masuk.tgl_masuk, unit_keluar.tgl_keluar, (unit.harga-dt_unit_masuk.harga_beli) AS keuntungan FROM unit_keluar INNER JOIN unit ON unit_keluar.id_unit=unit.id_unit INNER JOIN dt_unit_masuk ON unit.kd_masuk=dt_unit_masuk.kd_masuk"));
$stok = mysql_num_rows(mysql_query("SELECT unit.nm_unit, unit.kategori, unit.kondisi, unit.harga, unit.informasi FROM unit LEFT OUTER JOIN unit_keluar ON unit.id_unit=unit_keluar.id_unit WHERE unit_keluar.id_unit IS NULL"));
?>

<div class="row mb-3 pb-3 m-2">
	<div class="col-sm-4 mb-3">
    	<ul class="list-group">
        	<li class="list-group-item text-danger">
            	<i class="oi oi-clipboard display-3"></i>
                	<span class="display-3 float-right">
                		<?= $jml_msk ?>	
                	</span>
            </li>
            <li class="list-group-item bg-danger">
            	<a href="OhomeUM.php" class="nav-link text-white">Data Unit Masuk</a>
            </li>
        </ul>
    </div>

	<div class="col-sm-4 mb-3">
    	<ul class="list-group">
        	<li class="list-group-item text-success">
            	<i class="oi oi-document display-3"></i>
                	<span class="display-3 float-right">
                		<?= $jml_unit ?>	
                	</span>
            </li>
            <li class="list-group-item bg-success">
            	<a href="Ounit(2).php" class="nav-link text-white">Data Unit</a>
            </li>
        </ul>
    </div>
    
    <div class="col-sm-4 mb-3">
    	<ul class="list-group">
        	<li class="list-group-item text-warning">
            	<i class="oi oi-external-link display-3"></i>
                	<span class="display-3 float-right">
                		<?= $jml_keluar ?>	
                	</span>
            </li>
            <li class="list-group-item bg-warning">
            	<a href="OunitKeluar.php" class="nav-link text-white">Data Unit Keluar</a>
            </li>
        </ul>
    </div>

	<div class="col-sm-6 mb-3">
    	<ul class="list-group">
        	<li class="list-group-item text-secondary">
            	<i class="oi oi-spreadsheet display-3"></i>
                	<span class="display-3 float-right">
                		<?= $stok ?>	
                	</span>
            </li>
            <li class="list-group-item bg-secondary">
            	<a href="laporan.php" class="nav-link text-white">Stok </a>
            </li>
        </ul>
    </div>
    
	<div class="col-sm-6 mb-3">
    	<ul class="list-group">
        	<li class="list-group-item text-primary">
            	<i class="oi oi-file display-3"></i>
                	<span class="display-3 float-right">
                		<?= $jml_laku ?>	
                	</span>
            </li>
            <li class="list-group-item bg-primary">
            	<a href="laporan.php" class="nav-link text-white">Laporan </a>
            </li>
        </ul>
    </div>
</div>


<?php include ('footer.php'); ?>
</body>

