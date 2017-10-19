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

window.onload = function(){
    document.getElementById("Login").onclick = function(){
        location.replace("/login");
    };
    document.getElementById("Register").onclick = function(){
        location.replace("/register");
    };


};

document.getElementById("Index").onclick = function(){
    location.replace("/");
};


// delete words (admin panel)

function delete_words(obj){
    console.log(obj.id)
    var id_delete = encodeURI(obj.id);
    console.log(id_delete)
    var name_value = obj.value;
    console.log(name_value)




    var http = createObject(); //AJAX

    http.open('get',"/Core/del.php?id="+id_delete);
    http.onreadystatechange = function() {
        if(http.readyState == 4){
            var response = http.responseText;
            console.log(response);
            document.getElementById('res_del').innerHTML = response;
        }
    }
    http.send(null);


}

function createObject() {
    var request_type;
    var browser = navigator.appName;

    if(browser == "Microsoft Internet Explorer"){
        request_type = new ActiveXObject("Microsoft.XMLHTTP");
    } else {
        request_type = new XMLHttpRequest();
    }
    return request_type;
}

function searchResults() {
    if(http.readyState == 4){
        var response = http.responseText;
        console.log(response);
        document.getElementById('res_del').innerHTML = response;
    }
}







