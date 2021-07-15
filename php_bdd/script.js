b1 = document.getElementById('b1');
changepass = document.getElementById('changepass');

b1.addEventListener('click', showpasschange)
function showpasschange() {
    if (changepass.style.display != "block") {
        changepass.style.display = "block";
    } else {
        changepass.style.display ="none";
    }
}