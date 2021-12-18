
<?php
include 'header.php';

//echo $_GET['sef'];

//Belirli veriyi seçme işlemi
$menusor=$db-> prepare("SELECT * FROM menu where menu_id=:id");
$menusor->execute(array(
  'id' => 0
));
$menucek=$menusor ->fetch(PDO::FETCH_ASSOC);


?>



<!-- about section start -->
<section class="about-page section-big-py-space">
    <div class="custom-container">
        <div class="row">
            <div class="col-lg-6">
                <div class="banner-section"><img src="assets/images/blog/1.jpg" class="img-fluid   w-100" alt=""></div>
            </div>
            <div class="col-lg-6">
                <h4><?php echo $menucek['menu_baslik']; ?></h4>
                <p class="mb-2"> <?php echo $menucek['menu_icerik']; ?></p>
                <p class="mb-2"><?php echo $menucek['menu_vizyon']; ?></p>
                <p class="mb-2"> <?php echo $menucek['menu_misyon']; ?></p>

            </div>
        </div>
    </div>
</section>
<!-- about section end -->







<?php
include 'footer.php' ?>
