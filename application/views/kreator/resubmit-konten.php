Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Resubmit Konten
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
        <?php echo validation_errors(); ?>
        <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('danger')) : ?>
        <div class="alert alert-danger"><?php echo $this->session->flashdata('danger'); ?></div>
        <?php endif; ?>
        <?php if ($error) : ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <div class="box box-solid box-warning">
          <div class="box-header">
            <h3 class="box-title">Resubmit Konten</h3>
          </div><!-- /.box-header -->
          <div class="box-body no-padding">
            <?php echo form_open_multipart('kreator/konten/resubmit/'.$konten->konten_id);?>
              <div class="box-body">
                <div class="form-group">
                  <label>Job ID</label>
                  <?=$konten->job_id ?>
              </div>
              <?php if ($konten->konten_status=='ditolak') : ?>
              <div class="form-group">
                  <label>Komentar Admin</label><br>
                  <?=$konten->konten_komentar ?>
              </div>
              <?php endif; ?>
              <div class="form-group">
                <label>Nama</label>
                <?php echo form_error('nama'); ?>
                <input name="nama" class="form-control" placeholder="Nama" value="<?php echo set_value('nama', $konten->konten_nama); ?>">
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <?php echo form_error('keterangan'); ?>
                <textarea name="keterangan" class="form-control" rows="3" placeholder="Keterangan..."><?php echo set_value('keterangan', $konten->konten_keterangan); ?></textarea>
              </div>
              <div class="form-group">
                <label>File</label>
                <?php echo form_error('file'); ?>
                <p>File yang sudah diupload : <a href="<?=base_url('uploads/'.$konten->konten_file)?>"><?=$konten->konten_file?></a></p>
                <input name="file" type="file">
                <p><small><i>File akan otomatis diperbaruhi jika file baru diupload!</i></small></p>
              </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
  </div>
</section><!-- /.content -->
</div><!-- /.content-wrapper