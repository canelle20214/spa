function toggleDisplay(idelmt) {
    if (typeof idelmt == "string")
        elmt = document.getElementById(idelmt);
    if (elmt.style.display == "grid")
        $('#' + idelmt).css("display","");
    else
        elmt.style.display = "grid";
}

function onMiniatureMenuClick() {
    var elem = document.getElementById('menu-items-ul-out')
    if (elem.className == "navbar-miniature-visible") {
        elem.className = "navbar-miniature";
    } else {
        elem.className = "navbar-miniature-visible";  
    }
}