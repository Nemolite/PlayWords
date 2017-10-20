/**
 * Created by user on 18.10.2017.
 */
// The block is AJAX for send word to server

function send(word) {

    var xhr = new XMLHttpRequest();
    console.log(word);
    var word = encodeURI(word);
    console.log(word);


    xhr.open('get',"/Core/startup.php?word="+word);
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4){
            var response = xhr.responseText;
            console.log(response);

            document.getElementById('debug2').innerHTML = '<p>'+response+'</p>';
            
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
var tmp_arr = [];
function transfer() {

    var word = document.forms.wordform.word.value;

    var parametr = valid(word);

    if (parametr) {
        send(word);
    }

}



function valid(word) {

    if (3>=word.length){
        document.getElementById('debug').innerHTML = "Ваше слово слишком короткое";
        return false;
    }

    // проверка на гласные а, о, и, е, ё, э, ы, у, ю, я

    var pattern_g =/^[аоиеёэыуюя]$/

    // проверка на согласные б, в, г, д, ж, з, й, к, л, м, н, п, р, с, т, ф, х, ц, ч, ш, щ

    var pattern_s =/^[бвгджзйклмнпрстфхцчшщ]$/

    //  больше трех подряд гласных или согласных букв

        // code

    // не содержит какие-либо символы, кроме символов русского алфавита

    // code

    //проверка на свопадение

    if (tmp_arr.indexOf(word)) {
        tmp_arr.push(word);
        console.log(tmp_arr);
        document.getElementById('debug').innerHTML = word;
        // ход computer
        return true;
    } else {
        document.getElementById('debug').innerHTML = "Уже было, придумай другое";
        return false;
    }

}



