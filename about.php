<?php
// AUTH CONTROLLER FOR BACKEND
require_once ('./controller/authController.php');
//components
require('./components/menu.php');
//GET VISITORS IP ADDRESS
$page_id = 5;
$visitor_ip = $_SERVER['REMOTE_ADDR']; // stores IP address of visitor in variable
add_view($conn, $visitor_ip, $page_id);

?>
<main class="ms-container">
    <!-- Page Title -->
    <div class="ms-section__block col-md-6" style="display: block">
        <div class="ms-page-title">
            <p class="page-desc">About me</p>
        </div>
        <div class="about__img">
            <p class="mt-0 mb-0"><img class="w-100 img-thumbnail" src="https://i.imgur.com/2CA9jlb.jpg" alt="Kelechi Nwaneri"></p>
        </div>
        <h4 style="text-align: center" class="page-header">Kelechi Nwaneri Charles</h4>
    </div>
    <!-- Page Content -->
    <div class="ms-section__block">
        <div id="about" class="row">
            <?php
            //Initializing Sanitize
            function sanitize($str){
                if (get_magic_quotes_gpc()) $str=stripslashes($str);
                if (function_exists('mysql_real_escape_string')) {
                    return mysql_real_escape_string($str);
                } else return addslashes($str);
            }
                $sql = "SELECT * FROM page_content ORDER BY id LIMIT 2";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class=" center-block">
                            <div class="about__info col-md-8">
                                <h2 class="page-header">'.mysqli_real_escape_string($conn, $row['heading']).'</h2>
                                <p>'.mysqli_real_escape_string($conn, sanitize($row['body'])).'</p>
                            </div>
                        </div>';
                }
                ?>
        </div>
    </div>
</main>
<?php
require ('./components/footer.php');
?>
