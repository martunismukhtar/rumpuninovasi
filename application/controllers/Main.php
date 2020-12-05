<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$data['content'] = 'modul/beranda';
		$this->load->view('_layout',$data);
	}

	public function deskripsi_lembaga(){
		$data['page'] = "Deskripsi Lembaga ";
		$data['isi'] = "Pengertian lembaga lebih menunjuk pada sesuatu bentuk, sekaligus juga mengandung mana yang abstrak. Karena dalam pengertian lembaga juga mengandung tentang seperangkat norma-norma, peruturan-peraturan yang menjadi ciri lembaga tersebut. Lembaga merupakan system yang kompleks yang mencangkup berbagai hal yang berhubungan dengan konsep sosial, psikologis, politik dan hukum.
		Konsep lembaga/ kelembagaan telah banyak dibahas dalam sosiologi, antropologi, hukum dan politik. Dalam bidang sosiologi dan antropologi kelembagaan banyak di tekankan pada norma, tingkah laku maupun adat istiadat. Dalam ilmu politik kelembagaan banyak ditekankan pada aturan main, kegiatan kolektif untuk kepentingan bersama. Dalam ilmu Psikologi menegaskan pentingnya kelembagaan dari sudut pandang tingkah laku manusia. Sedangkan dari ilmu hukum melihatnya dari sudut hukum atau regulasinya serta istrumen dan litigasinya (Djogo, dkk, 2003)
		Untuk memahami lebih dalam tentang arti lembaga, dapat dilihat dari berbagai pendapat para ahli tentang konsep dan definisi dari lembaga. Pengertian lembaga menurut para ahli adalah sebagai berikut :
		Ensiklopedia Sosiologi
		“institusi” --sebagaimana didefinisikan oleh Macmillan-- adalah merupakan seperangkat hubungan norma-norma, keyakinan-keyakinan, dan nilai-nilai yang nyata, yang terpusat pada kebutuhan-kebutuhan sosial dan serangkaian tindakan yang penting dan berulang.
		Adelman & Thomas
		Mendefinisikan institusi sebagai suatu bentuk interaksi di antara manusia yang mencakup sekurang-kurangnya tiga tingkatan.  Pertama, tingkatan nilai kultural yang menjadi acuan bagi institusi yang lebih rendah tingkatannya.  Kedua, mencakup hukum dan peraturan yang mengkhususkan pada apa yang disebut aturan main (the rules of the game). Ketiga, mencakup pengaturan yang bersifat kontraktual yang digunakan dalam proses transaksi.  Ketiga tingkatan institusi di atas menunjuk pada hirarki mulai dari yang paling ideal (abstrak) hingga yang paling konkrit, dimana institusi yang lebih rendah berpedoman pada institusi yang lebih tinggi tingkatannya.
		Israel
		Konsep umum mengenai lembaga meliputi apa yang ada pada tingkat lokal atau masyarakat, unit manajemen proyek, institusi-institusi, departemen-departemen di pemerintah pusat dan sebagainya. Sebuah lembaga dapat merupakan milik negara atau sektor swasta dan juga bisa mengacu pada fungsi-fungsi administrasi pemerintah.
		Kartodiharjo et al
		Lembaga adalah instrument yang mengatur hubungan antar individu. lembaga juga berarti seperangkat ketentuan yang mengatur masyarakat yang telah mendefinisikan bentuk aktifitas yang dapat dilakukan oleh pihak tertentu terhadap pihak lainnya, hak istimewa yang telah diberikan serta tanggungjawab yang harus dilakukan.
		Schmidt
		Lembaga atau institusi merupakan sekumpulan orang yang memiliki hubungan yang teratur dengan memberikan definisi pada hak, kewajiban, kepentingan, dan tanggungjawab bersama.
		Hayami dan kikuchi
		Lembaga adalah (1) aturan main dalam interaksi interpersonal, yaitu sekumpulan aturan mengenai tata hubungan manusia degan lingkungannya yang menyangkut hak-hak, perlindungan hak-hak dan tanggung jawab. (2) suatu organisasi yang memiliki heirarki yaitu adanya mekanisme administrative dan kewenangan.";
		$data['content'] = 'modul/page';
		$data['cekfile'] = False;
		$this->load->view('_page',$data);
	}

	public function filosofi_lembaga(){
		$data['page'] = "Filosofi Lembaga";
		$data['isi'] = "<ul>
		<li>Penelitian</li>
		<li>Tatakelola</li>
		<li>Kemitraan</li>
		</ul>";
		$data['cekfile'] = False;
		$data['content'] = 'modul/page';
		$this->load->view('_page',$data);
	}

	public function rentang_inovasi() {
		$data['page'] = "Rentang Inovasi";
		$data['isi'] = "<ul><li>Akademik</li>
		<li>Bisinis</li>
		<li>Komunitas</li>
		<li>Pemerintah</li></ul>";
		$data['cekfile'] = False;
		$data['content'] = 'modul/page';
		$this->load->view('_page',$data);
	}

	public function alam_lestari() {
		$data['page'] = "Alam Lestasi";
		$data['isi'] = "Program Konservasi<br>
		• Deskripsi Menyusul";
		$data['cekfile'] = False;
		$data['content'] = 'modul/page';
		$this->load->view('_page',$data);
	}

	public function lumbung_pangan() {
		$data['page'] = "Lumbung Pangan Abadi";
		$data['isi'] = "Progran Pembangunan Berkelanjutan pada
		Landscape dan Seascape sektoral : Agro, Aqua, dan
		Marine.<br>
		• Deskripsi Menyusul";
		$data['cekfile'] = False;
		$data['content'] = 'modul/page';
		$this->load->view('_page',$data);
	}

	public function inovasi_energi() {
		$data['page'] = "Inovasi Energi";
		$data['isi'] = "Program inovasi dalam Konservasi dan Teknologi
		Konversi Energi Terbarukan<br>
		• Deskripsi Menyusul";
		$data['cekfile'] = False;
		$data['content'] = 'modul/page';
		$this->load->view('_page',$data);
	}

	public function adat_berdaulat() {
		$data['page'] = "Adat yang Berdaulat";
		$data['isi'] = "Pendampingan dan dukungan untuk penguatan Adat
		dan masyarakat pada tingkat tapak<br>
		• Deskripsi Menyusul";
		$data['cekfile'] = False;
		$data['content'] = 'modul/page';
		$this->load->view('_page',$data);
	}

	public function insan_mumpuni() {
		$data['page'] = "Insan Mumpuni";
		$data['isi'] = "Dukungan untuk Penguatan Kapasitas SDM dalam
		Bidang Iptek dan Imtaq<br>
		• Deskripsi Menyusul";
		$data['cekfile'] = False;
		$data['content'] = 'modul/page';
		$this->load->view('_page',$data);
	}

	public function dokumen() {
		$data['page'] = "Dokumen";
		$data['isi'] = "Dokumen yang disusun, dicetak, dan dipublikasikan
		oleh SRI Sendiri dan Kolaborasi<br>
		• Dokumen Photo/Cover<br>
		• Ringkasan atau Abstrak<br>
		• Link Mitra<br>
		• Link Download (Jika Tersedia)";
		$data['cekfile'] = TRUE;
		$data['file'] = 'widget/file';
		$data['content'] = 'modul/page';
		$this->load->view('_page',$data);
	}

	public function sistem_informasi() {
		$data['page'] = "Sistem Informasi";
		$data['isi'] = "Sistem informasi yaitu suatu sistem yang menyediakan informasi untuk manajemen dalam mengambil keputusan dan juga untuk menjalankan operasional perusahaan, di mana sistem tersebut merupakan kombinasi dari orang-orang, teknologi informasi dan prosedur-prosedur yang tergorganisasi. Biasanya suatu perusahan atau badan usaha menyediakan semacam informasi yang berguna bagi manajemen. Sebagai contoh: Perusahaan toko buku mempunyai sistem informasi yang menyediakan informasi penjualan buku-buku setiap harinya, serta stock buku-buku yang tersedia, dengan informasi tersebut, seorang manajer bisa membuat kebutusan, stock buku apa yang harus segera mereka sediakan untuk toko buku mereka, manajer juga bisa tahu buku apa yang paling laris dibeli konsumen, sehingga mereka bisa memutuskan buku tersebut jumlah stocknya lebih banyak dari buku lainnya.<br>
		Portal, Website, Sistem Aplikasi yang dibangun SRI<br>
		• Narasi<br>
		• Photo, Video, Dokumen, Link Aplikasi<br>
		<br>
		Contoh :<br>
		• ID-Tambak<br>
		• e-pantau, dll<br>
		• e-gampong";
		$data['cekfile'] = TRUE;
		$data['file'] = 'widget/file';
		$data['content'] = 'modul/page';
		$this->load->view('_page',$data);
	}

	public function model_inovasi() {
		$data['page'] = "Model Inovasi";
		$data['isi'] = "Rangkuman Project dan Kegitan membangun model
		inovasi dalam lingkup program SRI<br>
		• Narasi<br>
		• Photo, Video, Dokumen, Link Internet<br>
		Contoh :<br>
		• Pilot Project Klaster Perikanan Budidaya<br>
		• Model EBT untuk Aquakultur";
		$data['cekfile'] = TRUE;
		$data['file'] = 'widget/file';
		$data['content'] = 'modul/page';
		$this->load->view('_page',$data);
	}

	public function kegiatan() {
		$data['page'] = "Kegiatan";
		$data['cekfile'] = False;
		$data['content'] = 'modul/kegiatan';
		$this->load->view('_page',$data);
	}

	public function kontak() {
		$data['page'] = "Hubungi Kami";
		$data['cekfile'] = False;
		$data['content'] = 'modul/kontak';
		$this->load->view('_page',$data);
	}
}
