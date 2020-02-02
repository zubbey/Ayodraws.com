
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
                        echo '<label for="imageName">Image name</label>';
                        echo '<input id="imageName" name="image_name" type="text" class="form-control form-control-lg mb-0" value="' . $imgRow['image_name'] . '">';
                        echo '</div>';
                        echo '<div class="form-group mt-4">';
                        echo '<label for="imageDesc">Image Description</label>';
                        echo '<textarea name="image_desc" class="form-control" id="imageDesc" rows="3">' . $imgRow['image_description'] . '</textarea>';
                        echo '</div>';
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
                        echo '<div class="modal-footer">';
                        echo '<button class="btn btn-primary w-100" type="submit" name="update_image_painting">Update <i class="fas fa-pencil-alt"></i></button>';
                        echo '</div>';
                        echo '</div>';
                        echo '</form>';
                    } else {
                        echo '<form method="GET" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
                        echo '<div class="modal-body">';
                        echo '<div class="form-group">';
                        echo '<label for="imageName">Image name</label>';
                        echo '<input id="imageName" name="image_name" type="text" class="form-control form-control-lg mb-0" value="' . $imgRow['image_name'] . '">';
                        echo '</div>';
                        echo '<input name="table" type="hidden" value="' . $table . '">';
                        echo '<input name="imageid" type="hidden" value="' . $imageid . '">';
                        echo '<div class="modal-footer">';
                        echo '<button class="btn btn-primary" type="submit" name="update_image_others">Update <i class="fas fa-pencil-alt"></i></button>';
                        echo '</div>';
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

<!--EDIT PAGE CONTENT-->
<?php
if (isset($_GET['edit_id'])){
    $id = $_GET['edit_id'];
}

$sql = "SELECT * FROM page_content WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $heading = mysqli_real_escape_string($conn, $row['heading']);
    $body = mysqli_real_escape_string($conn, $row['body']);
}
?>

<div class="modal fade" id="edit_content" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="page-header custom_align" id="Heading">Edit this Content</h4>
            </div>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input name="heading" class="form-control " type="text" value="<?php echo $heading; ?>">
                        <input name="id" type="hidden" value="<?php echo $id; ?>">
                    </div>
                    <div class="form-group">
                        <textarea name="body" rows="4" class="form-control"><?php echo $body; ?></textarea>
                    </div>
                </div>
                <div class="modal-footer ">
                    <button name="update_content_btn" type="submit" class="btn btn-primary btn-lg" style="width: 100%;"><span class="fas fa-save"></span> Update</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<div class="modal fade" id="delete_content" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
            </div>
            <div class="modal-body">

                <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="ms-container">
    <div class="ms-section__block">
        <div class="">
            <p class="page-desc">Welcome to kelechi nwaneri admin panel</p>
            <h2 class="page-header"><?php echo $_SESSION['username']; ?></h2>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="nav nav-pills faq-nav" id="faq-tabs" role="tablist" aria-orientation="vertical">
                    <a href="#tab1" class="nav-link active" data-toggle="pill" role="tab" aria-controls="tab1" aria-selected="true">
                        <i class="fas fa-database"></i> Dashboard
                    </a>
                    <a href="#tab2" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab2" aria-selected="false">
                        <i class="fas fa-upload"></i> Upload Images
                    </a>
                    <a href="#tab3" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab3" aria-selected="false">
                        <i class="fas fa-edit"></i> Edit Page Contents
                    </a>
                    <a href="#tab4" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab4" aria-selected="false">
                        <i class="fas fa-edit"></i> Subscribers
                    </a>
                    <a onclick="location.assign('?logout=true')" href="#" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab6" aria-selected="false">
                        <i class="fas fa-sign-out-alt"></i> Sign out
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
                                        <h4 class="page-header font-weight-bold">Total Visitors View</h4>
                                        <?php
                                        $total_website_views = unique_ip($conn); // Returns total website views
                                        echo "<p class='page-desc w-100'>You have <span class='font-weight-bold'> " . $total_website_views . "</span> Views</p>";
                                        ?>
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
                                        <?php
                                        $total_artworks = total_uploads($conn); // Returns total website views
                                        echo "<p class='page-desc w-100'>You have uploaded <span class='font-weight-bold'> " . $total_artworks . "</span> Artworks</p>";
                                        ?>
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

                                        <div class="container">
                                            <div class="row">


                                                <div class="col-md-12">
                                                    <div class="table-responsive">

                                                        <table id="mytable" class="table table-bordred table-striped">

                                                            <thead>

                                                            <th>N/S</th>
                                                            <th>heading</th>
                                                            <th>body</th>
                                                            <th>Edit</th>

                                                            <th>Delete</th>
                                                            </thead>
                                                            <tbody>

                                                            <?php
                                                            $sql = "SELECT * FROM page_content ORDER BY id";
                                                            $result = mysqli_query($conn, $sql);
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                echo '
                                                                    <tr>
                                                                        <td>'.$row['id'].'</td>
                                                                        <td>'. mysqli_real_escape_string($conn, $row['heading']) .'</td>
                                                                        <td>'. mysqli_real_escape_string($conn, $row['body']) .'</td>
                                                                        <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button onclick="location.assign(\'?edit_id='.$row['id'].'\')" ><span class="fas fa-edit" style="color: #6591c7;"></span></button></p></td>
                                                                        <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button onclick="location.assign(\'?delete_id='.$row['id'].'\')" ><span class="fas fa-trash"></span></button></p></td>
                                                                    </tr>
                                                                ';
                                                            }
                                                            ?>

                                                            </tbody>

                                                        </table>

                                                        <div class="clearfix"></div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

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
                                        <h2 class="page-header">Subscribed Email Address</h2>

                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">id</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">iP Address</th>
                                                <th scope="col">Issued Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php

                                            $sql = "SELECT * FROM subscribed_emails ORDER BY id";
                                            $result = mysqli_query($conn, $sql);
                                            if(mysqli_num_rows($result) > 0){
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo '
                                                    <tr>
                                                        <th scope="row">'.$row['id'].'</th>
                                                        <td>'.$row['email'].'</td>
                                                        <td>'.$row['ip_address'].'</td>
                                                        <td>'.$row['subscribed_date'].'</td>
                                                    </tr>
                                                ';
                                                }
                                                echo "<caption>List of subscribed email</caption>";
                                            } else {
                                                echo "<caption>You Have 0 Subscriber</caption>";
                                            }
                                            ?>

                                            </tbody>
                                        </table>
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
