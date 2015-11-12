<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Paket
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
        <div class="box box-success">
          <div class="box-header">
            <h3 class="box-title">Tambah Paket</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form method="POST" action="<?php echo base_url('dashboard/paket/add') ?>" role="form">
            <div class="box-body">
              <div class="form-group">
                <label>Nama Paket</label>
                <?php echo form_error('nama'); ?>
                <input type="text" class="form-control" name="nama" value="<?php echo set_value('nama'); ?>">
              </div>
              <div class="form-group">
                <label>Jenis Konten</label> <br>
                <?php echo form_error('jenis'); ?>
                <div class="btn-group">
                  <select name="jenis" class="form-control">
                    <option value="teks" <?php if (set_value('jenis') == 'teks')  echo 'selected'; ?>>Teks</option>
                    <option value="gambar" <?php if (set_value('jenis') == 'gambar')  echo 'selected'; ?>>Gambar</option>
                    <option value="audio" <?php if (set_value('jenis') == 'audio')  echo 'selected'; ?>>Audio</option>
                    <option value="video" <?php if (set_value('jenis') == 'video')  echo 'selected'; ?>>Video</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label>Deskripsi</label>
                <?php echo form_error('deskripsi'); ?>
                <textarea name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi"><?php echo set_value('deskripsi'); ?></textarea>
              </div>
              <div class="form-group">
                <label>Jangka Waktu</label>
                <?php echo form_error('waktu'); ?>
                <input type="text" class="form-control" name="waktu" placeholder="Jangka Waktu" value="<?php echo set_value('waktu'); ?>">
              </div>
              <div class="form-group">
                <label>Harga</label>
                <?php echo form_error('harga'); ?>
                <input type="text" class="form-control" name="harga" placeholder="Harga" value="<?php echo set_value('harga'); ?>">
              </div>
              <div class="form-group">
                <label>Jumlah Koten</label>
                <?php echo form_error('jumlah'); ?>
                <input type="text" class="form-control" name="jumlah" placeholder="Jumlah Konten" value="<?php echo set_value('jumlah'); ?>">
              </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary btn-flat">Kirim</button>
            </div>
          </form>
        </div>
      </div>
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

