<div class="container">
<div class="row">
  <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
   <div class="container">
<div class="mt-3">
<div class="form-group">
  <label lang="tr" for="isim">Adı</label>
   <input type="text" class="form-control" readonly name="isim" id="isim" value="<?php echo $kullanici['isim']; ?>">
   </div>
<div class="form-group">
  <label lang="tr" for="soyisim">Soyadı</label>
   <input type="text" class="form-control" readonly name="soyisim" id="soyisim" value="<?php echo $kullanici['soyisim']; ?>">
   </div>
<div class="form-group">
  <label lang="tr" for="kimlikno">TC Kimlik No</label>
   <input type="text" class="form-control" readonly name="kimlikno" id="kimlikno" value="<?php echo $kullanici['kimlikno']; ?>">
   </div>
<div class="form-group">
  <label lang="tr" for="email">Email</label>
   <input type="text" class="form-control" readonly name="email" id="email" value="<?php echo $kullanici['email']; ?>">
   </div>
<div class="form-group">
  <label lang="tr" for="dogumyili">Doğum Yılı</label>
   <input type="text" class="form-control" readonly name="dogumyili" id="dogumyili" value="<?php echo $kullanici['dogumyili']; ?>">
   </div>
<div class="form-group">
  <label lang="tr" for="ogrencino">Öğrenci No</label>
   <input type="text" class="form-control" readonly name="ogrencino" id="ogrencino" value="<?php echo $kullanici['ogrencino']; ?>">
  </div>
     <table class="table table-bordered" id="dersdurum">
     <?php if(!empty($notlar)): ?>
       <thead>
          <tr>
             <th>Ders Adı</th>
             <th>Not</th>
          </tr>
       </thead>
       <?php endif; ?>
       <tbody>
	<?php if(!empty($notlar)): ?>
          <?php foreach($notlar as $dersnotu): ?>
          <tr>
             <td><?php echo $dersnotu['dersadi']; ?></td>
             <td><?php echo $dersnotu['not']; ?></td>
          </tr>
	 <?php endforeach; ?>
	 <?php else: ?>
	 <div class="alert alert-danger" role="alert">
	  Henüz kayıtlı not bulunmamaktadır
	</div>
	<?php endif; ?>
       </tbody>
     </table>
     <div class="row">
      <div class="col-12 col-sm-1 mt-1">
       <a type="submit" class="btn btn-primary" href="/transkriptpdf">PDF</a>
      </div>
      <div class="col-12 col-sm-1 mt-1">
       <a type="submit" class="btn btn-primary" href="/transkriptcsv">CSV</a>
      </div>
     </div>
  </div>
</div>
</div>
</div>
</div>
</div>
