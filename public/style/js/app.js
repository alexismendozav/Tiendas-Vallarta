/* require("./bootstrap"); */

//EditProduct

$(document).on("change", "#image1", function (e) {
    addImage(e);
});
$(document).on("change", "#image2", function (e) {
    addImage(e);
});
$(document).on("change", "#image3", function (e) {
    addImage(e);
});

$(document).on("click", "#delete_img1", function (e) {
    $("#image1").attr("src", "https://ui-avatars.com/api/?name=1&size=255");
    $(".file1").val("");
});

$(document).on("click", "#delete_img2", function (e) {
    $("#image2").attr("src", "https://ui-avatars.com/api/?name=2&size=255");
    $(".file2").val("");
});

$(document).on("click", "#delete_img3", function (e) {
    $("#image3").attr("src", "https://ui-avatars.com/api/?name=3&size=255");
    $(".file3").val("");
});

function addImage(e) {
    var file = e.target.files[0],
        imageType = /image.*/;

    var id = e.target.id;
    if (!file.type.match(imageType)) return;
    var reader = new FileReader();
    reader.onload = function (e) {
        var result = e.target.result;
        $("#" + id + "").attr("src", result);
    };

    reader.readAsDataURL(file);
}
