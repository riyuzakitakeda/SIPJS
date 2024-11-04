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
<h1 class="page-header">Welcome <small>Visitor</small></h1>
<!-- end page-header -->
<?php
	include "config/koneksi.php";
?>
<div class="row">
	<div class="col-sm-8 col-sm-offset-2 m-t-40">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-inverse">
                        <div class="panel-body">
							<div id="myCarousel" class="carousel slide" data-ride="carousel">
								<!-- Indicators -->
								<ol class="carousel-indicators">
									<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
									<li data-target="#myCarousel" data-slide-to="1"></li>
									<li data-target="#myCarousel" data-slide-to="2"></li>
									<li data-target="#myCarousel" data-slide-to="3"></li>
									<li data-target="#myCarousel" data-slide-to="4"></li>
								</ol>
								<!-- Wrapper for slides -->
								<div class="carousel-inner">
									<div class="item active">
										<img src="assets/img/slide/img-1.jpeg" alt="">
									</div>
									<div class="item">
										<img src="assets/img/slide/img-2.jpeg" alt="">
									</div>
									<div class="item">
										<img src="assets/img/slide/img-3.jpeg" alt="">
									</div>
									<div class="item">
										<img src="assets/img/slide/img-4.jpeg" alt="">
									</div>
									<div class="item">
										<img src="assets/img/slide/img-5.jpeg" alt="">
									</div>
								</div>
								<!-- Left and right controls -->
								<a class="left carousel-control" href="#myCarousel" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#myCarousel" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
                        </div>
				</div>
			</div>
		</div>
		<div class="row">
			<!-- begin col-12 -->
			<div class="col-md-12">
				<div class="panel panel-default" data-sortable-id="index-1">
					<div class="panel-body">
						<p>Welcome</p>
					</div>
				</div>				
			</div>
			<!-- end col-12 -->
		</div>
	</div>
</div>
		
<script> // 500 = 0,5 s
	$(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
	setTimeout(function(){$(".pesan").fadeOut('slow');}, 7000);
</script>

<style>
	.carousel-inner > .item > img{ margin:auto; }
</style>