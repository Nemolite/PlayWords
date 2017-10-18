/**
 * Created by user on 18.10.2017.
 */
function send() {
    var word = document.forms.wordform.word.value;
    console.log(word);
    document.getElementById("debug").innerHTML = word;


/*
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
           document.getElementById("debug").innerHTML = "super";
        }
        else
        {

            document.getElementById("debug").innerHTML = "Error";
        }
    };


    xhr.open("POST", "/game");
    xhr.send(word);
 */
}