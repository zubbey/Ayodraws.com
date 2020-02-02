<?php
// AUTH CONTROLLER FOR BACKEND
require_once ('./controller/authController.php');
//components
require('./components/menu.php');
?>

<main class="ms-container">
    <!-- Page Title -->
    <div class="ms-section__block">
        <div class="ms-page-title">
            <h2 class="page-header">2019 - SMO Contemporary Art Gallery “STASIS”, Temple Muse, Victoria Island Lagos, Nigeria.</h2>
            <div class="post-item__date">Date: 2019</div>
        </div>
    </div>
    <!-- Page Content -->
    <div class="ms-section__block">
        <div id="ms-blog-post" class="row">
            <div class="col-md-8">
                <img src="assets/images/shows.jpg" alt="img"><br>
                <h5 class="mb-3"></h5>
                <blockquote>“You don’t need to be a font savant, or be a Creative Cloud wizard, or even have a degree in design in order to be a highly effective product designer.”</blockquote>
                <p>Holisticly orchestrate extensible infrastructures without error-free <a href="#" title="link">e-commerce</a>. Authoritatively streamline inexpensive bandwidth for timely convergence. Credibly foster superior imperatives without parallel opportunities. Assertively visualize real-time supply chains before technically sound metrics. Monotonectally architect collaborative resources and superior technology.</p>
                <p>Phosfluorescently facilitate alternative e-commerce rather than turnkey ideas. Collaboratively synergize superior best practices with scalable e-business. Uniquely disseminate <a href="#" title="link">B2C</a> collaboration and idea-sharing without end-to-end ROI. Interactively synergize fully researched e-business vis-a-vis multifunctional "outside the box" thinking. Intrinsicly myocardinate corporate functionalities vis-a-vis efficient schemas.</p><br>
                <div class="ms-section__block center-block align-center">
                    <h4>Share</h4>
                    <div id="social" style="padding: 10px">
                        <!-- Branded Twitter button -->

                        <a class="share-btn share-btn-branded share-btn-twitter"
                           href="https://twitter.com/share?url=http%3A%2F%2Fkelechinwaneri.com%2Fshows-details&text=2019 - SMO Contemporary Art Gallery “STASIS”, Temple Muse, Victoria Island Lagos, Nigeria.”, Old York Road, London, Britain&via=KAECYART"
                           title="Share on Twitter">
                            <span class="share-btn-icon"></span>
                            <span class="share-btn-text">Twitter</span>
                        </a>

                        <!-- Branded Facebook button -->
                        <a class="share-btn share-btn-branded share-btn-facebook"
                           href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fkelechinwaneri.com%2Fshows-details"
                           title="Share on Facebook">
                            <span class="share-btn-icon"></span>
                            <span class="share-btn-text">Facebook</span>
                        </a>

                        <!-- Branded LinkedIn button -->
                        <a class="share-btn share-btn-branded share-btn-linkedin"
                           href="https://www.linkedin.com/shareArticle?mini=true&url=http%3A%2F%2Fkelechinwaneri.com%2Fshows-details"
                           title="Share on LinkedIn">
                            <span class="share-btn-icon"></span>
                            <span class="share-btn-text">LinkedIn</span>
                        </a>

                        <!-- Branded Pinterest button -->
                        <a class="share-btn share-btn-branded share-btn-pinterest"
                           href="https://www.pinterest.com/pin/create/button/?url=http%3A%2F%2Fkelechinwaneri.com%2Fshows-details"
                           title="Share on Pinterest">
                            <span class="share-btn-icon"></span>
                            <span class="share-btn-text">Pinterest</span>
                        </a>
                    </div>
                    <ul class="socials share-links">
                        <li><a href="#" class="socicon-facebook"></a></li>
                        <li><a href="#" class="socicon-instagram"></a></li>
                    </ul>
                </div>
            </div>
            <div class="ms-right-sidebar col-md-4">
                <div class="col-md-12"><h5>Other Shows</h5></div>
                <div class="col-md-12">
                    <a href="#" data-type="page-transition">
                        <h6 class="post-item__title">2019 - SMO Contemporary Art Gallery “STASIS”, Temple Muse, Victoria Island Lagos, Nigeria.</h6>
                        <div class="post-item__date">11/11/2017</div>
                    </a>
                </div>
                <div class="col-md-12">
                    <a href="#" data-type="page-transition">
                        <h6 class="post-item__title">2019 - ODA gallery, ‘SECRET GARDEN’, Fransccheok, Western Cape, South Africa.</h6>
                        <div class="post-item__date">11/11/2017</div>
                    </a>
                </div>
                <div class="col-md-12">
                    <a href="#" data-type="page-transition">
                        <h6 class="post-item__title">2019 - ODA gallery, ‘African Symbolism and Abstraction’, Fransccheok, Western Cape, South Africa.</h6>
                        <div class="post-item__date">11/11/2017</div>
                    </a>
                </div>
                <div class="col-md-12">
                    <a href="#" data-type="page-transition">
                        <h6 class="post-item__title">2018 - Thought Pyramids Gallery “Spanish Festivals and traditional celebrations” Maitama, Abuja, Nigeria</h6>
                        <div class="post-item__date">11/11/2017</div>
                    </a>
                </div>
                <div class="col-md-12">
                    <a href="#" data-type="page-transition">
                        <h6 class="post-item__title">2016- National Festival for Art and Culture (NAFEST) “Exploring the Goldmine Inherent in Nigerian Creative Industries. Ibom hall, Uyo.</h6>
                        <div class="post-item__date">11/11/2017</div>
                    </a>
                </div>
<!--                <div class="col-md-12"><a href="blog.html" data-type="page-transition">View All</a></div>-->
            </div>
        </div>
    </div>
</main>


<?php
require ('./components/footer.php');
?>
<script>
    (function(){

        var shareButtons = document.querySelectorAll(".share-btn");

        if (shareButtons) {
            [].forEach.call(shareButtons, function(button) {
                button.addEventListener("click", function(event) {
                    var width = 650,
                        height = 450;

                    event.preventDefault();

                    window.open(this.href, 'Share Dialog', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,width='+width+',height='+height+',top='+(screen.height/2-height/2)+',left='+(screen.width/2-width/2));
                });
            });
        }

    })();
</script>