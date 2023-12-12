<?php
    echo "<form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
            <div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Kirimkan Banyak Pesan Singkat (SMS)</h3>
                </div>
              <div class='box-body'>";

                  if (isset($_POST['submit2'])){
                      $sms = $_POST['sms'];
                      $group = $_POST['group'];
                  
                      if ($group == "Semua"){
                          $query = "SELECT * FROM pbk";
                      }else{
                          $query = "SELECT * FROM pbk WHERE GroupID = '$group'";
                      }
                      
                      $hasil = mysql_query($query);
                      while ($data = mysql_fetch_array($hasil)){
                      $nohp = $data['Number'];
                        sendsms($nohp, $sms, '');   
                      }
                        if ($hasil){
                          echo "<div class='alert alert-success alert-dismissible fade in' role='alert'> 
                              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>×</span></button> <strong>Success!</strong> - ".mysql_num_rows($hasil)." Pesan SMS dikirim,...
                              </div>";
                        }else{
                          echo "<center style='color:red; padding:15px 0px'>Pengiriman SMS gagal,...</center>";
                        } 
                  }

                echo "<table class='table table-condensed table-bordered'>
                  <tbody>
                  	<tr><th width=120px scope='row'>Group</th>  <td>
                      <select class='form-control' name='group'>
                      <option value='Semua' selected>Kirimkan ke Semua</option>";

                        $query = "SELECT * FROM pbk_groups";
                          $hasil = mysql_query($query);
                          while ($data = mysql_fetch_array($hasil)){
                               echo "<option value='".$data['ID']."'>Kirimkan ke ".$data['Name']."</option>";
                          }  

                    echo "</select></td></tr>
                    <tr><th scope='row'>Isi Pesan</th>           	<td><textarea rows='6' class='form-control' name='sms' placeholder='Tuliskan Pesan anda (Max 160 Karakter)...' onKeyDown=\"textCounter(this.form.pesan,this.form.countDisplay);\" onKeyUp=\"textCounter(this.form.pesan,this.form.countDisplay);\" required></textarea>
                    													<input type='number' name='countDisplay' size='3' maxlength='3' value='160' style='width:10%; text-align:center; border:1px solid #cecece; margin-top:4px' readonly> Sisa Karakter</td></tr>
                  </tbody>
                  </table>
              </div>

              <div class='box-footer'>
                    <button type='submit' name='submit2' class='btn btn-info'>Kirimkan Pesan</button>
                    <button type='reset' class='btn btn-default pull-right'>Reset</button>
              </div>
            </div>
          </form>";