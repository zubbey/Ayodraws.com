<?php
// AUTH CONTROLLER FOR BACKEND
require_once ('./controller/authController.php');
//components
require('./components/menu.php');
$page_id = 3;
$visitor_ip = $_SERVER['REMOTE_ADDR']; // stores IP address of visitor in variable
add_view($conn, $visitor_ip, $page_id);
?>

<main class="ms-container">
    <!-- Page Title -->
    <div class="ms-section__block">
        <div class="ms-page-title">
            <h2 class="page-header"></h2>
            <p class="page-desc"></p>
        </div>
    </div>
    <!-- Page Content -->
    <div class="ms-section__block">
        <div id="blog">
            <ul class="filtr-btn">
                <!--                <li onclick="categoryDesc('all')" data-filter="all" ><h6>All Shows</h6></li>-->
                <li onclick="categoryDesc(1)" data-filter="1" id="upcoming" class="active"><h6>Upcoming Exhibitions</h6></li>
                <li onclick="categoryDesc(2)" data-filter="2"><h6>Previous Exhibitions</h6></li>
            </ul>
            <!-- Post Item -->
            <div class="filtr-container row">

                <div class="post-item col-lg-6 col-md-12 filtr-item p-0 mb-3" data-category="1">
                    <a onclick="comingSoon('assets/images/shows8.jpg', '2020 - Krisitin Hjellegjerde Gallery, “ALL THE DAYS AND NIGHTS”, Old York Road, London, Britain.')">
                        <!--                        <div class="post-item__img">-->
                        <!--                            <img src="assets/images/shows8.jpg" alt="img">-->
                        <!--                        </div>-->
                        <div class="post-item__info m-0">
                            <h5 class="post-item__title">2020 - Krisitin Hjellegjerde Gallery, “ALL THE DAYS AND NIGHTS”, Old York Road, London, Britain.</h5>
                            <div class="post-item__date">February 27th - 18th April</div>
                            <!--                            <div class="post-item__link">read more</div>-->
                        </div>
                    </a>
                </div>
                <!-- Post Item -->
                <div class="post-item col-lg-6 col-md-12 filtr-item p-0 mb-3" data-category="2">
                    <a href="#" data-type="page-transition">
                        <!--                        <div class="post-item__img">-->
                        <!--                            <img src="assets/images/shows1.jpg" alt="img">-->
                        <!--                        </div>-->
                        <div class="post-item__info m-0">
                            <h5 class="post-item__title">2019 - SMO Contemporary Art Gallery “STASIS”, Temple Muse, Victoria Island Lagos, Nigeria.</h5>
                            <div class="post-item__date">2019</div>
                        </div>
                    </a>
                </div>
                <!-- Post Item -->
                <div class="post-item col-lg-6 col-md-12 filtr-item p-0" data-category="2">
                    <a href="#" data-type="page-transition">
                        <!--                        <div class="post-item__img">-->
                        <!--                            <img src="assets/images/shows3.jpg" alt="img">-->
                        <!--                        </div>-->
                        <div class="post-item__info m-0">
                            <h5 class="post-item__title">2019 - ODA gallery, ‘SECRET GARDEN’, Fransccheok, Western Cape, South Africa.</h5>
                            <div class="post-item__date">2019</div>
                        </div>
                    </a>
                </div>
                <!-- Post Item -->
                <div class="post-item col-lg-6 col-md-12 filtr-item p-0" data-category="2">
                    <a href="#" data-type="page-transition">
                        <!--                        <div class="post-item__img">-->
                        <!--                            <img src="assets/images/shows4.jpg" alt="img">-->
                        <!--                        </div>-->
                        <div class="post-item__info m-0">
                            <h5 class="post-item__title">2019 - ODA gallery, ‘African Symbolism and Abstraction’, Fransccheok, Western Cape, South Africa.</h5>
                            <div class="post-item__date">2019</div>
                        </div>
                    </a>
                </div>

                <div class="post-item col-lg-6 col-md-12 filtr-item p-0" data-category="2">
                    <a href="#" data-type="page-transition">
                        <!--                        <div class="post-item__img">-->
                        <!--                            <img src="assets/images/shows5.jpg" alt="img">-->
                        <!--                        </div>-->
                        <div class="post-item__info m-0">
                            <h5 class="post-item__title">2018 - Thought Pyramids Gallery “Spanish Festivals and traditional celebrations” Maitama, Abuja, Nigeria</h5>
                            <div class="post-item__date">2018</div>
                        </div>
                    </a>
                </div>

                <div class="post-item col-lg-6 col-md-12 filtr-item p-0" data-category="2">
                    <a href="#" data-type="page-transition">
                        <!--                        <div class="post-item__img">-->
                        <!--                            <img src="assets/images/shows7.jpg" alt="img">-->
                        <!--                        </div>-->
                        <div class="post-item__info m-0">
                            <h5 class="post-item__title">2016- National Festival for Art and Culture (NAFEST) “Exploring the Goldmine Inherent in Nigerian Creative Industries. Ibom hall, Uyo.</h5>
                            <div class="post-item__date">2016</div>
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
require ('./components/footer.php');
?>

<script>
    let category_Desc = document.querySelector("p.page-desc");
    let category_Heading = document.querySelector("h2.page-header");
    let all = document.querySelector(".filtr-btn > li");
    let d = new Date();
    let current_year = d.getFullYear();
    // document.write(new Date().getFullYear())
    if($('.filtr-btn > li').hasClass('active')){
        // $('.filtr-btn > li .active')[0].click();
        clickActive();
    }
    function clickActive() {
        $('#upcoming')[0].click();
    }
    function categoryDesc(x) {
        if (x === 1){
            category_Desc.innerHTML = "2020 - Krisitin Hjellegjerde Gallery, “ALL THE DAYS AND NIGHTS”, Old York Road, London, Britain.";
            category_Heading.innerHTML = "Upcoming Exhibitions";
        } else if (x === 2){
            category_Desc.innerHTML = "My previous Exhibitions from 2000 to " + current_year;
            category_Heading.innerHTML = "Previous Exhibitions";
        }
    }

    function comingSoon(image, text) {
        Swal.fire({
            title: 'Upcoming Exhibitions!',
            text: text,
            imageUrl: image,
            imageWidth: 400,
            imageHeight: 200,
            imageAlt: 'Custom image',
        })
    }
</script>