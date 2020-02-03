<?php
// AUTH CONTROLLER FOR BACKEND
require_once ('./controller/authController.php');
//components
require('./components/menu.php');
$page_id = 4;
$visitor_ip = $_SERVER['REMOTE_ADDR']; // stores IP address of visitor in variable
add_view($conn, $visitor_ip, $page_id);
?>
    <main class="ms-container">
        <!-- Page Title -->
        <div class="ms-section__block">
            <div class="ms-page-title">
                <h2 class="page-header">Let's work together</h2>
                <p class="page-desc">Subscribe for my newsletter and Be part of my drawing, stories, Art and Exhibitions.</p>
            </div>
        </div>
        <!-- Page Content -->
        <div class="ms-section__block">
            <div id="contact" class="row">
                <div class="col-md-6">
                    <div class="row">
<!--                        <div class="col-md-6">-->
<!--                            <h6>the office</h6>-->
<!--                            <p>25 Parker St. London WC2B 5PJ UK</p>-->
<!--                        </div>-->
                        <div class="col-md-6">
                            <?php
                            $sql = "SELECT * FROM page_content WHERE id = 6";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<h6>'.$row['heading'].'</h6>';
                                echo '<p>'.$row['body'].'</p>';
                            }
                            ?>
                        </div>
                        <div class="col-md-6">
                            <?php
                            $sql = "SELECT * FROM page_content WHERE id = 3";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<h6>'.$row['heading'].'</h6>';
                                    echo '<p>'.$row['body'].'</p>';
                                }
                            ?>
                        </div>
                        <div class="col-md-6 cont-soc">
                            <h6>social</h6>
                            <?php
                            $sql = "SELECT * FROM page_content WHERE id = 4";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($row['heading'] === "facebook"){
                                    $facebook = "<i class=\"fab fa-facebook-square\"></i>";
                                }
                                echo '<p><a href="https://'.$row['body'].'" target="_blank" class="facebook">'.$facebook.' '.$row['body'].'</a></p>';
                            }
                            $sql = "SELECT * FROM page_content WHERE id = 5";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($row['heading'] === "instagram"){
                                    $instagram = "<i class=\"fab fa-instagram\"></i>";
                                }
                                echo '<p><a href="https://instagram.com/'.$row['body'].'" target="_blank" class="">'.$instagram.' '.$row['body'].'</a></p>';
                            }
//                            mysqli_close($conn);
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h6>Subscribe for Newsletter</h6>
                    <form method="get">
                        <div class="d-flex justify-content-between align-content-center mt-3">
                            <input type="email" name="emailAddress" class="form-control" id="cl" placeholder="Email Address" autocomplete="on">
                            <div class="input-button">
                                <button class="btn btn-default" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
<!--                    <form id="validForm">-->
<!--                        <div class="row">-->
<!--                            <div class="form-group col-md-6">-->
<!--                                <input type="text" name="name" class="form-control" id="cl" placeholder="Your name" autocomplete="off">-->
<!--                            </div>-->
<!--                            <div class="form-group col-md-6">-->
<!--                                <input type="email" name="email" class="form-control" placeholder="Email address" autocomplete="off">-->
<!--                            </div>-->
<!--                            <div class="form-group col-md-12">-->
<!--                                <input type="text" name="subject" class="form-control" placeholder="Subject">-->
<!--                            </div>-->
<!--                            <div class="form-group col-md-12">-->
<!--                                <textarea name="message" class="form-control" id="message" placeholder="Your message"></textarea>-->
<!--                            </div>-->
<!--                            <div class="col-md-12">-->
<!--                                <div class="ms-button" data-title="send">Send-->
<!--                                    <input name="contact-btn" type="submit" value="send">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </form>-->
                </div>
            </div>
        </div>
    </main>
<?php
require ('./components/footer.php');
?>