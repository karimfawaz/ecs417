let clear = document.getElementById('clear');

clear.onclick = function clearTxt() {
    if (confirm("Are you sure you would like to reset?")) {
        document.getElementById("title").value = "";
        document.getElementById("body").value = "";
    }
}


let form = document.getElementById('postForm');

form.onsubmit = function(e) {

    if (document.getElementById("body").value === "") {
        e.preventDefault();
        alert("Your post body cannot be empty!");
        document.getElementById("body").style.borderColor = 'red';
        document.getElementById("body").style.backgroundColor = 'red';

    }

    if (document.getElementById("title").value === "") {
        e.preventDefault();
        alert("Your title cannot be empty!");
        document.getElementById("title").style.borderColor = 'red';
        document.getElementById("title").style.backgroundColor = 'red';
    }

}



let preview = document.getElementById('previewBtn');

preview.onclick = function clearTxt() {

    document.getElementById("overlay").style.display = "block";
    let postTitle = document.getElementById("title").value;
    let postBody = document.getElementById("body").value;
    let previewTitle = document.getElementById("previewTitle");
    let previewBody = document.getElementById("previewBody");
    previewTitle.innerHTML = postTitle;
    previewTitle.style.color = 'black';
    previewTitle.style.fontWeight = 'bold';
    previewTitle.style.fontSize = '200%';
    previewBody.innerHTML = postBody;
    previewBody.style.color = 'black';


}

let back = document.getElementById('backBtn');

back.onclick = function clearTxt() {

    document.getElementById("overlay").style.display = "none";

}