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
            <h2 class="page-header">Gallery</h2>
            <p class="page-desc">From 2014 - <script>document.write(new Date().getFullYear());</script>.</p>
        </div>
    </div>
    <!-- Page Content -->
    <div class="ms-section__block">
        <div id="gallery">
            <?php
            $sqlImg = "SELECT image_link, image_name FROM painting ORDER BY id";
            $resultGallery = mysqli_query($conn, $sqlImg);
            while ($imgRow = mysqli_fetch_assoc($resultGallery)) {
                echo '<img alt="'.$imgRow['image_name'].'" src="'.$imgRow['image_link'].'" data-image="'.$imgRow['image_link'].'" data-description="'.$imgRow['image_name'].'">';
            }
//            mysqli_close($conn);
            ?>
        </div>
    </div>
<!--    <div class="ms-section__block center-block">-->
<!--        <a href="#" class="ms-button" data-title="load more" data-type="page-transition">load more</a>-->
<!--    </div>-->
</main>

<?php
require ('./components/footer-light.php');
?>