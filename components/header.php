<!-- Swiper -->
<div class="container-xl ">
    <div id="home_image_row" class="row" style="margin: 10rem 0;">
        <div id="home_image_slide" class="col-6 col-8 col-12">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php
                    $sqlImg = "SELECT image_link, image_name FROM image_slider ORDER BY id";
                    $resultImg = mysqli_query($conn, $sqlImg);
                    while ($imgRow = mysqli_fetch_assoc($resultImg)) {
                        echo '
                            <div class="swiper-slide"><img class="home-img" src="'.$imgRow['image_link'].'" height="250" alt="'.$imgRow['image_name'].'"></div>
                        ';
                    }
                    ?>
                </div>
                <!-- Add Pagination -->
                <!--        <div class="swiper-pagination"></div>-->
                <!-- Add Arrows -->
                <!--        <div class="swiper-button-next"></div>-->
                <!--        <div class="swiper-button-prev"></div>-->
            </div>
        </div>
        <div id="home_image_text" class="col-6 col-8 col-12 my-auto">
            <blockquote class="blockquote text-center">
                <h5 class="text-capitalize mb-2 text-black-100">" inspired by west african iconography "</h5>
                <footer class="blockquote-footer text-uppercase"><cite class="small" title="Source Title">kelechinwaneri</cite></footer>
            </blockquote>
        </div>
    </div>

</div>