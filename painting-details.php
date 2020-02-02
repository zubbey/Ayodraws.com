<?php
// AUTH CONTROLLER FOR BACKEND
require_once ('./controller/authController.php');
//components
require('./components/menu.php');

if (isset($_GET['painting_id'])){
    $painting_id = $_GET['painting_id'];
}

?>
<?php
$sqlImg = "SELECT * FROM painting WHERE id = '$painting_id'";
$resultGallery = mysqli_query($conn, $sqlImg);
while ($imgRow = mysqli_fetch_assoc($resultGallery)) {
    $image_link = $imgRow['image_link'];
    $image_name = $imgRow['image_name'];
    $image_category = $imgRow['category'];
    $date = $imgRow['date_uploaded'];
    $desc = $imgRow['image_description'];
}
?>
    <main class="ms-container">
        <!-- Page Title -->
        <div class="ms-section__block">
            <div class="ms-page-title">
                <h6 class="page-header"><span>Category:</span> <?php echo $image_category;?></h6>
                <h2 id="current_painting" class="page-header"><?php echo $image_name;?></h2>
                <div class="post-item__date">Date: <?php echo $date;?></div>
            </div>
        </div>
        <!-- Page Content -->
        <div class="ms-section__block">
            <div id="ms-blog-post" class="row">
                <div class="col-md-8">
                    <img class="w-100" src="<?php echo $image_link;?>" alt="img"><br>
                    <h5 class="mb-3"></h5>
                    <p><?php echo $desc;?></p>

                </div>

                <div class="ms-right-sidebar col-md-4">
                    <div class="col-md-12">
                        <h5>Related Images</h5>
                        <div class="col-md-12">
                        <?php
                        $sqlImg = "SELECT * FROM painting WHERE category = '$image_category'";
                        $resultGallery = mysqli_query($conn, $sqlImg);
                        while ($imgRow = mysqli_fetch_assoc($resultGallery)) {
                            echo '
                            <a class="category" href="?painting_id='.$imgRow['id'].'" data-type="page-transition">
                                <h6 id="painting_name" class="post-item__title">'.$imgRow['image_name'].'</h6>
                                <div class="post-item__date">'.$imgRow['date_uploaded'].'</div>
                            </a>
                            ';
                        }
                        ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

<?php
require ('./components/footer.php');
?>

<script type="text/javascript">
    const current_painting = document.querySelector("#current_painting");
    const painting_name = document.querySelector("#painting_name");

    function getUrlVars() {
        var vars = {};
        var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
            vars[key] = value;
        });
        return vars;
    }
    function getUrlKey() {
        var urlKey = {};
        var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key) {
            urlKey[key] = key;
        });
        return urlKey;
    }
    const painting_id = getUrlVars()["painting_id"];
    if (!painting_id){
        if (getUrlVars()["subscribeEmail"]){
            const subscribe = getUrlKey()["subscribeEmail"];
            window.location.assign('paintings?'+subscribe+'=true');
        } else {
            window.location.assign('paintings');
        }
    }

    // if (current_painting === painting_name){
    //     category.style.display = "none";
    // }
    // function cnt_painting() {
    //
    // }
</script>
