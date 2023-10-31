var album = [];
for (var i = 0; i < 5; i++) {
    album[i] = new Image();
    album[i].src = "./upload/anh" + i + ".jpg";
}
var interval = setInterval(slideshow, 2000);
index = 0;
function slideshow() {
    index++;
    if (index > 4) {
        index = 0;
    }
    document.getElementById("banner").src = album[index].src;


}
function next() {
    index++;
    if (index > 4) {
        index = 0;
    }
    document.getElementById("banner").src = album[index].src;

}
function pre() {
    index--;
    if (index < 0) {
        index = 4;
    }
    document.getElementById("banner").src = album[index].src;

}

function resetEmail() {
    // Đặt giá trị email về giá trị mặc định của bạn
    document.getElementById("email").value = ""; // Thay thế bằng giá trị mặc định cần đặt lại
}
