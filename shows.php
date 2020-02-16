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
                <?php
                $sql = "SELECT * FROM upcexhibitions";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '
                        <div class="post-item col-lg-6 col-md-12 filtr-item" data-category="1">
                            <a onclick="comingSoon(\'assets/images/shows8.jpg\', \''.$row["exhb_text"].'\')">
                                <div class="post-item__info m-0">
                                    <h5>'.$row["exhb_text"].'</h5>
                                </div>
                                <p class="mb-lg-5">'.$row["exhb_date"].'</p>
                            </a>
                        </div>
                    ';
                }
                ?>

                <?php
                $sql = "SELECT * FROM prevexhibitions";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '
                    <div class="post-item col-lg-6 col-md-12 filtr-item" data-category="2">
                        <a data-type="page-transition">
                            <div class="post-item__info m-0">
                                <h5>'.$row["exhb_text"].'</h5>
                            </div>
                            <p class="mb-lg-5">'.$row["exhb_date"].'</p>
                        </a>
                    </div>
                    ';
                }
                ?>
            </div>

        </div>
    </div>
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
            category_Desc.innerHTML = "";
            category_Heading.innerHTML = "Upcoming Exhibitions";
        } else if (x === 2){
            category_Desc.innerHTML = "";
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