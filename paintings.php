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
            <h2 class="page-header"></h2>
            <p class="page-desc"></p>
        </div>
    </div>
    <!-- Page Content -->
    <div class="ms-section__block">
        <div id="albums">
            <!-- Sort -->
            <ul class="filtr-btn">
                <li onclick="categoryDesc('all')" data-filter="all" class="active"><h6>all</h6></li>
                <li onclick="categoryDesc(1)" data-filter="1"><h6>Ageing Planet Series</h6></li>
                <li onclick="categoryDesc(2)" data-filter="2"><h6>depths of solitude Series</h6></li>
                <li onclick="categoryDesc(3)" data-filter="3"><h6>Hyperrealism</h6></li>
                <li onclick="categoryDesc(4)" data-filter="4"><h6>Masked Series</h6></li>
                <li onclick="categoryDesc(5)" data-filter="5"><h6>Other Paintings</h6></li>
            </ul>

            <div class="filtr-container row">
                <!-- Album item -->
                <?php
                $sqlImg = "SELECT * FROM painting WHERE category = 'Ageing Planet Series'";
                $resultGallery = mysqli_query($conn, $sqlImg);
                while ($imgRow = mysqli_fetch_assoc($resultGallery)) {
                    echo '
                    <div class="album-item col-md-4 filtr-item" data-category="1">
                        <a href="painting-details?painting_id='.$imgRow['id'].'" data-type="page-transition">
                            <div class="album-item__overlay">
                                <span class="album-item__cover"></span>
                                <h5 class="category">'.$imgRow['category'].'</h5>
                            </div>
                            <div class="album-item__img" style="background-image: url('.$imgRow['image_link'].')"></div>
                        </a>
                        <h6 class="page-header">'.$imgRow['image_name'].'</h6>
                    </div>
                    ';
                }
                ?>
                <!-- Album item -->
                <?php
                $sqlImg = "SELECT * FROM painting WHERE category = 'depths of solitude Series'";
                $resultGallery = mysqli_query($conn, $sqlImg);
                while ($imgRow = mysqli_fetch_assoc($resultGallery)) {
                    echo '
                    <div class="album-item col-md-4 filtr-item" data-category="2">
                    <a href="painting-details?painting_id='.$imgRow['id'].'" data-type="page-transition">
                        <div class="album-item__overlay">
                            <span class="album-item__cover"></span>
                            <h5 class="category">'.$imgRow['category'].'</h5>
                        </div>
                        <div class="album-item__img" style="background-image: url('.$imgRow['image_link'].')"></div>
                    </a>
                    <h6 class="page-header">'.$imgRow['image_name'].'</h6>
                </div>
                    ';
                }
                ?>

                <!-- Album item -->
                <?php
                $sqlImg = "SELECT * FROM painting WHERE category = 'Hyperrealism'";
                $resultGallery = mysqli_query($conn, $sqlImg);
                while ($imgRow = mysqli_fetch_assoc($resultGallery)) {
                    echo '
                    <div class="album-item col-md-4 filtr-item" data-category="3">
                    <a href="painting-details?painting_id='.$imgRow['id'].'" data-type="page-transition">
                        <div class="album-item__overlay">
                            <span class="album-item__cover"></span>
                            <h5 class="category">'.$imgRow['category'].'</h5>
                        </div>
                        <div class="album-item__img" style="background-image: url('.$imgRow['image_link'].')"></div>
                    </a>
                    <h6 class="page-header">'.$imgRow['image_name'].'</h6>
                </div>
                    ';
                }
                ?>

                <?php
                $sqlImg = "SELECT * FROM painting WHERE category = 'Masked Series'";
                $resultGallery = mysqli_query($conn, $sqlImg);
                while ($imgRow = mysqli_fetch_assoc($resultGallery)) {
                    echo '
                    <div class="album-item col-md-4 filtr-item" data-category="4">
                    <a href="painting-details?painting_id='.$imgRow['id'].'" data-type="page-transition">
                        <div class="album-item__overlay">
                            <span class="album-item__cover"></span>
                            <h5 class="category">'.$imgRow['category'].'</h5>
                        </div>
                        <div class="album-item__img" style="background-image: url('.$imgRow['image_link'].')"></div>
                    </a>
                    <h6 class="page-header">'.$imgRow['image_name'].'</h6>
                </div>
                    ';
                }
                ?>

                <?php
                $sqlImg = "SELECT * FROM painting WHERE category = 'Other Paintings'";
                $resultGallery = mysqli_query($conn, $sqlImg);
                while ($imgRow = mysqli_fetch_assoc($resultGallery)) {
                    echo '
                    <div class="album-item col-md-4 filtr-item" data-category="5">
                    <a href="painting-details?painting_id='.$imgRow['id'].'" data-type="page-transition">
                        <div class="album-item__overlay">
                            <span class="album-item__cover"></span>
                            <h5 class="category">'.$imgRow['category'].'</h5>
                        </div>
                        <div class="album-item__img" style="background-image: url('.$imgRow['image_link'].')"></div>
                    </a>
                    <h6 class="page-header">'.$imgRow['image_name'].'</h6>
                </div>
                    ';
                }
//                mysqli_close($conn);
                ?>

            </div>
        </div>
    </div>
</main>

<?php
require ('./components/footer-light.php');
?>
<script>
    let category_Desc = document.querySelector("p.page-desc");
    let category_Heading = document.querySelector("h2.page-header");
    let all = document.querySelector(".filtr-btn > li");

    // $('.filtr-btn > li').hasClass('active').ready(function () {
    //     alert("something");
    // });

    if($('.filtr-btn > li').hasClass('active')){
        categoryDesc('all');
    }
    function categoryDesc(x) {
        if (x === 'all'){
            category_Desc.innerHTML = "Explore My Painting Categories";
            category_Heading.innerHTML = "All Paintings";
        }
        if (x === 1){
            category_Desc.innerHTML = "Ageing Planet Series Drawing and Painting";
            category_Heading.innerHTML = "Ageing Planet Series";
        } else if (x === 2){
            category_Desc.innerHTML = "In this project I explore conversations and/or interactions that take place between individuals and their inner self in certain Life situations. These conversations are seen in the interactions between muscular realistic human Figures and the Hybrid black figures. These interactions take place in surrealistic spaces which represent the human mind. Depth of Solitude is inspired by the story of an Individual who was psychologically crushed and pushed to the end of depression but found his way to Strength and Recovery.";
            category_Heading.innerHTML = "Depths of solitude Series";
        } else if (x === 3){
            category_Desc.innerHTML = "Hyperrealism drawing and Painting";
            category_Heading.innerHTML = "Hyperrealism";
        } else if (x === 4){
            category_Desc.innerHTML = "The word PERSONALITY originated from the Greek word “Persona” which means “Mask”. This is the basis of this series. Supporting this idea is a personal conviction that once you meet people, you meet the personality that they present before you, this personality is like some form of Mask they wear and not until they decide to take off this mask, you cannot see their real selves. In this series of work I explore varying human personalities with the varying faces of masks and the faces they mask. Taking my reference predominantly from (although not limited to) Masks of African Origins";
            category_Heading.innerHTML = "Masked Series";
        }
        else if (x === 5){
            category_Desc.innerHTML = "Other Paintings Drawing and Painting";
            category_Heading.innerHTML = "Other Paintings";
        }
    }
</script>