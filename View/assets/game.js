/**
 * Created by user on 18.10.2017.
 */
// The block is AJAX for send word to server
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

function searchResults() {
    if(xhr.readyState == 4&& this.status == 200){
        var response = xhr.responseText;
        document.getElementById('debug').innerHTML = response;
    }
}

// end AJAX




// action

function transfer() {
    var word = document.forms.wordform.word.value;
    console.log(word); //debug

    //validation
    valid(word);

    check_to_repeat(word);
}



function valid(word) {

    if (3>=word.length){
        document.getElementById('debug').innerHTML = "Ваше слово слишком короткое";
    }

    // проверка на гласные а, о, и, е, ё, э, ы, у, ю, я

    var pattern_g =/^[аоиеёэыуюя]$/

    // проверка на согласные б, в, г, д, ж, з, й, к, л, м, н, п, р, с, т, ф, х, ц, ч, ш, щ

    var pattern_s =/^[бвгджзйклмнпрстфхцчшщ]$/

    //  больше трех подряд гласных или согласных букв

        // code

    // не содержит какие-либо символы, кроме символов русского алфавита

    // code

    var check = check_to_repeat(word);

    if (check) {
        // слово в соответствующее поле
    }


}

function check_to_repeat(word){ // проверяем и запоминаем

    // filter

    myArray = stackWords();

    myArray = myArray.filter(function(x) {
        return x !== undefined && x !== null;
    });

    console.log(myArray);

    var parametr = myArray.indexOf(word);

    if (-1==parametr){
        stackWords(word);

        return true;
    }else{

        if (isNumber(parametr)) {
            document.getElementById('debug').innerHTML = "Уже было";
            return false;
        }
    }



    //closure

    function stackWords() {
        var numberOfCalls = [];
        if (arguments.length!=0)
            var w = arguments[0];
        return function(w) {
            numberOfCalls.push(w);
            console.log(numberOfCalls);
            return numberOfCalls;
        }

    }









}