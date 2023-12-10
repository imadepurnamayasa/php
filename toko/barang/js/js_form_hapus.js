window.addEventListener("DOMContentLoaded", function() {
    var form_barang = document.form_barang;

    form_barang.addEventListener("submit", function(event) {
        form_hapus(form_barang);
        event.preventDefault();
        event.stopPropagation();
        return;
    });

    function form_hapus() {
        if (form_barang.submit.value === "hapus") {
            var xhttp = new XMLHttpRequest();
            var data = new FormData(form_barang);
            data.append("submit", "hapus");
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("data").innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", "ajax/ajax_hapus.php", true);
            xhttp.send(data);
        }
    }
});