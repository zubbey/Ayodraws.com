<?php
// AUTH CONTROLLER FOR BACKEND
require_once ('./controller/authController.php');
//components
require ('./components/admin-menu.php');

if($_SESSION['admin_session']){
    require ('admin_dashboard.php');
} else {

    if (isset($_GET['username_error']) && $_GET['username_error'] === 'Enter your admin username'){
        $invalid_username = "is-invalid";
        $invalid_username_Msg = "<div class=\"invalid-feedback\">".$_GET['username_error']."</div>";
    }
    if (isset($_GET['password_error']) && $_GET['password_error'] === 'Enter the correct admin password'){
        $invalid_password = "is-invalid";
        $invalid_password_Msg = "<div class=\"invalid-feedback\">".$_GET['password_error']."</div>";
    }
    if (isset($_GET['no_account']) && $_GET['no_account'] === 'You do not have access to this portal!'){
        $invalid_username = "is-invalid";
        $invalid_password = "is-invalid";
        $invalid_entry_Msg = "<small class=\"invalid-feedback d-block\">".$_GET['no_account']."</small>";
    }


    echo '
<main class="ms-container">
    <div class="ms-section__block">

        <form method="POST" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
            <div class="row">
                <div class="form-group col-md-6 m-auto">
                    <h2 class="page-header">Admin Login Portal</h2>
                    '.$invalid_entry_Msg.'
                   
                    <input type="text" name="username" class="form-control m-0 '.$invalid_username.'" id="cl" placeholder="Username" autocomplete="on" value="'.$_GET['username'].'">
                    '.$invalid_username_Msg.'<br>
                   
                    <input type="password" name="password" class="form-control m-0 '.$invalid_password.'" placeholder="Password" autocomplete="off">
                    '.$invalid_password_Msg.'<br>
                    <div class="ms-button" data-title="login">Login
                        <input name="login-btn" type="submit" value="submit">
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
    ';
}
?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
        $('#faq-tabs a:nth-child(2)')[0].click();
    }
    if (document.URL.indexOf("editId") >= 0){
        $('#editSelectedModal').modal('show');
        $('#faq-tabs a:nth-child(2)')[0].click();
    }
    if (document.URL.indexOf("painting") >= 0){
        $("#check1").attr("checked", true);
    }
    if (document.URL.indexOf("image_slider") >= 0){
        $("#check2").attr("checked", true);
    }

    if (document.URL.indexOf("?q=contents") > 0){
        $('#edit_content').modal('show');
        $('#faq-tabs a:nth-child(3)')[0].click();
    }

    if (document.URL.indexOf("?add=exhibit") > 0){
        $('#add_exhibition').modal('show');
        $('#faq-tabs a:nth-child(4)')[0].click();
    }

    if (document.URL.indexOf("?q=exhibit") > 0){
        $('#edit_exhibition').modal('show');
        $('#faq-tabs a:nth-child(4)')[0].click();
    }

    $('.close').on('click', function () {
        console.log('clicked modal');

        $.ajax( { type : 'POST',
            data : { },
            url  : 'controller/sessions.php',              // <=== CALL THE PHP FUNCTION HERE.
            success: function ( data ) {
                // alert( data );               // <=== VALUE RETURNED FROM FUNCTION.
            },
            error: function ( xhr ) {
                alert( "error" );
            }
        });
    });

    if (document.URL.indexOf("delete_id") >= 0){
        $('#delete_content').modal('show');

        if (document.URL.indexOf("exhibitions") >= 0){
            $('#faq-tabs a:nth-child(4)')[0].click();
        } else if (document.URL.indexOf("page_content") >= 0){
            $('#faq-tabs a:nth-child(3)')[0].click();
        }
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
    if(queryParameters().success == "Deleted"){
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        Toast.fire({
            icon: 'warning',
            title: 'Deleted Successfully'
        });
        $('#faq-tabs a:nth-child(4)')[0].click();
    }

    if (queryParameters().success === "contentupdated"){
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Your content was updated successfully!',
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
    if (queryParameters().error === "contentnotedited"){
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Their was a problem updating the page content!',
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
    let loginMsg = "<?php echo $_SESSION['successlogin'];?>";
    if (queryParameters().login === "true"){
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 8000,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'success',
            title: loginMsg
        })
    }

    $(document).ready(function(){
        $("[data-toggle=tooltip]").tooltip();
    });
</script>