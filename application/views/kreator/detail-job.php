<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Job
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('danger')) : ?>
        <div class="alert alert-danger"><?php echo $this->session->flashdata('danger'); ?></div>
        <?php endif; ?>
        <div class="box box-solid box-warning">
          <div class="box-header">
            <h3 class="box-title">Detail Job</h3>
          </div><!-- /.box-header -->
          <div class="box-body no-padding">
            <table class="table table-hover">
              <tr>
                <th></th>
                <th></th>
                <th></th>
              </tr>
              <tr>
                <td><strong>Jobs ID</strong></td>
                <td><strong>:</strong></td> 
                <td><?=$job->job_id ?></td>
              </tr>
              <!-- <tr>
                <td><strong>Date</strong></td>
                <td><strong>:</strong></td>
                <td> 23-08-2015</td>
              </tr> -->
              <tr>
                <td><strong>Paket</strong></td>
                <td><strong>:</strong></td>
                <td><?=$job->paket_nama ?></td>
              </tr>
              <tr>
                <td><strong>Keterangan</strong></td>
                <td><strong>:</strong> </td>
                <td><?=$job->order_keterangan ?></td>
              </tr>
              <tr>
                <td><strong>Jumlah</strong></td>
                <td><strong>:</strong></td> 
                <td><?=$job->order_jumlah ?></td>
              </tr>
              <tr>
                <td><strong>Total</strong></td>
                <td><strong>:</strong></td> 
                <td><?=rupiah($job->order_total) ?></td>
              </tr>
              <tr>
                <td><strong>Gaji</strong></td>
                <td><strong>:</strong></td> 
                <td><?=(rupiah($job->order_total*($job->job_keuntungan/100))).' ('.$job->job_keuntungan.'% dari '.rupiah($job->order_total).')' ?></td>
              </tr>
            </table>
          </div><!-- /.box-body -->
          <?php if($job->job_status == 'belum diverifikasi') : ?>
          <div class="box-footer">
            <div class="row">
              <div class="col-xs-2 pull-right">  
                <a class="btn btn-success btn-flat" href="<?=base_url('kreator/job/terima/'.$job->job_id) ?>"></i>  Terima</a>
                <a class="btn btn-danger btn-flat" href="<?=base_url('kreator/job/tolak/'.$job->job_id) ?>"></i>  Tolak</a>
              </div>
            </div>
          </div>
          <?php endif; ?>
          <?php if($job->job_status == 'diterima') : ?>
          <div class="box-footer">
            <div class="row">
              <div class="col-xs-2 pull-right">  
                progress
                <a class="btn btn-primary btn-flat" href="<?=base_url('kreator/job/progress/'.$job->job_id) ?>"></i>  Submit</a><!--  atau <a class="btn btn-success btn-flat" href="<?=base_url('kreator/job/progress/'.$job->job_id) ?>"></i> Kirim Konten</a> <i>(jika sudah selesai)</i> -->
              </div>
            </div>
            <br>
          </div>
          <?php endif; ?>
        </div><!-- /.box -->
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-solid box-warning">
          <div class="box-header">
            <h3 class="box-title">Detail Paket</h3>
          </div><!-- /.box-header -->
          <div class="box-body no-padding">
            <table class="table table-hover">
              <tr>
                <td><strong>Nama Paket</strong></td>
                <td><strong>:</strong></td>
                <td><?=$job->paket_nama ?></td>
              </tr>
              <tr>
                <td><strong>Jenis Konten</strong></td>
                <td><strong>:</strong></td>
                <td><?=$job->konten_jenis ?></td>
              </tr>
              <tr>
                <td><strong>Jumlah Konten</strong></td>
                <td><strong>:</strong></td>
                <td><?=$job->paket_jumlah ?></td>
              </tr>
              <tr>
                <td><strong>Lama Pengerjaan</strong></td>
                <td><strong>:</strong></td>
                <td><?=$job->paket_jangkawaktu ?></td>
              </tr>
              <tr>
                <td><strong>Deskripsi</strong></td>
                <td><strong>:</strong></td>
                <td><?=$job->paket_deskripsi ?></td>
              </tr>
              <tr>
                <td><strong>Harga</strong></td>
                <td><strong>:</strong></td>
                <td><?=rupiah($job->paket_harga) ?></td>
              </tr>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->