<?php if ($_GET[act]==''){ ?> 
            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data SMS Polling </h3>
                  <a class='pull-right btn btn-primary btn-sm' href='index.php?view=polling&act=tambah'>Tambahkan Data</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php 
                  if (isset($_GET['sukses'])){
                      echo "<div class='alert alert-success alert-dismissible fade in' role='alert'> 
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>×</span></button> <strong>Sukses!</strong> - Data telah Berhasil Di Proses,..
                          </div>";
                  }elseif(isset($_GET['gagal'])){
                      echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'> 
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>×</span></button> <strong>Gagal!</strong> - Data tidak Di Proses, terjadi kesalahan dengan data..
                          </div>";
                  }
                ?>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:30px'>No</th>
                        <th>Keyword</th>
                        <th>Pilihan</th>
                        <th>Total</th>
                        <th>Aktif</th>
                        <th style='width:40px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $tampil = mysql_query("SELECT * FROM polling ORDER BY id_polling DESC");
                    $no = 1;
                    while($r=mysql_fetch_array($tampil)){
                    if ($r[aktif]=='Y'){ $status = 'Ya'; }else{ $status = 'Tidak'; }
                    echo "<tr><td>$no</td>
                              <td>REG $r[keyword]</td>
                              <td>$r[pilihan]</td>
                              <td>$r[total]</td>
                              <td>$status</td>
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='index.php?view=polling&act=edit&id=$r[id_polling]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='index.php?view=polling&hapus=$r[id_polling]'><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                      }
                      if (isset($_GET[hapus])){
                          mysql_query("DELETE FROM polling where id_polling='$_GET[hapus]'");
                          echo "<script>document.location='index.php?view=polling';</script>";
                      }

                  ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
<?php 
}elseif($_GET[act]=='edit'){
    if (isset($_POST[update])){
        $query = mysql_query("UPDATE polling SET keyword = '$_POST[a]', pilihan = '$_POST[b]', total = '$_POST[c]', aktif = '$_POST[d]' where id_polling='$_POST[id]'");
        if ($query){
            echo "<script>document.location='index.php?view=polling&sukses';</script>";
        }else{
            echo "<script>document.location='index.php?view=polling&gagal';</script>";
        }
    }
    $edit = mysql_query("SELECT * FROM polling where id_polling='$_GET[id]'");
    $s = mysql_fetch_array($edit);
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data Polling</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$s[id_polling]'>
                    <tr><th width='120px' scope='row'>Keyword</th>    <td>REG <input type='text' class='form-control' name='a' value='$s[keyword]' style='width:60%; display:inline-block'> </td></tr>
                    <tr><th width='120px' scope='row'>Pilihan</th>  <td><input type='text' class='form-control' name='b' value='$s[pilihan]'></td></tr>
                    <tr><th width='120px' scope='row'>Total</th>  <td><input type='text' class='form-control' name='c' value='$s[t]otal'></td></tr>
                    <tr><th width='120px' scope='row'>Aktif</th>  <td>"; if ($s[aktif]=='Y'){ echo "<input type=radio name='d' value='Y' checked>Ya  <input type=radio name='d' value='N'>Tidak"; }else{ echo "<input type=radio name='d' value='Y'>Ya  <input type=radio name='d' value='N' checked>Tidak"; } echo "</td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='update' class='btn btn-info'>Update</button>
                    <a href='index.php?view=guru'><button class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
              </form>
            </div>";
}elseif($_GET[act]=='tambah'){
    if (isset($_POST[tambah])){
      $query = mysql_query("INSERT INTO polling VALUES('','$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]')");
      if ($query){
            echo "<script>document.location='index.php?view=polling&sukses';</script>";
      }else{
            echo "<script>document.location='index.php?view=polling&gagal';</script>";
      }
    }

    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Data Autoreply</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Keyword</th>    <td>REG  <input type='text' class='form-control' name='a' style='width:60%; display:inline-block'> </td></tr>
                    <tr><th width='120px' scope='row'>Pilihan</th>  <td><input type='text' class='form-control' name='b'></td></tr>
                    <tr><th width='120px' scope='row'>Total</th>  <td><input type='text' class='form-control' name='c' value='0'></td></tr>
                    <tr><th width='120px' scope='row'>Aktif</th>  <td><input type=radio name='d' value='Y' checked>Ya  <input type=radio name='d' value='N'>Tidak</td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='tambah' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php?view=guru'><button class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
              </form>
            </div>";
}
?>