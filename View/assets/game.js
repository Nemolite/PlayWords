/**
 * Created by user on 18.10.2017.
 */
// The block is AJAX for send word to server

function send(word) {

    var xhr = new XMLHttpRequest();
    var word = encodeURI(word);

    xhr.open('get',"/Core/startup.php?word="+word);
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4){
            var response = xhr.responseText;
            console.log(response);
            var node =document.createElement('p');
            node.innerHTML = '<p>'+response+'</p>';

            // разобрать response который придет от сервера
            // ожидается массив из двух слов result (word_user, word_comuter)

            result_user.appendChild(node);
            //document.getElementById('debug2').innerHTML = '<p>'+response+'</p>';

        }
    }
    xhr.send(null);

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



// end AJAX

// action

function transfer() {
    var word = document.forms.wordform.word.value;
    send(word);

}







