<!--header start-->
   <?php include 'header.php';
   checkLogin();
   $urunsor=$db-> prepare("SELECT * FROM urun where urun_id=:id");
   $urunsor->execute(array(
     'id' => $_GET['urun_id']
   ));

   $uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);


   ?>
<!--header end-->


 <!--section start-->
 <section class="contact-page section-big-py-space bg-light">
   <div class="custom-container">
     <div class="row section-big-pb-space">
       <div class="col-xl-12 offset-xl-12">
         <h3 class="text-center mb-3">İlan Ekleme</h3>
         <form action="admin/adminislem/islem.php" class="theme-form"  method="POST" enctype="multipart/form-data" >
           <div class="form-group">
             <div class="col-md-12">
              <div class="form-group">
                <label for="name">Kitap Adı *</label>
                <input type="text" class="form-control" name="urun_ad" required="">
              </div>
            </div>
              <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">
            <div class="col-md-12">
             <div>
               <label for="review">Açıklama *</label> <br>
              <textarea  class="ckeditor" id="editor1" name="urun_detay"></textarea>


             </div>
           </div>

      <?php

            $urun_id=$uruncek['kategori_id'];

            $kategorisor=$db->prepare("select * from kategori where kategori_ust=:kategori_ust order by kategori_sira");
            $kategorisor->execute(array(
            'kategori_ust' => 0
            ));
           ?>

             <div  id="list-v_trimdetail">
               <div class="col-sm-4">
                   <label for="name">Kitap Kategori</label>

                   <select id="heard" class="form-control" name="kategori_id" required>





                     <?php


                     while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) {

                       $kategori_id=$kategoricek['kategori_id'];

                       ?>

                       <option <?php if ($kategori_id==$urun_id) { echo "selected='select'"; } ?> value="<?php echo $kategoricek['kategori_id']; ?>"><?php echo $kategoricek['kategori_ad']; ?></option>

                   <?php } ?>


                   </select>
               </div>
             </div>
             <br>




          <div class="col-sm-4">
            <div class="form-group">
              <label for="name">Kitap Sayfa Sayısı *</label>
              <input type="text" class="form-control" name="urun_sayfasi" required="" placeholder="Sayfa sayısı giriniz">
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label for="name">Kitap Baskı Yılı *</label>
              <input type="text" class="form-control" name="urun_baski" required="" placeholder="Baskı yılı giriniz">
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label for="name">Anahtar Kelimeler*</label>
              <h5>Anahtar kelimeler Kitabın aramalarda daha kolay çıkmasını sağlar</h5>
              <input type="text" class="form-control" name="urun_keyword" required="" placeholder="Anahtar kelimeleri giriniz">
            </div>
          </div>


          <div class="col-sm-4">
            <div class="form-group">
              <label for="name">Fiyat *</label>
              <input type="text" class="form-control" name="urun_fiyat" required="" placeholder="Fiyat giriniz">
            </div>
          </div>

          <div class="row section-big-pb-space">

</div>
<div class="col-xl-12 offset-xl-12">
  <h4 style="color: black;" class="text-left mb-3">Adres Bilgileri *</h4>
  <div class="form-row">



   <div class="col-sm-4">
     <div class="form-group">
      <?php
      $sql = "SELECT * FROM cities ORDER BY city_name ASC";
      $sql_prepare = $db -> prepare($sql);
      $result = $db -> query($sql);
      ?>

      <label for="email">Şehir</label>
      <select class="form-control" data-live-search="true" name="city" id="city" required>
        <option value="">Şehir seçiniz...</option>
        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
          <option value="<?=$row['city_key']?>" data-tokens="<?=$row['city_name']?>"><?=$row['city_name']?></option>
          <?php echo "\n"; } ?>
        </select>
      </div>
    </div>

    <div class="col-sm-4">
     <div class="form-group">
      <label for="email">İlçe</label>
      <select class="form-control" data-live-search="true" name="district" id="district" required>
      </select>

    </div>
  </div>

  <div class="col-sm-4">
   <div class="form-group">
    <label for="email">Mahalle</label>
    <select class="form-control" data-live-search="true" name="neighborhood" id="neighborhood" required>
    </select>
  </div>
</div>

</div>

</div>

              <div class="col-sm-4">
                <div class="form-group">
                 <label for="name">Fotoğraf *</label>

                 <input type="FILE" class="form-control" name="urun_image" required=""    >
               </div>
             </div>

             <div  class="col-md-12" align="right">
               <b>   <label><input class="mr-2"  required="" type="radio" name="accept"> İlan verme kurallarını kabul ediyorum</label> </b>

                 <button class="btn btn-normal" type="submit" name="ilankaydet">Onaya Gönder</button>

               </div>



        </div>
      </div>
     </div>

 </div>
 </div>
 </section>
 </form>

 <!--Section ends-->

 <!--footer start-->
 <?php include 'footer.php';
  ?>
   <!--footer end-->

   <!--ck editör script-->
   <script type="text/javascript">

   CKEDITOR.replace( 'editor1',

    {

   filebrowserBrowseUrl : 'ckfinder/ckfinder.html',

   filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',

   filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',

   filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

   filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

   filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

    forcePasteAsPlainText: true

   }

    );

   </script>

   <script type="text/javascript">

document.getElementById("district").disabled = true;
document.getElementById("neighborhood").disabled = true;

$(document).ready(function(){

  $("#city").change(function(){
    var city_id  = $(this).val();
    $.ajax({
      type: "POST",
      url: "adress_ajax.php",
      data: {city_key:city_id},
      datatype: "text",
      success:function(data){
        document.getElementById("district").disabled = false;
        $("#district").html(data);
      }
    })
  })

  $("#district").change(function(){
    var district_id  = $(this).val();
    $.ajax({
      type: "POST",
      url: "adress_ajax.php",
      data: {district_key:district_id},
      datatype: "text",
      success:function(data){
        document.getElementById("neighborhood").disabled = false;
        $("#neighborhood").html(data);
      }
    })
  })

})
   </script>
   <!--ck editör script bitiş-->
