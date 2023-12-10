window.addEventListener("DOMContentLoaded", function() {
    var form_barang = document.form_barang;

    form_barang.addEventListener("submit", function(event) {
        form_hapus(form_barang);
        event.preventDefault();
        event.stopPropagation();
        return;
    });

    function form_hapus() {
        if (form_barang.submit.value === "ya") {
            alert("ya");
        } else {
            alert();
        }
    }
});