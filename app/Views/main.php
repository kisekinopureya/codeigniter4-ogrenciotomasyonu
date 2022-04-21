<div class="container">
 <div class="row">
  <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
   <div class="container">
    <h3>Giriş</h3>
    <hr>
    <?php if (session()->get('success')): ?>
     <div class="alert alert-success" role="alert">
      <?= session()->get('success') ?>
     </div>
    <?php endif; ?>
    <form class="" action="/" method="post">
     <div class="form-group">
      <label for="ogrencino">Öğrenci No</label>
      <input type="text" class="form-control" name="ogrencino" id="ogrencino" value="<?= set_value('ogrencino') ?>">
     </div> 
     <div class="form-group">
      <label for="sifre">Şifre</label>
      <input type="password" class="form-control" name="sifre" id="sifre" value="">
     </div>
     <?php if (isset($validation)): ?>
      <div class="col-12">
       <div class="alert alert-danger" role="alert">
        <?= $validation->listErrors() ?>
       </div>
      </div>
     <?php endif; ?>
     <div class="row">
      <div class="col-12 col-sm-4 mt-1">
       <button type="submit" class="btn btn-primary">Giriş</button>
      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
</div>
