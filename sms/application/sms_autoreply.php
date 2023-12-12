<?php if ($_GET[act]==''){ ?> 
            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data SMS Autoreply </h3>
                  <a class='pull-right btn btn-primary btn-sm' href='index.php?view=autoreply&act=tambah'>Tambahkan Data</a>
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
                        <th>Reply</th>
                        <th style='width:40px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $tampil = mysql_query("SELECT * FROM autoreply ORDER BY keyword DESC");
                    $no = 1;
                    while($r=mysql_fetch_array($tampil)){
                    echo "<tr><td>$no</td>
                              <td>INFO $r[keyword]</td>
                              <td>$r[reply]</td>
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='index.php?view=autoreply&act=edit&id=$r[keyword]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='index.php?view=autoreply&hapus=$r[keyword]'><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                      }
                      if (isset($_GET[hapus])){
                          mysql_query("DELETE FROM autoreply where keyword='$_GET[hapus]'");
                          echo "<script>document.location='index.php?view=autoreply';</script>";
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
        $query = mysql_query("UPDATE autoreply SET keyword = '$_POST[a]', reply = '$_POST[b]' where keyword='$_POST[id]'");
        if ($query){
            echo "<script>document.location='index.php?view=autoreply&sukses';</script>";
        }else{
            echo "<script>document.location='index.php?view=autoreply&gagal';</script>";
        }
    }
    $edit = mysql_query("SELECT * FROM autoreply where keyword='$_GET[id]'");
    $s = mysql_fetch_array($edit);
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data Autoreply</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$s[keyword]'>
                    <tr><th width='120px' scope='row'>Keyword</th> <td>INFO <input type='text' class='form-control' name='a' value='$s[keyword]' style='width:60%; display:inline-block'> </td></tr>
                    <tr><th width='120px' scope='row'>Autoreply</th> <td><textarea rows='6' class='form-control' name='b' placeholder='Tuliskan Pesan anda (Max 160 Karakter)...' onKeyDown=\"textCounter(this.form.b,this.form.countDisplay);\" onKeyUp=\"textCounter(this.form.b,this.form.countDisplay);\" required>$s[reply]</textarea> 
                    <input type='number' name='countDisplay' size='3' maxlength='3' value='160' style='width:10%; text-align:center; border:1px solid #cecece; margin-top:4px' readonly> Sisa Karakter</td></tr>
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
      $query = mysql_query("INSERT INTO autoreply VALUES('$_POST[a]','$_POST[b]')");
      if ($query){
            echo "<script>document.location='index.php?view=autoreply&sukses';</script>";
      }else{
            echo "<script>document.location='index.php?view=autoreply&gagal';</script>";
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
                    <tr><th width='120px' scope='row'>Keyword</th> <td>INFO <input type='text' class='form-control' name='a' style='width:60%; display:inline-block'> </td></tr>
                    <tr><th width='120px' scope='row'>Autoreply</th> <td><textarea rows='6' class='form-control' name='b' placeholder='Tuliskan Pesan anda (Max 160 Karakter)...' onKeyDown=\"textCounter(this.form.b,this.form.countDisplay);\" onKeyUp=\"textCounter(this.form.b,this.form.countDisplay);\" required></textarea> 
                    <input type='number' name='countDisplay' size='3' maxlength='3' value='160' style='width:10%; text-align:center; border:1px solid #cecece; margin-top:4px' readonly> Sisa Karakter</td></tr>
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