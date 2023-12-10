window.addEventListener("DOMContentLoaded", function() {
    const form_barang = document.form_barang;

    form_barang.addEventListener("submit", function(event) {
        form_hapus();
        event.preventDefault();
        event.stopPropagation();
        return;
    });

    function form_hapus() {
        if (form_barang.submit.value === "hapus") {
            const url = new URL(window.location.href);
            const searchParams = url.searchParams;
            
            const data = new FormData(form_barang);
            data.append("id", searchParams.get('id'));
            data.append("submit", "hapus");

            const xhttp = new XMLHttpRequest();
            xhttp.onprogress = function() {
                document.getElementById("data").innerHTML = "proses";
            };
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