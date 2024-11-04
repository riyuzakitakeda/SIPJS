<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
	<li>
		<?php
			if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
				echo "<span class='pesan'><div class='btn btn-sm btn-inverse m-b-10'><i class='fa fa-bell text-warning'></i>&nbsp; ".$_SESSION['pesan']." &nbsp; &nbsp; &nbsp;</div></span>";
			}
			$_SESSION['pesan'] ="";
		?>
	</li>
	<li><a href="javascript:;" class="btn btn-sm btn-danger m-b-10"><i class="ion-android-calendar fa-lg"></i> &nbsp; <?php echo date("d F Y")?></a></li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Dashboard <small>Overview &amp; statistic</small></h1>
<!-- end page-header -->
<?php
	include "../../config/koneksi.php";
	
	$jmlsis	=mysqli_query($gathuk, "SELECT * FROM tb_siswa");
	$jsis	=mysqli_num_rows($jmlsis);
			
	$jmlkat	=mysqli_query($gathuk, "SELECT * FROM tb_kategori");
	$jkat	=mysqli_num_rows($jmlkat);
		
	$jmlskr	=mysqli_query($gathuk, "SELECT * FROM tb_skripsi");
	$jskr	=mysqli_num_rows($jmlskr);
	
	$selN	=mysqli_query($gathuk, "SELECT * FROM tb_skripsi WHERE approve_dosen='N'");
	$jN		=mysqli_num_rows($selN);
	$selY	=mysqli_query($gathuk, "SELECT * FROM tb_skripsi WHERE approve_dosen='Y' || approve_dosen='R'");
	$jY		=mysqli_num_rows($selY);
	$jW		=$jskr-($jN+$jY);
