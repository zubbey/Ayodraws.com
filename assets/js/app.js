
// Home | KELECHINWANERI.COM
const index = document.URL.indexOf("/") >= 0;
const home = document.URL.indexOf("index") >= 0;
const about = document.URL.indexOf("/about") >= 0;
const contact = document.URL.indexOf("/contact") >= 0;
const admin = document.URL.indexOf("/admin") >= 0;
const paintings = document.URL.indexOf("/paintings") >= 0;
const shows = document.URL.indexOf("/shows") >= 0;
const painting_details = document.URL.indexOf("/painting-details") >= 0;

const title_el = document.querySelector("title");
const home_nav = document.querySelector('ul li.home');
const paintings_nav = document.querySelector('ul li.paintings');
const shows_nav = document.querySelector('ul li.shows');
const about_nav = document.querySelector('ul li.about');
const contact_nav = document.querySelector('ul li.contact');

if(home || index){
    title_el.innerHTML = "Home | kelechinwaneri.com";
    home_nav.classList.add('active');
}
if(about){
    title_el.innerHTML = "About Kelechi | kelechinwaneri.com";
    about_nav.classList.add('active');
}
if(contact){
    title_el.innerHTML = "Contact | kelechinwaneri.com";
    contact_nav.classList.add('active');
}
if(admin){
    title_el.innerHTML = "Admin Dashboard | kelechinwaneri.com";
}
if(paintings){
    title_el.innerHTML = "Paintings | kelechinwaneri.com";
    paintings_nav.classList.add('active');
}
if(shows){
    title_el.innerHTML = "Shows | kelechinwaneri.com";
    shows_nav.classList.add('active');
}
if(painting_details){
    title_el.innerHTML = "Shows Details | kelechinwaneri.com";
    shows_nav.classList.add('active');
}

<!-- Initialize Swiper -->
const swiper = new Swiper('.swiper-container', {
    slidesPerView: 3,
    spaceBetween: 0,
    // slidesPerGroup: 3,
    loop: true,
    loopFillGroupWithBlank: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});

function queryParameters () {
    var result = {};
    var params = window.location.search.split(/\?|\&/);
    params.forEach( function(it) {
        if (it) {
            var param = it.split("=");
            result[param[0]] = param[1];
        }
    });
    return result;
}
if (queryParameters().success === "true"){
    swal("Uploaded", "Image uploaded successfully!", "success");
}
if (queryParameters().success === "subscribed"){
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Thanks for subscribing',
        showConfirmButton: false,
        timer: 4000
    });
    $('#home_subscribe').html('<p>Thanks for subscribing</p>');
}
if (queryParameters().error === "empty"){
    Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'You can\'t submit an empty field!',
        showConfirmButton: false,
        timer: 4000
    })
}

async function subscribeme() {
    const {value: email} = await Swal.fire({
        showConfirmButton: true,
        confirmButtonText: 'Subscribe',
        title: 'Subscribe for Newsletter',
        input: 'email',
        inputPlaceholder: 'Enter your email address'
    })

    if (email) {
        window.location.assign('?emailAddress=' + email);
    }
}

if (queryParameters().subscribeEmail === "true"){
    subscribeme();
}

// FOR MOBILES
if(window.matchMedia('(min-width:320px) and (max-width: 510px)').matches)
{
    $('#home_image_row').css('margin', '2rem 0');

    $('.swiper-slide').css('width', '100% !important');
    const swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 0,
        // slidesPerGroup: 3,
        loop: true,
        loopFillGroupWithBlank: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

}
// FOR LAPTOPS
if(window.matchMedia('(min-width:786px) and (max-width: 1520px)').matches)
{
    $('#home_image_slide').removeClass('col-12 col-8');
    $('#home_image_text').removeClass('col-12 col-8');
    $('#home_subscribe').removeClass('col-12 col-8');
    $('a.nav-link').css('font-size', 'small');

    const swiper = new Swiper('.swiper-container', {
        slidesPerView: 5,
        spaceBetween: 0,
        // slidesPerGroup: 3,
        loop: true,
        loopFillGroupWithBlank: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
}

// FOR DESKTOP
if(window.matchMedia('(min-width:1520px) and (max-width: 2500px)').matches)
{
    const swiper = new Swiper('.swiper-container', {
        slidesPerView: 6,
        spaceBetween: 0,
        // slidesPerGroup: 3,
        loop: true,
        loopFillGroupWithBlank: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    $('#home_image_slide').removeClass('col-12 col-8');
    $('#home_image_text').removeClass('col-12 col-8');
    $('#home_subscribe').removeClass('col-12 col-8');
}