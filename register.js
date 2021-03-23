function len() {
    if (document.getElementById('pass').value.length < 8){
        document.getElementById('message1').innerHTML = '<br /> At least 8 characters long! <br />';
    } else {
        document.getElementById('message1').innerHTML = '<br /><br />';
    }
}

function check() {
    if (document.getElementById('pass').value == document.getElementById('passConf').value) {
        document.getElementById('message2').innerHTML = '<img src="./images/green_checkmark.png" alt="matching"></img>';
    } else {
        document.getElementById('message2').innerHTML = '<img src="./images/red_x.png" alt="not matching"></img>';
    }
}

