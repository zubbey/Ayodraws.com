<?php
// AUTH CONTROLLER FOR BACKEND
require_once ('./controller/authController.php');
//components
require ('./components/admin-menu.php');
?>

<!-- Select Upload Table Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Select Upload Option</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="modal-body">
                    <div class="form-group mb-4">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input onclick="showCategory()" id="painting" class="form-check-input" type="radio" name="upload-option" value="painting">
                            <label class="form-check-label" for="exampleRadios1">Painting</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input onclick="showCategory()" class="form-check-input" type="radio" name="upload-option" value="image_slider">
                            <label class="form-check-label" for="exampleRadios3">Image Slider</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <h5 class="py-3">Enter Image name</h5>
                        <input name="image-name" type="text" class="form-control form-control-lg mb-0" placeholder="Eg: Kelechi Oil Paint">
                    </div>
                    <div id="category" class="form-group" style="display: none">
                        <label for="exampleFormControlSelect1">Select category</label>
                        <select class="form-control" name="category">
                            <option value="Ageing Planet Series" selected>Ageing Planet Series</option>
                            <option value="depths of solitude Series">depths of solitude Series</option>
                            <option value="Hyperrealism">Hyperrealism</option>
                            <option value="Masked Series">Masked Series</option>
                            <option value="Other Paintings">Other Paintings</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" name="complete" type="submit">Complete</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Select Upload Table Modal -->
<div class="modal fade bd-example-modal-xl" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Select Image Table</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input id="check1" onclick="location.assign('?edit=true&table=' + selectedTable())" class="form-check-input edit" type="radio" name="edit-option" value="painting">
                            <label class="form-check-label" for="exampleRadios1">Painting</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input id="check2" onclick="location.assign('?edit=true&table=' + selectedTable())" class="form-check-input edit" type="radio" name="edit-option" value="image_slider">
                            <label class="form-check-label" for="exampleRadios2">Image Slider</label>
                        </div>
                    </div>

                    <!-- DISPLAY CURRECT SELECTED TABLE-->
                        <div class="container">
                            <div class="card-columns">
                            <?php

                            if (isset($_GET['table'])){
                                $table = $_GET['table'];
                                $sqlImg = "SELECT * FROM $table ORDER BY id";
                                $resultGallery = mysqli_query($conn, $sqlImg);
                                while ($imgRow = mysqli_fetch_assoc($resultGallery)) {
                                    echo
                                    '
                                    <div class="card">
                                        <img src="'.$imgRow['image_link'].'" class="thumbnail card-img-top" alt="'.$imgRow['image_name'].'">
                                        <div class="card-body">
                                            <h5 class="card-title">'.$imgRow['image_name'].'</h5>
                                     ';
                                    if ($table === 'painting'){
                                        echo '<p class="card-text">category: '.$imgRow['category'].'</p>';
                                    }
                                    echo '
                                            <a href="?editId='.$imgRow['id'].'&table='.$table.'" class="ms-button" data-title="Edit" data-type="page-transition">Edit <i class="fas fa-pencil-alt"></i></a>
                                            <a href="?deleteId='.$imgRow['id'].'&table='.$table.'" class="ms-button" data-title="Drop" data-type="page-transition">Delete <i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                        
                                    ';
                                }
                            }
                            ?>
                            </div>
                        </div>

                </div>
            </form>
        </div>
    </div>
</div>

<!--EDIT SELECTED IMAGE MODEL -->
<div class="modal fade" id="editSelectedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Edit Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php
            if (isset($_GET['table'])){
                $table = $_GET['table'];
                $imageid = $_GET['editId'];

                $sqlImg = "SELECT * FROM $table WHERE id = '$imageid' LIMIT 1";
                $resultGallery = mysqli_query($conn, $sqlImg);
                while ($imgRow = mysqli_fetch_assoc($resultGallery)) {
                    if ($table === 'painting') {
                        echo '<form method="GET" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
                        echo '<div class="modal-body">';
                        echo '<div class="form-group">';
                        echo '<h5 class="py-3">Change Image name</h5>';
                        echo '<input name="image_name" type="text" class="form-control form-control-lg mb-0" value="' . $imgRow['image_name'] . '">';
                        echo '<input name="table" type="hidden" value="' . $table . '">';
                        echo '<input name="imageid" type="hidden" value="' . $imageid . '">';
                        echo '
                        <div class="form-group">
                        <label for="exampleFormControlSelect1">Select category</label>
                        <select class="form-control" name="category">
                          <option value="' . $imgRow['category'] . '" selected>' . $imgRow['category'] . '</option>
                          <option value="Ageing Planet Series">Ageing Planet Series</option>
                          <option value="depths of solitude Series">depths of solitude Series</option>
                          <option value="Hyperrealism">Hyperrealism</option>
                          <option value="Masked Series">Masked Series</option>
                          <option value="Other Paintings">Other Paintings</option>
                        </select>
                      </div>
                        ';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="modal-footer">';
                        echo '<button class="btn btn-primary" type="submit" name="update_image_painting">Update <i class="fas fa-pencil-alt"></i></button>';
                        echo '</div>';
                        echo '</form>';
                    } else {
                        echo '<form method="GET" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
                        echo '<div class="modal-body">';
                        echo '<div class="form-group">';
                        echo '<h5 class="py-3">Change Image name</h5>';
                        echo '<input name="image_name" type="text" class="form-control form-control-lg mb-0" value="' . $imgRow['image_name'] . '">';
                        echo '<input name="table" type="hidden" value="' . $table . '">';
                        echo '<input name="imageid" type="hidden" value="' . $imageid . '">';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="modal-footer">';
                        echo '<button class="btn btn-primary" type="submit" name="update_image_others">Update <i class="fas fa-pencil-alt"></i></button>';
                        echo '</div>';
                        echo '</form>';
                    }
                }
//                    mysqli_close($conn);
            }
            ?>

        </div>
    </div>
