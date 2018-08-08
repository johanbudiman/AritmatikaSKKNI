<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Perhitungan Aritmatika</title>


	<!-- meload css dan js -->
	<link href="<?php echo base_url('assets/css/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
	<script src='https://code.responsivevoice.org/responsivevoice.js'></script>

	
	<!-- menyembunyikan error report -->
	<?php 
		error_reporting(0)
	?>
</head>
<body>
	
	<!-- heading nama aplikasi -->
	<div class="container text-center pt-3">
		<h2>Aplikasi Aritmatika</h2>
	</div>
	
	<!-- bagian form -->
	<div class="container">

		<!-- form aritmatika -->
		<form action=" <?php echo site_url('Perhitungan/PerhitunganAritmatika') ?>" method="post" accept-charset="utf-8">

			<!-- input angka pertama -->
			<div class="" id="input-angka-pertama">
				<span class="font-weight-bold text-uppercase">Angka Pertama</span>
				<input class="form-control no-spin btn-outline-secondary" type="number" required name="angka-pertama" placeholder="Contoh : 123">
			</div>		

			<!-- input angka kedua -->
			<div class="mt-3" id="input-angka-pertama">
				<span class="font-weight-bold text-uppercase">Angka Kedua</span>
				<input class="form-control no-spin btn-outline-secondary" type="number" required name="angka-kedua" placeholder="Contoh : 123">
			</div>

			<!-- button jenis aritmatika -->
			<div class="row pt-3" id="tombol-aritmatika">
				<!-- aritmatika tambah -->
				<div class="col-3">
					<button class="btn btn-success btn-block font-weight-bold" type="submit" name="button-jenis-aritmatika" value="+">+</button>
				</div>
				<!-- aritmatika kurang -->
				<div class="col-3">
					<button class="btn btn-success btn-block font-weight-bold" type="submit" name="button-jenis-aritmatika" value="-">-</button>
				</div>
				<!-- artimatika kali -->
				<div class="col-3">
					<button class="btn btn-success btn-block font-weight-bold" type="submit" name="button-jenis-aritmatika" value="X">X</button>
				</div>
				<!-- aritmatika bagi -->
				<div class="col-3">
					<button class="btn btn-success btn-block font-weight-bold" type="submit" name="button-jenis-aritmatika" value="/">/</button>
				</div>
			</div>

		</form>
	</div>

	<!-- bagian menampilkan hasil dan suara -->
	<div class="container">

		<!-- condition untuk menampilkan view hasil jika ada data hasil -->
		<?php if ($hasil): ?>
			
			<!-- menampilkan hasil -->
			<div class="container pt-5" id="hasil-aritmatika">
				<h2 class="text-center font-weight-bold"> Hasil Aritmatika</h2>

				<div class="card">
					<div class="card-header">
						<!-- menampilkan hasil dalam bentuk angka -->
						<h4 class="text-center font-weight-bold text-capitalize">
							<?php echo $angka_pertama." ".$jenis_aritmatika." ".$angka_kedua." = ".$hasil.$test ?>
						</h4>
						<!-- menampilkan hasil dalam bentuk terbilang -->
						<h4 class="font-weight-bold">
							Terbilang : <br>
							<?php echo $hasil_word ?>
						</h4>
					</div>
				</div>
			</div>
			
			<!-- tombol suara untuk menyebutkan hasil aritmatika -->
			<div class="container pt-3" id="suara-hasil-aritmatika">
				<input class="btn btn-info" onclick='responsiveVoice.speak("<?php echo $angka_pertama.$aritmatika_text.$angka_kedua." = ".$hasil ?>",  "Indonesian Female");' type='button' value='🔊 Hasil Aritmatika' />
			</div>
			
		<?php endif ?>
	</div>

	
</body>
</html>
