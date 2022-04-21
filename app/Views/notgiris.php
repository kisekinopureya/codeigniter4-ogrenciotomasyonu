<div class="container">
  <div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
      <div class="container">
        <h3>Not Girişi</h3>
        <hr>
        <form class="" action="/notgiris" method="get">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
               <label for="isim">Ders Adı</label>
               <input type="text" class="form-control" name="dersadi" id="dersadi" value="<?= set_value('dersadi') ?>">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <div class="form-group">
               <label for="soyisim">Öğrenci No</label>
               <input type="text" class="form-control" name="ogrencino" id="ogrencino" value="<?= set_value('ogrencino') ?>">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <div class="form-group">
               <label for="kimlikno">Not</label>
               <input type="text" class="form-control" name="not" id="not" value="<?= set_value('not') ?>">
              </div>
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

<script>
$('#notgiris').submit('click',function(){
		var dersadi = $('#dersadi').val();
		var ogrencino = $('#ogrencino').val();
		var not = $('#not').val();
		$.ajax({
			type : "POST",
			//url  : "emp/save",
			dataType : "JSON",
			data : {dersadi:dersadi, ogrencino:ogrencino, not:not},
			success: function(data){
				$('#dersadi').val("");
				$('#ogrencino').val("");
				$('#not').val("");
			}
		});
		return false;
	});
</script>
