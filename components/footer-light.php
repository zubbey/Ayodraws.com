<!-- Footer -->
<footer>
    <div class="ms-footer">
        <div class="copyright"><p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> kelechinwaneri.com | All Rights Reserved</p></div>
        <ul class="socials">
            <?php
            $sql = "SELECT * FROM page_content WHERE id = 4";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['heading'] === "facebook"){
                    $facebook = "<i class=\"fab fa-facebook-square\"></i>";
                }
                echo '<li><a href="https://'.$row['body'].'" class="" target="_blank">'.$facebook.'</a></li>';
            }
            $sql = "SELECT * FROM page_content WHERE id = 5";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['heading'] === "instagram"){
                    $instagram = "<i class=\"fab fa-instagram\"></i>";
                }
                echo '<li><a href="https://instagram.com/'.$row['body'].'" class="" target="_blank">'.$instagram.'</a></li>';
            }
            mysqli_close($conn);
            ?>
            <!--            <li><a href="#" class="socicon-twitter"></a><i class="fab fa-twitter"></i></li>-->
            <!--            <li><a href="#" class="socicon-youtube"></a><i class="fab fa-youtube-square"></i></li>-->
        </ul>
    </div>
</footer>
</div>
<!-- JS Libraries -->
<!-- jquery-2.1.3.min js -->
<script type="text/javascript" src='assets/js/jquery-3.2.1.min.js'></script>
<!-- Vendors -->
<script type="text/javascript" src='assets/js/plugins.min.js'></script>
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.min.js" ></script>-->
<!-- Main js -->
<script type="text/javascript" src="assets/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript" src='assets/js/sweetalert.js'></script>
<script type="text/javascript" src="assets/js/app.js"></script>
</body>
</html>