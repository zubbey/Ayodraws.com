<?php
// AUTH CONTROLLER FOR BACKEND
require_once ('./controller/authController.php');
//components
require('./components/menu-light.php');
?>
<main class="ms-container">
    <div class="ms-section__block col-md-6" style="display: flex">
        <div class="col-md-12">
            <div class="error-template">
                <h1 class="display-4">Oops!</h1>
                <h2>THE PAGE YOU'RE LOOKING FOR DOES NOT EXIST</h2>
                <div class="error-details">
                    <span id="url"></span>
                </div>
                <div class="error-actions">
                    <a href="/" class="card-link"><span class="glyphicon glyphicon-home"></span>
                        Go back to kelechinwaneri </a>
                    <a href="http://kelechinwaneri.com/contact" class="card-link"><span class="glyphicon glyphicon-envelope"></span> Contact Support </a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
require ('./components/footer.php');
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    document.getElementById("url").innerHTML =
        "Your Requested page: " + window.location.href + " could not be found";
</script>
