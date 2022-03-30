var ajax_container = document.getElementById('ajax-container');
var ajax_button = document.getElementById('ajax-button');

ajax_button.addEventListener('click', function () {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            ajax_container.innerHTML = xhr.responseText;
        }
    }

    xhr.open('GET', '/ajax/coba.blade.php', true);
    xhr.send();

});
