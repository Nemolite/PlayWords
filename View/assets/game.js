/**
 * Created by user on 18.10.2017.
 */

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

var xhr = createObject();

function transfer() {
    var word = document.forms.wordform.word.value;
    console.log(word); //debug

    //validation

    if (3>=word.length){
        document.getElementById('debug').innerHTML = "Ваше слово слишком короткое";
    }

    // проверка на гласные а, о, и, е, ё, э, ы, у, ю, я

    var pattern =/^[аоиеёэыуюя]$/
   // if ()
/*
    var parametr =encodeURI(word);
    xhr.open('get', '/game?var='+parametr);
    xhr.onreadystatechange =  searchResults;
    xhr.send(null);
    */

}

function searchResults() {
    if(xhr.readyState == 4&& this.status == 200){
        var response = xhr.responseText;
        document.getElementById('debug').innerHTML = response;
    }
}