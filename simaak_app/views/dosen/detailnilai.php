Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Detail Nilai
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=base_url('dosen/nilai')?>">Penilaian</a></li>
        <li class="active">Input Nilai</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">
<?=$nama_matkul.' - '.$kelas.' - '.$this->session->tahun_ajaran?>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
            
<div>

</div>
            <br/>

            <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nim</th>
                  <th>Nama</th>
                  <th>Nilai</th>
                  <th>Aksi</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                foreach ($jadwal as $key => $value) {
                  echo "<tr>";
                  echo "<td>".$i++."</td>";
                  echo "<td>".$value['nim']."</td>";
                  echo "<td>".$value['nama_mhs']."</td>";
                ?>
<td>
<select name="nilaiMhs">
  <option>---</option>
  <option value="A">A</option>
  <option value="AB">AB</option>
  <option value="B">B</option>
  <option value="BC">BC</option>
  <option value="C">C</option>
  <option value="CD">CD</option>
  <option value="D">D</option>
  <option value="DE">DE</option>
  <option value="E">E</option>
</select>
</td>
<td>
  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> input</button>
</td>

                <?php

                  echo "</tr>";
                }
                ?>
              </tbody>

            </table>


<!-- <div class="text-center">
    <ul class="pagination pagination-sm">
        <?php echo $link?>
    </ul>    
</div> -->
<a href="<?=base_url('dosen/nilai')?>" class="btn btn-primary btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper