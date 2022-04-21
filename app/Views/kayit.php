<div class="container">
  <div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
      <div class="container">
        <h3>Öğrenci Kayıt</h3>
        <hr>
        <form class="" action="/kayit" method="get">
          <div class="row">
            <div class="col-12 col-sm-6">
              <div class="form-group">
               <label for="isim">İsim</label>
               <input type="text" class="form-control" name="isim" id="isim" value="<?= set_value('isim') ?>">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <div class="form-group">
               <label for="soyisim">Soyisim</label>
               <input type="text" class="form-control" name="soyisim" id="soyisim" value="<?= set_value('soyisim') ?>">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <div class="form-group">
               <label for="kimlikno">TC Kimlik No</label>
               <input type="text" class="form-control" name="kimlikno" id="kimlikno" value="<?= set_value('kimlikno') ?>">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <div class="form-group">
               <label for="ogrencino">Doğum Yılı</label>
               <input type="text" class="form-control" name="dogumyili" id="dogumyili" value="<?= set_value('dogumyili') ?>">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
               <label for="ogrencino">Öğrenci No</label>
               <input type="text" class="form-control" name="ogrencino" id="ogrencino" value="<?= set_value('ogrencino') ?>">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
               <label for="email">Email adresi</label>
               <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email') ?>">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
               <label for="sifre">Şifre</label>
               <input type="password" class="form-control" name="sifre" id="sifre" value="">
             </div>
           </div>
           <div class="col-12">
             <div class="form-group">
              <label for="sifredogrula">Şifre Doğrulama</label>
              <input type="password" class="form-control" name="sifredogrula" id="sifredogrula" value="">
            </div>
          </div>
	  <?php if (isset($validation)): ?>
            <div class="col-12">
              <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors() ?>
              </div>
            </div>
	  <?php endif; ?>
	  </div>
	  <div class="row">
            <div class="col-12 col-sm-4 mt-1">
              <button type="submit" class="btn btn-primary">Kaydet</button>
            </div>
         </div>
	</form>
      </div>
    </div>
  </div>
</div>
