<?php

namespace App\Controllers;

use App\Models\KullaniciModeli;
use App\Models\NotModeli;

class main extends BaseController
{
   public function index()
   {
	    $data =[];
	    helper(['form']);

	    if ($this->request->getMethod() == 'post') {
			$rules = [
				'ogrencino' => 'required|min_length[3]|max_length[10]',
				'sifre' => 'required|min_length[8]|max_length[255]|kullanicidogrula[kimlikno,sifre]',
			];

			$errors = [
				'sifre' => [
					'kullanicidogrula' => 'Öğrenci No veya Şifre doğru değil'
				]
			];

			if (! $this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;
			}else{
				$model = new KullaniciModeli();

				$kullanici = $model->where('ogrencino', $this->request->getVar('ogrencino'))
							->first();

				$this->SessionBilgisi($kullanici);
				return redirect()->to('');

			}
		}
	    echo view('templates/header', $data);
	    echo view('main', $data);
	    echo view('templates/footer', $data);
   }

   private function SessionBilgisi($kullanici){
	$data = [
		'id' => $kullanici['id'],
		'isim' => $kullanici['isim'],
		'soyisim' => $kullanici['soyisim'],
		'ogrencino' => $kullanici['ogrencino'],
                'kimlikno' => $kullanici['kimlikno'],
                'dogumyili' => $kullanici['dogumyili'],
                'email' => $kullanici['email'],
		'yonetici' => $kullanici['admin'],
		'isLoggedIn' => true,
	];
	session()->set($data);
	return true;
    }
        public function kayit()
        {
            $data =[];
            helper(['form']);

                    $validation =  \Config\Services::validation();
                    $rules = [
                        'isim' => 'required',
                        'soyisim' => 'required',
                        'dogumyili'=> 'required|min_length[4]|max_length[4]',
                        'ogrencino' => 'required|min_length[3]|max_length[10]|is_unique[kullanici.ogrencino]',
                        'sifre' => 'required|min_length[8]|max_length[255]',
                        'sifredogrula' => 'matches[sifre]',
                        'kimlikno' => 'required|kimlikkontrol[kimlikno,isim,soyisim,dogumyili]'
		    ];
		    $errors = [
			'kimlikno' => [
				'kimlikkontrol' => 'Kimlik Doğrulaması Başarısız.'
			]
		    ];

                if (! $this->validate($rules, $errors)) {
                        $data['validation'] = $this->validator;
                } else {
                        $model = new KullaniciModeli();
                        $kullanici = $model->where('kimlikno', $this->request->getVar('kimlikno'))
                                                                                        ->first();

                        $yeniveri = [
                                'isim' => $this->request->getVar('isim'),
                                'soyisim' => $this->request->getVar('soyisim'),
                                'kimlikno' => $this->request->getVar('kimlikno'),
                                'dogumyili' => $this->request->getVar('dogumyili'),
                                'email' => $this->request->getVar('email'),
                                'ogrencino' => $this->request->getVar('ogrencino'),
                                'sifre' => $this->request->getVar('sifre'),
                        ];
                        $model->save($yeniveri);
                        $session = session();
                        $session->setFlashdata('success', 'Kayıt Başarılı');
                        return redirect()->to(site_url('/'));
		}
            if (session()->get('yonetici') == true ){
                       echo view('templates/headeradmin', $data);
            } else {
                       echo view('templates/headerogrenci', $data);
            }
            echo view('kayit', $data);
            echo view('templates/footer', $data);
         }

