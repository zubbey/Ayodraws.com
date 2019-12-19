<?php
// AUTH CONTROLLER FOR BACKEND
require_once ('./controller/authController.php');
//components
require('./components/menu-light.php');
?>
<main class="ms-container">
    <!-- Page Title -->
    <div class="ms-section__block col-md-6" style="display: flex">
        <div class="ms-page-title">
            <p class="page-desc">who am i?</p>
            <h1 class="page-header">Nwaneri K. Charles</h1>
        </div>
        <div class="about__img">
            <p><img src="https://i.imgur.com/2CA9jlb.jpg" alt="img"></p>
        </div>
    </div>
    <!-- Page Content -->
    <div class="ms-section__block">
        <div id="about" class="row">
            <?php
                $sql = "SELECT * FROM page_content ORDER BY id LIMIT 2";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class=" center-block">
                            <div class="about__info col-md-8">
                                <h2 class="page-header">'.$row['heading'].'</h2>
                                <p>'.nl2br($row['body']).'</p>
                            </div>
                        </div>';
                }
                ?>
        </div>
    </div>
</main>
<?php
require ('./components/footer-light.php');
?>
