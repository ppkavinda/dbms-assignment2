function active(ele) {
    var lis = document.getElementsByClassName("navli");
    for (var i = 0; i < lis.length; i++) {
        lis[i].className = lis[i].className.replace(" activenav", "");
    }
    ele.className += " activenav";

}
