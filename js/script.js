
function clear_container() {
    var container = document.getElementById("container");
    while (container.firstChild) {
        container.removeChild(container.firstChild);
    }
}

function get_meme() {

    clear_container();

    var timestamp = new Date().getTime(); // Pridani timestampu do URL, aby se obrazek nacital vzdy znovu

    var img = document.createElement("img");
    img.src = "memegen.php?" + timestamp
    img.id = "meme";
    img.height = 500;
    document.getElementById("container").appendChild(img);
}

function initials() {

    clear_container();

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        document.getElementById("container").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "initials.php", true);
    xhttp.send();
}

function calulation3() {

    clear_container();

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        document.getElementById("container").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "calculation3.php", true);
    xhttp.send();
}

function createdAt() {

    clear_container();

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        document.getElementById("container").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "createdAt.php", true);
    xhttp.send();
}

function calculation5() {

        clear_container();

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("container").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "calculation5.php", true);
        xhttp.send();
}