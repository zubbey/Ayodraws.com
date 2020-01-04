<?php
// AUTH CONTROLLER FOR BACKEND
require_once ('./controller/authController.php');
//components
require('./components/menu-light.php');
?>
<main class="ms-container">
    <!-- Page Title -->
    <div class="ms-section__block col-md-6" style="display: block">
        <div class="ms-page-title">
            <p class="page-desc">About me</p>
        </div>
        <div class="about__img">
            <p><img src="https://i.imgur.com/2CA9jlb.jpg" alt="img"></p>
        </div>
        <h1 style="text-align: center" class="page-header">Kelechi Nwaneri Charles</h1>
    </div>
    <!-- Page Content -->
    <div class="ms-section__block">
        <div id="about" class="row">
            <?php
                $sql = "SELECT * FROM page_content ORDER BY id LIMIT 2";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class=" center-block">
                            <div class="about__info col-md-12">
                                <h2 class="page-header">'.sanitize($row['heading']).'</h2>
                                <p>'.nl2br(sanitize($row['body'])).'</p>
                            </div>
                        </div>';
                }

                function sanitize($str){
                    global $conn;
                    if (get_magic_quotes_gpc()) $str=stripslashes($str);
                    if (function_exists('mysqli_real_escape_string')) {
                        return mysqli_real_escape_string($conn, $str);
                    } else return addslashes($str);
                }
                ?>
        </div>
    </div>
</main>
<?php
require ('./components/footer-light.php');
?>
