/**
 * Created by user on 14.10.2017.
 */
function send() {
        var word = document.forms.wordform.word.value;

        console.log(word);
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(1);
                document.getElementById("result_user").innerHTML = this.responseText;
            }
            else
            {
                console.log(0);
                document.getElementById("result_user").innerHTML = "Error";
            }
        };
        xhr.open("POST", "Controller/game.php");
        xhr.send(word);

 }


