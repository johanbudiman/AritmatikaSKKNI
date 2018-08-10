<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perhitungan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	//fungsi awal
	public function index()
	{
		//load view perhitungan
		$this->load->view('Perhitungan');
	}

	//fungsi melakukan perhitungan aritmatika
	public function PerhitunganAritmatika()
	{

		//pengambilan nilai dan jenis aritmatika
		$angka_pertama = $this->input->post('angka-pertama');
		$angka_kedua = $this->input->post('angka-kedua');
		$jenis_aritmatika = $this->input->post('button-jenis-aritmatika');


		//perbandingan dan perhitungan hasil aritmatika
		if ($jenis_aritmatika=="+") {
			$hasil = $angka_pertama + $angka_kedua;
			$aritmatika_text = " tambah ";
		} elseif ($jenis_aritmatika=="-") {
			$hasil = $angka_pertama - $angka_kedua;
			$aritmatika_text = " kurang ";
		} elseif ($jenis_aritmatika=="X") {
			$hasil = $angka_pertama * $angka_kedua;
			$aritmatika_text = " kali ";
		} elseif ($jenis_aritmatika=="/") {
			$hasil = $angka_pertama / $angka_kedua;
			$aritmatika_text = " bagi ";
		} else {
			$hasil = "Terjadi Kesalahan";
		}


		//menyimpan data yang akan di kirim ke view dalam bentuk array
		if (intval(number_to_word($hasil))) {
			$data = array(
				'hasil' => $hasil,
				'angka_pertama' => $angka_pertama,
				'angka_kedua' => $angka_kedua,
				'jenis_aritmatika' => $jenis_aritmatika,
				'aritmatika_text' => $aritmatika_text,
				'hasil_word' => ($hasil>=0 ? number_to_word($hasil) : 'Minus '.number_to_word($hasil*-1))
			);
		} else {
			if ($hasil>=0) {

				if (floor($hasil) != $hasil) {
					list(
						$angka1,
						$angka2,
					) = explode(".", $hasil);

					$data = array(
						'hasil' => $angka1.".".substr($angka2, 0, 2),
						'angka_pertama' => $angka_pertama,
						'angka_kedua' => $angka_kedua,
						'jenis_aritmatika' => $jenis_aritmatika,
						'aritmatika_text' => $aritmatika_text,
						'hasil_word' => (number_to_word($angka1)." Koma ".number_to_word(substr($angka2, 0, 2)))
					);
				} else {
					$data = array(
						'hasil' => $hasil,
						'angka_pertama' => $angka_pertama,
						'angka_kedua' => $angka_kedua,
						'jenis_aritmatika' => $jenis_aritmatika,
						'aritmatika_text' => $aritmatika_text,
						'hasil_word' => (number_to_word($hasil))
					);
				}
				
			} else {

				if (floor($hasil) != $hasil) {
					list(
						$angka1,
						$angka2,
					) = explode(",", ($hasil*-1));

					$data = array(
						'hasil' => $angka1.".".substr($angka2, 0, 2),
						'angka_pertama' => $angka_pertama,
						'angka_kedua' => $angka_kedua,
						'jenis_aritmatika' => $jenis_aritmatika,
						'aritmatika_text' => $aritmatika_text,
						'hasil_word' => ("Minus ".number_to_word($angka1)." Koma ".number_to_word(substr($angka2, 0, 2)))
					);
				} else {
					$data = array(
						'hasil' => $hasil,
						'angka_pertama' => $angka_pertama,
						'angka_kedua' => $angka_kedua,
						'jenis_aritmatika' => $jenis_aritmatika,
						'aritmatika_text' => $aritmatika_text,
						'hasil_word' => ("Minus ".number_to_word($hasil))
					);
				}

				
			}
		}
				


		//load view dan mengirim data ke view
		$this->load->view('Perhitungan', $data);



	}

}

/* End of file Perhitungan.php */
/* Location: ./application/controllers/Perhitungan.php */