document.getElementById("default").click();
function selTab(evt, tab){
    var i, tablink, tabcontent;

    tabcontent = document.getElementsByClassName("tabcontent");
    tablink = document.getElementsByClassName("tabLi");

    for(i=0; i<tabcontent.length; i++){
        tabcontent[i].style.display = "none";
    }

    for(i=0; i<tablink.length; i++){
        tablink[i].className = tablink[i].className.replace(" active", "");
    }
    document.getElementById(tab).style.display = "block";
    evt.currentTarget.className += " active";

}
