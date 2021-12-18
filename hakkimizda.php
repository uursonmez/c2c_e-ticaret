<?php
include 'header.php';

//Belirli veriyi seçme işlemi
$hakkimizdasor=$db-> prepare("SELECT * FROM hakkimizda where hakkimizda_id=:id");
$hakkimizdasor->execute(array(
  'id' => 0
));
$hakkimizdacek=$hakkimizdasor ->fetch(PDO::FETCH_ASSOC);


?>


<!-- about section start -->
<section class="about-page section-big-py-space">
    <div class="custom-container">
        <div class="row">
            <div class="col-lg-6">
                <div class="banner-section"><img src="images/hakkimizdaa.png" class="img-fluid   w-100" alt=""></div>
            </div>
            <div class="col-lg-6">
                <h4><?php echo $hakkimizdacek['hakkimizda_baslik']; ?></h4>
                <p class="mb-2"> <?php echo $hakkimizdacek['hakkimizda_icerik']; ?></p>
                <p class="mb-2"><?php echo $hakkimizdacek['hakkimizda_vizyon']; ?></p>
                <p class="mb-2"> <?php echo $hakkimizdacek['hakkimizda_misyon']; ?></p>

            </div>
        </div>
    </div>
</section>
<!-- about section end -->







<?php
include 'footer.php' ?>
