<?php
// AUTH CONTROLLER FOR BACKEND
require_once ('./controller/authController.php');
//components
require('./components/menu-light.php');
?>

<main class="ms-container">
    <!-- Page Title -->
    <div class="ms-section__block">
        <div class="ms-page-title">
            <h2 class="page-header">Shows</h2>
            <p class="page-desc">Progressively create resource maximizing convergence and functional alignments. </p>
        </div>
    </div>
    <!-- Page Content -->
    <div class="ms-section__block">
        <div id="blog">
            <ul class="filtr-btn">
                <li onclick="categoryDesc('all')" data-filter="all" class="active"><h6>All Shows</h6></li>
                <li onclick="categoryDesc(1)" data-filter="1"><h6>Upcoming Shows</h6></li>
                <li onclick="categoryDesc(2)" data-filter="2"><h6>Previous shows</h6></li>
            </ul>
            <!-- Post Item -->
            <div class="filtr-container row">

                <div class="post-item col-lg-6 col-md-12 filtr-item mb-3" data-category="1">
                    <a href="shows-details" data-type="page-transition">
                        <div class="post-item__img">
                            <img src="assets/images/shows1.jpg" alt="img">
                        </div>
                        <div class="post-item__info">
                            <h5 class="post-item__title">2020 - Krisitin Hjellegjerde Gallery, “ALL THE DAYS AND NIGHTS”, Old York Road, London, Britain.</h5>
                            <div class="post-item__date">February 27th - 18th April</div>
                            <div class="post-item__link">read more</div>
                        </div>
                    </a>
                </div>
                <!-- Post Item -->
                <div class="post-item col-lg-6 col-md-12 filtr-item mb-3" data-category="2">
                    <a href="#" data-type="page-transition">
                        <div class="post-item__img">
                            <img src="assets/images/shows2.jpg" alt="img">
                        </div>
                        <div class="post-item__info">
                            <h5 class="post-item__title">2019 - SMO Contemporary Art Gallery “STASIS”, Temple Muse, Victoria Island Lagos, Nigeria.</h5>
                            <div class="post-item__date">2019</div>
                            <div class="post-item__link">read more</div>
                        </div>
                    </a>
                </div>
                <!-- Post Item -->
                <div class="post-item col-lg-6 col-md-12 filtr-item" data-category="2">
                    <a href="#" data-type="page-transition">
                        <div class="post-item__img">
                            <img src="assets/images/shows3.jpg" alt="img">
                        </div>
                        <div class="post-item__info">
                            <h5 class="post-item__title">2019 - ODA gallery, ‘SECRET GARDEN’, Fransccheok, Western Cape, South Africa.</h5>
                            <div class="post-item__date">2019</div>
                            <div class="post-item__link">read more</div>
                        </div>
                    </a>
                </div>
                <!-- Post Item -->
                <div class="post-item col-lg-6 col-md-12 filtr-item" data-category="2">
                    <a href="#" data-type="page-transition">
                        <div class="post-item__img">
                            <img src="assets/images/shows4.jpg" alt="img">
                        </div>
                        <div class="post-item__info">
                            <h5 class="post-item__title">2019 - ODA gallery, ‘African Symbolism and Abstraction’, Fransccheok, Western Cape, South Africa.</h5>
                            <div class="post-item__date">2019</div>
                            <div class="post-item__link">read more</div>
                        </div>
                    </a>
                </div>

                <div class="post-item col-lg-6 col-md-12 filtr-item" data-category="2">
                    <a href="#" data-type="page-transition">
                        <div class="post-item__img">
                            <img src="assets/images/shows5.jpg" alt="img">
                        </div>
                        <div class="post-item__info">
                            <h5 class="post-item__title">2018 - Thought Pyramids Gallery “Spanish Festivals and traditional celebrations” Maitama, Abuja, Nigeria</h5>
                            <div class="post-item__date">2019</div>
                            <div class="post-item__link">read more</div>
                        </div>
                    </a>
                </div>

                <div class="post-item col-lg-6 col-md-12 filtr-item" data-category="2">
                    <a href="#" data-type="page-transition">
                        <div class="post-item__img">
                            <img src="assets/images/shows7.jpg" alt="img">
                        </div>
                        <div class="post-item__info">
                            <h5 class="post-item__title">2016- National Festival for Art and Culture (NAFEST) “Exploring the Goldmine Inherent in Nigerian Creative Industries. Ibom hall, Uyo.</h5>
                            <div class="post-item__date">2019</div>
                            <div class="post-item__link">read more</div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
<!--    <div class="ms-section__block center-block">-->
<!--        <a href="#" class="ms-button" data-title="load more" data-type="page-transition">load more</a>-->
<!--    </div>-->
</main>

<?php
require ('./components/footer-light.php');
?>
