<?php

namespace App\Validation;
use App\Models\KullaniciModeli;

class Kurallar
{

	public function kimlikkontrol(string $str, string $fields, array $data): bool
	{
	        $sorgu = array(
       	         'TCKimlikNo' => $data['kimlikno'],
       	         'Ad' => $data['isim'],
       	         'Soyad' => $data['soyisim'],
       	         'DogumYili' => $data['dogumyili']
       	 );
        $baglan = new \SoapClient('https://tckimlik.nvi.gov.tr/Service/KPSPublic.asmx?WSDL');
        $sonuc = $baglan -> TCKimlikNoDogrula ($sorgu);
        if ($sonuc->TCKimlikNoDogrulaResult) {
                return true;
        } else {
                return false;
        	}
	}

	public function kullanicidogrula(string $str, string $fields, array $data) {
   	 $model = new KullaniciModeli();
	 $kullanici = $model->where('ogrencino', $data['ogrencino'])
		 	->first();

    	 if(!$kullanici)
	 	return false;
         return password_verify($data['sifre'], $kullanici['sifre']);
  	}
}
