function ageCheck() {
    if(!Number.isInteger(parseInt(document.getElementById('age').value))) {
        document.getElementById('notNumber').innerHTML = "Age must be a number!";
        document.getElementById('notNumber').style.border = "solid hotpink 1px";
        document.getElementById('notNumber').style.padding = "2px 2px 2px 2px";
    } else {
        document.getElementById('notNumber').innerHTML = "";
        document.getElementById('notNumber').style.border = "0px";
    }
}

function check() {
    if(document.getElementById('image').files.length > 0) {
        document.getElementById('uploaded').innerHTML = "Image is uploaded!";
        document.getElementById('uploaded').style.border = "solid hotpink 1px";
        document.getElementById('uploaded').style.padding = "2px 2px 2px 2px";
    }
}