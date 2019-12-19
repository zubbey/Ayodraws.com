<!-- <div id="quarto">-->
<!-- <img src="assets/images/logo-quarto.png">-->
<!-- </div>-->
    <main class="ms-container home-slider">
        <!-- Swiper Slider -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <!-- Slide -->
                <?php
                $sqlImg = "SELECT image_link, image_name FROM image_slider ORDER BY id";
                $resultImg = mysqli_query($conn, $sqlImg);
                while ($imgRow = mysqli_fetch_assoc($resultImg)) {
                    echo "<div class=\"swiper-slide\">
                          <div class=\"slide-inner\" data-swiper-parallax=\"45%\">
                            <div class=\"overlay\"></div>
                            <div class=\"slide-inner--image\" style=\"background-image: url('".$imgRow['image_link']."')\"></div>
                            <div class=\"slide-inner--info\">
                              <h1>".$imgRow['image_name']."</h1>
                              <a href=\"gallery\" data-type=\"page-transition\" class=\"ms-btn--slider\" style=\"color: #FFF;\">Look up</a>
                            </div>
                          </div>
                        </div>";
                }
                mysqli_close($conn);
                ?>
            </div>
            <div class="swiper-nav-btn">
                <div class="swiper-button-prev swiper-button-white">Prev</div>
                <div class="swiper-button-next swiper-button-white">Next</div>
            </div>
            <!-- Pagination -->
            <div class="expanded-timeline">
                <div class="expanded-timeline__counter"><span></span><span></span></div>
                <div class="swiper-pagination"></div>
                <div class="scroll-message">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16.5 15.98" class="scroll-svg"><title>Asset 1</title><g>
                            <g data-name="Layer 1"><polygon fill="#fff" points="0 4.64 0.71 5.34 3.85 2.2 3.85 15.98 4.85 15.98 4.85 2.2 8 5.34 8.71 4.64 4.35 0.29 0 4.64"></polygon><polygon fill="#fff" points="11.65 0 11.65 13.79 8.5 10.64 7.79 11.35 12.15 15.7 16.5 11.35 15.79 10.64 12.65 13.79 12.65 0 11.65 0"></polygon></g></g></svg>Scroll
                </div>
            </div>
        </div>
    </main>
    <!-- /Container -->