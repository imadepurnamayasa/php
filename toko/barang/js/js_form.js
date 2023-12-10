window.addEventListener("DOMContentLoaded", function() {
    const form_barang = document.form_barang;

    form_barang.addEventListener("submit", function(event) {
        if (form_validasi()) {
            form_simpan();
        }
        event.preventDefault();
        event.stopPropagation();
        return;
    });

    function form_reset() {
        document.getElementById("pesan_penjual_id").innerHTML = "";
        document.getElementById("pesan_nama_barang").innerHTML = "";
        document.getElementById("pesan_nama_dagang").innerHTML = "";
        document.getElementById("pesan_kategori_id").innerHTML = "";
        document.getElementById("pesan_merek_id").innerHTML = "";
        document.getElementById("pesan_satuan_id").innerHTML = "";
        document.getElementById("pesan_margin_penjualan").innerHTML = "";
    }

    function form_validasi() {
        form_reset();
        if (form_barang.penjual_id.value === "") {
            document.getElementById("pesan_penjual_id").innerHTML = "Penjual belum di pilih.";
            return false;
        } else if (form_barang.nama_barang.value === "") {
            document.getElementById("pesan_nama_barang").innerHTML = "Nama barang belum diisi.";
            return false;
        } else if (form_barang.nama_dagang.value === "") {
            document.getElementById("pesan_nama_dagang").innerHTML = "Nama dagang belum diisi.";
            return false;
        } else if (form_barang.kategori_id.value === "") {
            document.getElementById("pesan_kategori_id").innerHTML = "Kategori belum di pilih.";
            return false;
        } else if (form_barang.merek_id.value === "") {
            document.getElementById("pesan_merek_id").innerHTML = "Merek belum di pilih.";
            return false;
        } else if (form_barang.satuan_id.value === "") {
            document.getElementById("pesan_satuan_id").innerHTML = "Satuan belum di pilih.";
            return false;
        } else if (form_barang.margin_penjualan.value === "") {
            document.getElementById("pesan_margin_penjualan").innerHTML = "Margin penjualan belum di isi.";
            return false;
        } else {
            return true;
        }
    }

    function form_simpan() {
        if (form_barang.submit.value === "simpan") {
            const url = new URL(window.location.href);
            const searchParams = url.searchParams;

            const data = new FormData(form_barang);
            data.append("id", searchParams.get('id'));
            data.append("submit", "simpan");

            const xhttp = new XMLHttpRequest();
            xhttp.onprogress = function() {
                document.getElementById("data").innerHTML = "proses";
            };
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("data").innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", "ajax/ajax_simpan.php", true);
            xhttp.send(data);
        }
    }
});