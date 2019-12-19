// Home | Ayodraws.com
let home = document.URL.indexOf("index") >= 0;
let about = document.URL.indexOf("/about") >= 0;
let contact = document.URL.indexOf("/contact") >= 0;
let gallery = document.URL.indexOf("/gallery") >= 0;
let admin = document.URL.indexOf("/admin") >= 0;
let paintings = document.URL.indexOf("/paintings") >= 0;
let shows = document.URL.indexOf("/shows") >= 0;
let shows_details = document.URL.indexOf("/shows-details") >= 0;

let title_el = document.querySelector("title");
let home_logo = document.querySelector(".ms-logo");

if(home){
    title_el.innerHTML = "Home | kelechinwaneri.com";
}
if(about){
    title_el.innerHTML = "About Kelechi | kelechinwaneri.com";
}
if(contact){
    title_el.innerHTML = "Contact | kelechinwaneri.com";
}
if(gallery){
    title_el.innerHTML = "Gallery | kelechinwaneri.com";
}
if(admin){
    title_el.innerHTML = "Admin Dashboard | kelechinwaneri.com";
}
if(paintings){
    title_el.innerHTML = "Paintings | kelechinwaneri.com";
}
if(shows){
    title_el.innerHTML = "Shows | kelechinwaneri.com";
}
if(shows_details){
    title_el.innerHTML = "Shows Details | kelechinwaneri.com";
}

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