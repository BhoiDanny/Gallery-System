const st = $.noConflict();
st(document).ready(() => {
    let userHref;
    let userHrefSplit;
    let userId;
    let imageSrc;
    let imageSrcSplit;
    let imageName;

st(".modal_thumbnails").click(function () {
    st("#set_user_image").prop("disabled", false);
    userHref = st("#user-id").prop("href");
    userHrefSplit = userHref.split("=");
    /*userId = userHrefSplit[userHrefSplit.length - 1]; OR*/
    userId = userHrefSplit[1];

    imageSrc = st(this).prop("src");
    imageSrcSplit = imageSrc.split("/");
    /*imageId = imageHrefSplit[imageHrefSplit.length - 1]; OR*/
    imageName = imageSrcSplit[imageSrcSplit.length - 1];

});

st("#set_user_image").click(function () {
    st.ajax({
        url: "includes/ajax_code.php",
        data: { userId: userId, imageName: imageName },
        method: "POST",
        success: (data) => {
            if(!data.error) {
                st(".user-image-box a img").attr("src", data);
            }
        }
    })
});



    tinymce.init({selector: "textarea"});
})