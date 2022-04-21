<div class="mt-3">
     <table class="table table-bordered" id="ogrencilistesi">
     <?php if(!empty($kullanicilar)): ?>
       <thead>
          <tr>
             <th>İsim</th>
             <th>Soyisim</th>
             <th>Email</th>
             <th>Öğrenci No</th>
             <th>TC Kimlik No</th>
          </tr>
       </thead>
       <?php endif; ?>
       <tbody>
          <?php if(!empty($kullanicilar)): ?>
          <?php foreach($kullanicilar as $kullanici): ?>
          <tr>
             <td><?php echo $kullanici['isim']; ?></td>
             <td><?php echo $kullanici['soyisim']; ?></td>
             <td><?php echo $kullanici['email']; ?></td>
             <td><?php echo $kullanici['ogrencino']; ?></td>
             <td><?php echo $kullanici['kimlikno']; ?></td>
          </tr>
         <?php endforeach; ?>
              <?php else: ?>
                <h1>"Henüz kayıtlı öğrenci bulunmamaktadır"</h1>
         <?php endif; ?>
       </tbody>
     </table>
  </div>
</div>
