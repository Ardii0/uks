
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('frontend/style/head'); ?>

<body>
	<style media="screen">
		/*#about {

			background-color: #eaeaea;
		}*/
		/*#service {
			background-color: #616161;
		}*/
		p{
			color: #4CAF50;
		}
	</style>
	<!-- Header -->
	<?php $this->load->view('frontend/style/header'); ?>
	<!-- /Header -->


	<!-- About -->
	<div id="about" class="section md-padding">


		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">
				<?php foreach($menu_paket as $row):?>
				<!-- Section header -->
				<div class="section-header text-center">
					<h2 class="white-text">PILIHAN PAKET <br> PUTRI HANASTARI WEDDING ORGANIZER</h2>
				</div>
				<!-- /Section header -->
				<div class="bg-img" style="background-image: url('<?= base_url('frontend/img/background1.jpg') ?>');">
			<div class="overlay"></div>
		</div>

				<!-- about -->

				<div class="col-md-3">

					<div class="about">
						<!--<i class="fa fa-cogs"></i-->
						<h3>Paket 1</h3>
						<p> <?php echo $row->paket1?> </p>
						<!-- <p></p> -->

					</div>

				</div>
				<!-- /about -->

				<!-- about -->
				<div class="col-md-3">
					<div class="about">
						<!--<i class="fa fa-magic"></i-->
						<h3>Paket 2</h3>
						<p><?php echo $row->paket2?></p>
						<!--<a href="#">1. Dokter Umum
												2. Dokter Gigi
												3. Dokter Tulang</a-->
					</div>
				</div>
				<!-- /about -->

				<!-- about -->
				<div class="col-md-3">
					<div class="about">

						<h3>Paket 3</h3>
						<p><?php echo $row->paket3?></p>

					</div>
				</div>

				<div class="col-md-3">
					<div class="about">

						<h3>Paket 4</h3>
						<p><?php echo $row->paket4?></p>


					</div>
				</div>
				<!-- /about -->

			</div>
		<?php endforeach ?>
			<!-- /Row -->

		</div>

		<!-- /Container -->

	</div>

	<!-- /About -->


	<!-- Service -->
	<div id="service" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">
				<?php foreach($foto as $row):?>
				<!-- Section header -->
				<div class="section-header text-center">
					<h2 class="white-text">PILIHAN FOTO <br> PUTRI HANASTARI WEDDING ORGANIZER</h2>
				</div>
				<!-- /Section header -->
				<div class="bg-img" style="background-image: url('<?= base_url('frontend/img/background1.jpg') ?>');">
			<div class="overlay"></div>
		</div>

				<!-- service -->
				<div class="col-md-4 col-sm-6">
						<center><img style="width: 300px;height: 300px; " src="<?php echo base_url('uploads/admin/foto_frontend')."/".$row->foto1;?>" alt=""></center>
					
				</div>
				<div class="col-md-4 col-sm-6">
					<center><img style="width: 300px;height: 300px; " src="<?php echo base_url('uploads/admin/foto_frontend')."/".$row->foto2;?>" alt=""></center>
				</div>
				<!-- /service -->

				<!-- service -->
				<div class="col-md-4 col-sm-6">
					<center><img style="width: 300px;height: 300px; " src="<?php echo base_url('uploads/admin/foto_frontend')."/".$row->foto3;?>" alt=""></center>
				</div>


			</div>
			<?php endforeach ?>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>

	<div id="tentang" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">
				<?php foreach($foto as $row):?>
				<!-- Section header -->
				<div class="section-header text-center">
					<h2 class="white-text">Tentang<br> PUTRI HANASTARI WEDDING ORGANIZER</h2>
				</div>
				<!-- /Section header -->
				<div class="bg-img" style="background-image: url('<?= base_url('frontend/img/background1.jpg') ?>');">
			<div class="overlay"></div>
		</div>

				<!-- service -->
				<div class="col-md-7">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.8288867969213!2d110.49837995068334!3d-7.029389494897676!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708d95e7258867%3A0x5994b9c46531a05e!2sJasmine%20Park!5e0!3m2!1sid!2sid!4v1668487291864!5m2!1sid!2sid" width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>

				<!-- service -->
				<div class="col-md-5">
						<h4 class="white-text"> CLEMIRA MANAGEMENT GROUP </h4>
						<p class="white-text"> Office : Jasmine Park J16 No. 15 Semarang </p>
						<p class="white-text"> Instagram : <a href="https://www.instagram.com/wo_mewah_murah_semarang/"> @wo_mewah_murah_semarang </a></p>
						<p class="white-text"> WA : <a href="https://wa.me/6281542130128"> 0815-4213-0128 </a> / <a href="https://wa.me/6281542138974"> 0815-4213-8974 </a> </p>
				</div>


			</div>
			<?php endforeach ?>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Service -->

<?php $this->load->view('frontend/style/footer'); ?>
	<!-- /Footer -->

	<!-- Back to top -->
	<div id="back-to-top"></div>
	<!-- /Back to top -->

	<!-- Preloader -->
	<div id="preloader">
		<div class="preloader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<!-- /Preloader -->

	<!-- jQuery Plugins -->
<?php $this->load->view('frontend/style/js'); ?>
</body>

</html>
