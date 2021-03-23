function check() {
    if(document.getElementById('image').files.length > 0) {
        document.getElementById('uploaded').innerHTML = "<input class = 'upload' type = 'submit' value = 'Upload photo' />";
        document.getElementById('uploaded').style.fontsize = "small";
    }
}

function update (id, id_button, id_name, id_age, id_description) {
    button_value = document.getElementById(id_button).value;
    if (button_value == "Update") {
        document.getElementById(id_name).innerHTML = "<input type = 'text' name='nameP' id='nameN' value ='" + document.getElementById(id_name).innerHTML + "'>";
        document.getElementById(id_age).innerHTML = "<input type = 'text' name='ageP' id='ageN' value ='" + document.getElementById(id_age).innerHTML + "'>";
        document.getElementById(id_description).innerHTML = "<input type = 'text' name='descriptionP' id='descriptionN' value ='" + document.getElementById(id_description).innerHTML + "'>";
        document.getElementById(id_button).value = "Apply changes";
    } else {
        newName = document.getElementById("nameN").value;
        newAge = document.getElementById("ageN").value;
        newDescription = document.getElementById("descriptionN").value;
        window.location.replace("update.php?id=" + id + "&name=" + newName + "&age=" + newAge + "&description=" + newDescription);
    }
}