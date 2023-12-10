window.addEventListener("DOMContentLoaded", function() {
    const form_barang = document.getElementById("form_barang");
    
    data_barang();

    form_barang.addEventListener("submit", function(event) {
        data_barang();
        event.preventDefault();
        event.stopPropagation();
        return;
    });

    function data_barang() {
        const data = new FormData(form_barang);
        data.append("submit", "cari");

        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("data").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", "ajax/ajax_data.php", true);
        xhttp.send(data);
    }
});