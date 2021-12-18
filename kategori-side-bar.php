<!-- side-bar colleps block stat -->
                    <div class="collection-filter-block creative-card creative-inner category-side">
                        <!-- brand filter start -->
                        <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> back</span></div>
                        <div class="collection-collapse-block open">
                            <h3 class="collapse-block-title mt-0">KATEGORİ</h3>
                            <div class="collection-collapse-block-content">
                                <div class="collection-brand-filter">
                                    <br>

                                    <?php
                                    $kategorisor=$db->prepare("SELECT * FROM kategori order by kategori_sira ASC");
                                    $kategorisor->execute();
                                    ?>

                                    <?php while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { $say++?>

                                    <div class="subscrib-block">
                                        <b><a href="kategori.php?kategori_id=<?php echo $kategoricek['kategori_id'] ?>"><label  style="color: #6e6867;" class="yazi" for="zara"><?php echo $kategoricek['kategori_ad'] ?></label></a></b>
                                    </div>

                                   <?php } ?>


                                </div>
                            </div>
                        </div>



                    </div>
                    <!-- silde-bar end -->
