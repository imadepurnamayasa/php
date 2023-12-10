window.addEventListener("DOMContentLoaded", function() {
    var form_barang = document.getElementById("form_barang");
    
    data_barang();

    form_barang.addEventListener("submit", function(event) {
        data_barang(form_barang);
        event.preventDefault();
        event.stopPropagation();
        return;
    });

    function data_barang(form_barang) {
        var xhttp = new XMLHttpRequest();
        var data = new FormData(form_barang);
        data.append("submit", "cari");
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("data").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", "ajax/ajax_data.php", true);
        xhttp.send(data);
    }
});