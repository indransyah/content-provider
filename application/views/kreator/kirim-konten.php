Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Konten
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
        <?php if ($error) : ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <div class="box box-solid box-warning">
          <div class="box-header">
            <h3 class="box-title">Kirim Konten</h3>
          </div><!-- /.box-header -->
          <div class="box-body no-padding">
            <?php echo form_open_multipart('kreator/konten/submit');?>
              <div class="box-body">
                <div class="form-group">
                  <label>Job ID</label>
                  <?php echo form_error('job'); ?>
                  <select name="job" class="form-control">
                    <?php foreach($job as $value) : ?>
                    <option value="<?=$value->job_id?>" <?php if (set_value('job') == $value->job_id)  echo 'selected'; ?>><?=$value->job_id?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Nama</label>
                <?php echo form_error('nama'); ?>
                <input name="nama" class="form-control" placeholder="Nama" value="<?php echo set_value('nama'); ?>">
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <?php echo form_error('keterangan'); ?>
                <textarea name="keterangan" class="form-control" rows="3" placeholder="Keterangan..."><?php echo set_value('keterangan'); ?></textarea>
              </div>
              <div class="form-group">
                <label>File</label>
                <?php echo form_error('file'); ?>
                <input name="file" type="file">
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