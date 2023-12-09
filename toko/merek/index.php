<h1>MEREK</h1>
<form action="">
    <table>
        <tr>
            <td>MEREK</td>
            <td>:</td>
            <td><input type="text"></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><button>Cari</button></td>
        </tr>
    </table>
</form>
<a href="form.php"><button>Tambah</button></a>
<table>
    <tr>
        <th>ID</th>
        <th>MEREK</th>
        <th>AKSI</th>
    </tr>
    <tr>
        <td>1</td>
        <td>CONTOH</td>
        <td>
            <select name="" id="" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                <option value="">- PILIH -</option>
                <option value="form.php?id=">Ubah</option>
                <option value="form_hapus.php?id=">Hapus</option>
            </select>
        </td>  
    </tr>
</table>