</div>

<div class="ms-container">
    <div class="ms-section__block">
        <div class="">
            <p class="page-desc">Welcome to kelechi nwaneri admin panel</p>
            <h2 class="page-header">admin name</h2>
        </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="nav nav-pills faq-nav" id="faq-tabs" role="tablist" aria-orientation="vertical">
                <a href="#tab1" class="nav-link active" data-toggle="pill" role="tab" aria-controls="tab1" aria-selected="true">
                    <i class="mdi mdi-help-circle"></i> Dashboard
                </a>
                <a href="#tab2" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab2" aria-selected="false">
                    <i class="mdi mdi-account"></i> Upload Images
                </a>
                <a href="#tab3" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab3" aria-selected="false">
                    <i class="mdi mdi-account-settings"></i> Edit Page Contents
                </a>
                <a href="#tab4" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab4" aria-selected="false">
                    <i class="mdi mdi-coin"></i> Edit Prints
                </a>
                <a href="#tab6" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab6" aria-selected="false">
                    <i class="mdi mdi-help"></i> Sign out
                </a>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="tab-content" id="faq-tab-content">

                <div class="tab-pane show active" id="tab1" role="tabpanel" aria-labelledby="tab1">
                    <div class="row bg-white mb-2">
                        <main class="col-md-12 mt-5">
                            <!-- Page Title -->
                            <div class="ms-section__block">
                                <div class="ms-page-title">
                                    <h4 class="page-header font-weight-bold">Total Visitors</h4>
                                    <p class="page-desc">you have 0.0 Visitors</p>
                                </div>
                            </div>
                        </main>
                    </div>
                    <div class="row bg-white">
                        <main class="col-md-12 mt-5">
                            <!-- Page Title -->
                            <div class="ms-section__block">
                                <div class="ms-page-title">
                                    <h4 class="page-header font-weight-bold">Total Uploaded Artwork</h4>
                                    <p class="page-desc">you Uploaded 40 Images</p>
                                </div>
                            </div>
                        </main>
                    </div>

                </div>

<!--                Upload Slider imgaes-->

                <div class="tab-pane" id="tab2" role="tabpanel" aria-labelledby="tab2">
                    <div class="row bg-white">
                        <main class="col-md-12 mt-5">
                            <!-- Page Title -->
                            <div class="ms-section__block">
                                <div class="ms-page-title">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2 class="page-header">Upload images</h2>
                                        <a onclick="location.assign('?edit=true&table=painting')" class="ms-button" data-title="Edit now" data-type="page-transition">Edit Uploaded</a>
                                    </div>
                                    <p class="page-desc">Simply upload images to Kelechi Nwaneri database</p>
                                </div>
                                <div class="dropzone">
                                    <div class="info"></div>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>

<!--                Edit Page contents-->

                <div class="tab-pane" id="tab3" role="tabpanel" aria-labelledby="tab3">
                    <div class="row bg-white">
                        <main class="col-md-12 mt-5">
                            <!-- Page Title -->
                            <div class="ms-section__block">
                                <div class="ms-page-title">
                                    <h2 class="page-header">Edit Page contents</h2>
                                    <p class="page-desc">Modify or add more content </p>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>

<!--                Edit Prints / News-->

                <div class="tab-pane" id="tab4" role="tabpanel" aria-labelledby="tab4">
                    <div class="row bg-white">
                        <main class="col-md-12 mt-5">
                            <!-- Page Title -->
                            <div class="ms-section__block">
                                <div class="ms-page-title">
                                    <h2 class="page-header">Edit Page contents</h2>
                                    <p class="page-desc">Edit print page</p>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
</div>
<?php
require ('./components/footer-light.php');
?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript" src="./js/imgur.js"></script>
<script type="text/javascript" src="./js/upload.js"></script>
<script>
    if (document.URL.indexOf("update=image") >= 0){
        $('#tab2')[0].click();
    }

    if (document.URL.indexOf("?slider_image_link") >= 0){
        $('#myModal').modal('show');
    }
    if (document.URL.indexOf("noDatabase") >= 0){
        $('#myModal').modal('show');
    }
    function selectedTable(){
        return document.querySelector(".edit:checked").value;
    }
    if (document.URL.indexOf("edit=true") >= 0){
        $('#editModal').modal('show');
    }
    if (document.URL.indexOf("editId") >= 0){
        $('#editSelectedModal').modal('show');
    }
    if (document.URL.indexOf("painting") >= 0){
        $("#check1").attr("checked", true);
    }
    if (document.URL.indexOf("image_slider") >= 0){
            $("#check2").attr("checked", true);
    }

    function showCategory() {
        var checkBox = document.getElementById("painting");
        var text = document.getElementById("category");
        if (checkBox.checked == true){
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }

    if (queryParameters().success === "imageUpdated"){
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Image was updated successfully!',
            showConfirmButton: false,
            timer: 2000
        })
    }

    if (queryParameters().success === "imageDeleted"){
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Image has been Deleted!',
            showConfirmButton: false,
            timer: 2000
        })
    }
    if (queryParameters().error === "notedited"){
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Their was a problem updating the image!',
            showConfirmButton: false,
            timer: 2000
        })
    }
    if (queryParameters().error === "notdeleted"){
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Their was a problem deleting the image!',
            showConfirmButton: false,
            timer: 2000
        })
    }
    if (queryParameters().error === "noDatabase"){
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'No database found or selected!',
            showConfirmButton: false,
            timer: 2000
        })
    }
</script>