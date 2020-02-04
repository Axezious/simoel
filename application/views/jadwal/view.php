<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap.css">

<!-- DataTables -->
<script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- page script -->
<!--  <script>
  $(function () {
    $("#example1").DataTable();
  });
</script> -->


<div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Mobil</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            <?php if($this->session->flashdata('info')) { ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $this->session->flashdata('info'); ?>
              </div>
            <?php } ?>

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Pegawai</th>
                  <th>Nama Kendaraan</th>
                  <th>Nama Driver</th>
                  <th>Tujuan</th>
                  <th>Kepentingan</th>
                  <th>Tanggal Berangkat</th>
                  <th>Lama Waktu Dinas</th>
                  <th>Status Perjalanan</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  
                  foreach($jadwal as $row) {
                  ?>         
                    <tr>
                      <td><?php echo $row->idJadwal; ?></td>
                      <td><?php echo $row->namaPegawai; ?></td>
                      <td><?php echo $row->namaKendaraan; ?></td>
                      <td><?php echo $row->namaDriver; ?></td>
                      <td><?php echo $row->tujuan; ?></td>
                      <td><?php echo $row->kepentingan; ?></td>
                      <td><?php echo $row->tglBerangkat; ?></td>
                      <td><?php echo $row->lamaWaktu; ?></td>
                      <td><?php echo $row->statusPerjalanan; ?></td>
                      <td>
                        <button type="submit" class="btn btn-primary" onclick="location.href='<?=base_url()?>jadwal/edit/<?php echo $row->idJadwal; ?>'"><i class="fa fa-fw fa-edit"></i>Edit</button>
                        <button type="submit" class="btn btn-danger" onclick="if(confirm('Apakah anda yakin akan menghapus <?php echo $row->tujuan; ?>?')) window.location.href='<?=base_url()?>jadwal/hapus/<?php echo $row->idJadwal; ?>';"><i class="fa fa-fw fa-trash-o"></i>Delete</button>
                      </td>
                    </tr>
                <?php
                  }
                ?>  
                </tbody>
                <!-- <tfoot>
                <tr>
                 <th>No.</th>
                  <th>Nama Merk</th>
                  <th>Action</th>
                </tr>
                </tfoot> -->
              </table>
            </div>
            <!-- /.box-body -->
          </div>