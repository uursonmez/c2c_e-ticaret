
<?php if ($toplam_icerik >= $sayfada) {?>
  <div class="product-pagination">
    <div class="theme-paggination-block">
      <div class="row">
        <div class="col-xl-9 col-md-9 col-sm-12">
          <nav aria-label="Page navigation">

            <ul class="pagination">
              <?php if ($sayfa!=1 and $sayfa!=0 ) {?>
                <li class="page-item"><a class="page-link" href="<?php if (strpos($x, 'sayfa')) { $query_arr["sayfa"] =$sayfa-1; $query = http_build_query($query_arr); echo  $_SERVER['SCRIPT_NAME']."?".$query; } else if (empty($query_arr)) { echo $tam_url."?sayfa=".$sayfa-1; } else{echo $tam_url."&sayfa=".$sayfa-1;} ?>" aria-label="Previous"><span aria-hidden="true"><i class="fa fa-chevron-left" aria-hidden="true"></i></span> <span class="sr-only">Previous</span></a></li>

              <?php }

              $kisaltma=3;

                if ($sayfa==1) {?>
                  <li class="page-item active"><a class="page-link" ><?php echo "1"; ?></a></li>
                <?php } else {?>
                  <li class="page-item"><a class="page-link" href="<?php if (strpos($x, 'sayfa')) { $query_arr["sayfa"] =1; $query = http_build_query($query_arr); echo  $_SERVER['SCRIPT_NAME']."?".$query; } else if (empty($query_arr)) { echo $tam_url."?sayfa=1"; } else{echo $tam_url."&sayfa=1";} ?>"><?php echo "1"; ?></a></li>
                <?php   }

                  if($sayfa-$kisaltma > 2){ ?>
                      <li class="page-item active"><a class="page-link" ><?php echo "..."; ?></a></li>
                      <?php
                     $i = $sayfa-$kisaltma;
                   }else {
                     $i = 2;
                   }
                 ?>

             <?php for($i; $i<=$sayfa+$kisaltma; $i++) {

                if ($i==$sayfa) {?>
                  <li class="page-item active"><a class="page-link" ><?php echo $i; ?></a></li>
                <?php } else {?>
                  <li class="page-item"><a class="page-link" href="<?php if (strpos($x, 'sayfa')) { $query_arr["sayfa"] =$i; $query = http_build_query($query_arr); echo  $_SERVER['SCRIPT_NAME']."?".$query; } else if (empty($query_arr)) { echo $tam_url."?sayfa=$i"; } else{echo $tam_url."&sayfa=$i";} ?>"><?php echo $i; ?></a></li>
                <?php   } if($i==$toplam_sayfa) break;
              }
              if($sayfa+$kisaltma < $toplam_sayfa-1) {?>
              <li class="page-item active"><a class="page-link" ><?php echo "..."; ?></a></li>
                <li class="page-item"><a class="page-link" href="<?php if (strpos($x, 'sayfa')) { $query_arr["sayfa"] =$toplam_sayfa; $query = http_build_query($query_arr); echo  $_SERVER['SCRIPT_NAME']."?".$query; } else if (empty($query_arr)) { echo $tam_url."?sayfa=$toplam_sayfa"; } else{echo $tam_url."&sayfa=$toplam_sayfa";} ?>"><?php echo $toplam_sayfa; ?></a></li>
             <?php  } else if($sayfa+$kisaltma == $toplam_sayfa-1) { ?>
                <li class="page-item"><a class="page-link" href="<?php if (strpos($x, 'sayfa')) { $query_arr["sayfa"] =$toplam_sayfa; $query = http_build_query($query_arr); echo  $_SERVER['SCRIPT_NAME']."?".$query; } else if (empty($query_arr)) { echo $tam_url."?sayfa=$toplam_sayfa"; } else{echo $tam_url."&sayfa=$toplam_sayfa";} ?>"><?php echo $toplam_sayfa; ?></a></li>
                    <?php  }
              if ($sayfa!=$toplam_sayfa) {?>
               <li class="page-item"><a class="page-link" href="<?php if (strpos($x, 'sayfa')) { $query_arr["sayfa"] =$sayfa+1; $query = http_build_query($query_arr); echo  $_SERVER['SCRIPT_NAME']."?".$query; } else if (empty($query_arr)) { echo $tam_url."?sayfa=".($sayfa+1) ; } else{echo $tam_url."&sayfa=".($sayfa+1) ;} ?>" aria-label="Previous"><span aria-hidden="true"><i class="fa fa-chevron-right" aria-hidden="true"></i></span> <span class="sr-only">Next</span></a></li>
             <?php  }

             ?>


           </ul>
         </nav>
       </div>
       <?php } ?>
       <div class="col-xl-3 col-md-3 col-sm-12">
        <div class="product-search-count-bottom">
          <h5><?php if (isset($_GET['pagingSize'])) {
            echo $_GET['pagingSize']." ilan listeleniyor";

          } else if(empty($_GET['pagingSize']) and ($toplam_icerik >= $sayfada) ) {echo "1-25"."ilan listeleniyor";} ?> </h5></div>
        </div>

      </div>
    </div>
    </div>
    <div class="col-12" align="center">
          <h5>
        <?php  if($toplam_icerik <= $sayfada and $toplam_icerik >0 ){ echo "Aramanıza uygun tüm ilanlar listeleniyor";}  ?></h5></div>
  </div>
