var feedback = function(res) {
    if (res.success === true) {
        var get_link = res.data.link.replace(/^http:\/\//i, 'https://');
        location.assign("admin?slider_image_link=" + get_link);
    }
};

new Imgur({
    clientid: '8a991c311172d9d', //You can change this ClientID
    callback: feedback
});