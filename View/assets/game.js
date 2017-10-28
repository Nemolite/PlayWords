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

           // console.log(response);

             arr = response.split(',')
             console.log(arr);
             console.log(arr[0]);
             console.log(arr[1]);
             console.log(arr[2]);
             console.log(arr[3]);

             if ("true"===arr[0]){
                 var rep = "Такое слово уже было"
                 document.getElementById('debug2').innerHTML = '<p>'+rep+'</p>';
             }

            if ("true"===arr[2]){
                var lost = "Я проиграл"
                document.getElementById('debug2').innerHTML = '<p>'+lost+'</p>';
            }

            if (("false"===arr[0])&&("false"===arr[2])){
            var node_user =document.createElement('p');
            node_user.innerHTML = '<p>'+arr[1]+'</p>';

            var node_computer =document.createElement('p');
            node_computer.innerHTML = '<p>'+arr[3]+'</p>';


            result_user.appendChild(node_user);
            result_computer.appendChild(node_computer);
           // document.getElementById('debug2').innerHTML = '<p>'+response+'</p>';
            }

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