        public function notgiris()
        {
            $data =[];
            helper(['form','url']);
                    $validation =  \Config\Services::validation();
                    $rules = [
                        'dersadi' => 'required',
                        'ogrencino' => 'required',
                        'not'=> 'required',
                        ];

                if (! $this->validate($rules)) {
                        $data['validation'] = $this->validator;
                } else {
                        $model = new NotModeli();
                        $not = $model->where('dersadi', $this->request->getVar('dersadi'))
                                                                             ->first();
                        $yeniveri = [
                                'dersadi' => $this->request->getVar('dersadi'),
                                'ogrencino' => $this->request->getVar('ogrencino'),
				'not' => $this->request->getVar('not'),
                        ];
                        $model->save($yeniveri);
                        $session = session();
                        $session->setFlashdata('success', 'Kayıt Başarılı');
                        return redirect()->to(site_url('/'));
                }
            if (session()->get('yonetici') == true ){
                       echo view('templates/headeradmin', $data);
            } else {
                       echo view('templates/headerogrenci', $data);
            }
            echo view('notgiris', $data);
            echo view('templates/footer', $data);
         }
        public function anamenu()
        {
                $data = [];

                if (session()->get('yonetici') == true ){
                        echo view('templates/headeradmin', $data);
                } else {
                        echo view('templates/headerogrenci', $data);
                }
                echo view('templates/footer');
        }
   	public function ogrencilistesi(){

		$data=[];

		$model = new KullaniciModeli();
		$data['kullanicilar'] = $model->where('admin', 0)->orderBy('id', 'DESC')->findAll();

                if (session()->get('yonetici') == true ){
                        echo view('templates/headeradmin', $data);
                } else {
                        echo view('templates/headerogrenci', $data);
                }
                echo view('ogrencilistesi');
                echo view('templates/footer');
	}

   	public function dersdurum(){

		$data=[];
		$model = new NotModeli();
		$model2 = new KullaniciModeli();
		$data['notlar'] = $model->where('ogrencino', session()->get('ogrencino'))->findAll();
		$data['kullanici'] = $model2->where('ogrencino', session()->get('ogrencino'))->first();

                if (session()->get('yonetici') == true ){
                        echo view('templates/headeradmin', $data);
                } else {
                        echo view('templates/headerogrenci', $data);
                }
                echo view('dersdurum', $data);
                echo view('templates/footer', $data);
	}
	public function transkriptpdf(){
		$data=[];
		$model = new NotModeli();
		$model2 = new KullaniciModeli();
		$data['notlar'] = $model->where('ogrencino', session()->get('ogrencino'))->findAll();
		$data['kullanici'] = $model2->where('ogrencino', session()->get('ogrencino'))->first();
		$dompdf = new \Dompdf\Dompdf(); 
		$dompdf->setPaper('A4', 'landscape');
	        $dompdf->loadHtml(view('dersdurum', $data));
		$dompdf->render();
		$dompdf->stream('transkript_'.session()->get('ogrencino')."_".date('Ymd').'.pdf'); 
	}
	public function transkriptcsv(){

		$data = [];
		$model = new KullaniciModeli();
		$model2 = new NotModeli();
	
		$dosyaadi = 'transkript_'.session()->get('ogrencino')."_".date('Ymd').'.csv'; 
		header("Content-Type: text/csv; ");
		header("Content-Disposition: attachment;filename=$dosyaadi"); 

		$dosya = fopen('php://output', 'w');
                $yeniveri = array (
			array('isim' => session()->get('isim'),
                              'soyisim' => session()->get('soyisim'),
                              'kimlikno' => session()->get('kimlikno'),
                              'dogumyili' => session()->get('dogumyili'),
                              'email' => session()->get('email'),
                              'ogrencino' => session()->get('ogrencino'),
			)
		);
		$data['notlar'] = $model2->where('ogrencino', session()->get('ogrencino'))->findAll();
		$header = array("isim","soyisim","kimlikno","dogumyili","email","ogrencino"); 
		$header2 = array("dersid","dersadi","ogrencino","not"); 
		ob_start();
		fputcsv($dosya, $header);
		foreach ($yeniveri as $kullanici){ 
			fputcsv($dosya, $kullanici);
		}
		fputcsv($dosya, $header2);
		foreach ($data['notlar'] as $kullanici){ 
			fputcsv($dosya, $kullanici);
		}
		fclose($dosya);
		return ob_get_clean();
	}

       public function cikis(){
		session()->destroy();
		return redirect()->to('/');
	}

}