?>
<div class="row">
	<div class="col-md-9">
		<div class="row">
			<div class="col-md-4 col-sm-6">
				<div class="widget widget-stats bg-gradient-blue text-inverse">
					<a href="javascript:;"><div class="stats-icon stats-icon-lg stats-icon-square bg-gradient-red"><i class="ion-ios-person"></i></div></a>
					<div class="stats-title">MAHASISWA</div>
					<div class="stats-number"><?=$jsis?></div>
					<div class="stats-progress progress">
						<div class="progress-bar" style="width: 70%;"></div>
					</div>
					<div class="stats-desc">Total Data Mahasiswa</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6">
				<div class="widget widget-stats bg-gradient-red text-inverse">
					<a href="javascript:;"><div class="stats-icon stats-icon-lg stats-icon-square bg-gradient-orange"><i class="ion-ios-color-filter"></i></div></a>
					<div class="stats-title">KATEGORI</div>
					<div class="stats-number"><?=$jkat?></div>
					<div class="stats-progress progress">
						<div class="progress-bar" style="width: 50%;"></div>
					</div>
					<div class="stats-desc">Total Kategori Skripsi</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6">
				<div class="widget widget-stats bg-gradient-purple text-inverse">
					<a href="javascript:;"><div class="stats-icon stats-icon-lg stats-icon-square bg-gradient-green"><i class="ion-university"></i></div></a>
					<div class="stats-title">SKRIPSI</div>
					<div class="stats-number"><?=$jskr?></div>
					<div class="stats-progress progress">
						<div class="progress-bar" style="width: 85%;"></div>
					</div>
					<div class="stats-desc">Total Data Pengajuan Judul</div>
				</div>
			</div>
		</div>
		<div class="row">
			<!-- begin col-12 -->
			<div class="col-md-12">
				<div class="panel panel-default" data-sortable-id="index-1">
					<div class="panel-heading">
						<div class="panel-heading-btn">
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
						</div>
						<h4 class="panel-title"><i class="ion-android-checkbox fa-lg text-danger"></i> &nbsp;Pending Approval</h4>
					</div>
					<div class="panel-body">
						<table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
							<thead>
								<tr>
									<th width="3%">No</th>
									<th>Tanggal</th>
									<th>NPM</th>
									<th>Mahasiswa</th>
									<th>Judul</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$no=0;
									$selPen	=mysqli_query($gathuk, "SELECT * FROM tb_skripsi WHERE approve_prodi IS NULL ORDER BY tgl ASC");
									while($spen	=mysqli_fetch_array($selPen)){
									list($y,$m,$d)	=explode ("-",$spen['tgl']);
									$no++
								?>
								<tr>
									<td><?=$no?></td>
									<td><?php echo $d?>-<?php echo $m?>-<?php echo $y?></td>
									<td><?php $tamSis	=mysqli_query($gathuk, "SELECT * FROM tb_siswa WHERE id_siswa='$spen[id_siswa]'");
										$tsis	=mysqli_fetch_array($tamSis);
										echo $tsis['npm'];?>
									</td>
									<td><?php echo $tsis['nama'];?></td>
									<td><?php echo $spen['judul'];?></td>
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>
				</div>				
			</div>
			<!-- end col-12 -->
		</div>
		<div class="row">
			<!-- begin col-12 -->
			<div class="col-md-12">
				<div class="panel panel-default" data-sortable-id="index-1">
					<div class="panel-heading">
						<div class="panel-heading-btn">
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
						</div>
						<h4 class="panel-title"><i class="ion-stats-bars fa-lg text-warning"></i> &nbsp;Statistik Kategori</h4>
					</div>
					<div class="panel-body">
						<div id="container1" class="height-sm"></div>
					</div>
				</div>				
			</div>
			<!-- end col-12 -->
		</div>
	</div>
	<div class="col-md-3">
		<div class="profile-container">
			<h5><span class="label label-inverse"> # Persentase </span></h5>
			<div class="panel-body">
				<div id="container-pie" class="height-sm"></div>
			</div>
		</div>
	</div>
</div>

	<script src="../../assets/js/highcharts.js" type="text/javascript"></script>
	<script type="text/javascript">
		var chart1; // globally available
			$(document).ready(function() {
				chart1 = new Highcharts.Chart({
					chart: {
						renderTo: 'container1',
						type: 'column'
					},   
					title: {
						text: 'Statistik Skripsi By Kategori'
					},
					xAxis: {
						categories: ['Kategori']
					},
						yAxis: {
						title: {
							text: 'Jumlah'
						}
					},
					series:             
						[
						<?php 
						$sql   =mysqli_query($gathuk, "SELECT * FROM tb_skripsi GROUP BY kategori");
							while( $ret = mysqli_fetch_array( $sql ) ){
									$r	=$ret['kategori'];
									
									$sql_jumlah   =mysqli_query($gathuk, "SELECT * FROM tb_skripsi WHERE kategori='$r'");        
									$data = mysqli_num_rows( $sql_jumlah );																									
							?>
								{
									name: '<?php echo $r; ?>',
									data: [<?php echo $data; ?>]
								},
							<?php 
							
							}
							?>
						]
				});
			});	
	</script>
	
	<script type="text/javascript" >	
				var chart;
					$(document).ready(function () {
						chart = new Highcharts.Chart({
						chart: {
							renderTo: 'container-pie',
							plotBackgroundColor: null,
							plotBorderWidth: null,
							plotShadow: false
						},
					title: {
						text: 'Approval'
					},
					tooltip: {
						pointFormat: '{series.name}: <b>{point.percentage}%</b>',
						percentageDecimals: 1
					},
					plotOptions: {
						pie: {
							allowPointSelect: true,
							cursor: 'pointer',
							dataLabels: {
								enabled: false
							},
							showInLegend: true
						}
					},
					series: [{
						type: 'pie',
						name: 'Jumlah',
						colorByPoint: true,
						data: [
								['Approved', <?php echo $jY; ?>],
								['Not Approved', <?php echo $jN; ?>],
								['Wait', <?php echo $jW; ?>],
							]
					}]
					});
				});
	</script>
			
<script> // 500 = 0,5 s
	$(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
	setTimeout(function(){$(".pesan").fadeOut('slow');}, 7000);
</script>