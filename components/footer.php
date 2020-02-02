<!-- Footer -->
<footer>
    <div class="row mt-5">
        <div class="col-md-6 m-auto text-center">
            <ul class="list-group list-group-horizontal d-inline-flex">
                <?php
                $sql = "SELECT * FROM page_content WHERE id = 4";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['heading'] === "facebook"){
                        $facebook = "<i class='fab fa-facebook-square'></i>";
                    }
                    echo '<li class="list-group-item border-0"><a href="https://'.$row['body'].'" target="_blank">'.$facebook.'</a></li>';
                }
                $sql = "SELECT * FROM page_content WHERE id = 5";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['heading'] === "instagram"){
                        $instagram = "<i class='fab fa-instagram'></i>";
                    }
                    echo '<li class="list-group-item border-0"><a href="https://instagram.com/'.$row['body'].'" target="_blank">'.$instagram.'</a></li>';
                }
                mysqli_close($conn);
                ?>
            </ul>
            <p class="h6 text-muted my-3">@KAECYART</p>
        </div>
    </div>
</footer>
</div>
<!-- Vendors -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.min.js" ></script>-->
<!-- JS Libraries -->
<script type="text/javascript" src='assets/js/jquery-3.2.1.min.js'></script>
<!-- Vendors -->
<script type="text/javascript" src='assets/js/plugins.min.js'></script>
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.min.js" ></script>-->
<!-- Main js -->
<script type="text/javascript" src="assets/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript" src='assets/js/sweetalert.js'></script>
<!--<script src="sweetalert2/dist/sweetalert2.min.js"></script>-->
<script type="text/javascript" src="assets/js/app.js"></script>
</body>
</html>