<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perhitungan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('Perhitungan');
	}

	
	public function PerhitunganAritmatika()
	{

		$angka_pertama = $this->input->post('angka-pertama');
		$angka_kedua = $this->input->post('angka-kedua');
		$jenis_aritmatika = $this->input->post('button-jenis-aritmatika');


		/*echo $angka_pertama;
		echo $angka_kedua;
		echo $jenis_aritmatika;*/

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


/*		$f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
echo $f->format(1432);*/

		$data = array(
			'hasil' => $hasil,
			'angka_pertama' => $angka_pertama,
			'angka_kedua' => $angka_kedua,
			'jenis_aritmatika' => $jenis_aritmatika,
			'aritmatika_text' => $aritmatika_text,
			'hasil_word' => ($hasil>=0 ? number_to_word($hasil) : 'Minus '.number_to_word($hasil*-1))
		);		



		//print_r($data);

		$this->load->view('Perhitungan', $data);



	}

}

/* End of file Perhitungan.php */
/* Location: ./application/controllers/Perhitungan.php */