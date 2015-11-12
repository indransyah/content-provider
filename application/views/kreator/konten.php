<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Konten
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Konten</li>
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
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Daftar Konten</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Job ID</th>
              <th>Nama</th>
              <th>Keterangan</th>
              <th>File</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($konten as $value) : ?>
            <tr>
              <td><?=$value->job_id ?></td>
              <td><?=$value->konten_nama ?></td>
              <td><?=$value->konten_keterangan ?></td>
              <td><a href="<?=base_url('uploads/'.$value->konten_file) ?>"><?=$value->konten_file?></a></td>
              <td><?=ucwords($value->konten_status) ?></td>
              <td>
                <?php if($value->konten_status == 'ditolak'): ?>
                <a class="btn btn-block btn-info btn-flat" href="<?=base_url('kreator/konten/resubmit/'.$value->konten_id) ?>"><i class="fa fa-refresh"></i></a>
                <?php endif; ?>
                <a class="btn btn-block btn-danger btn-flat" href="<?=base_url('kreator/konten/delete/'.$value->konten_id) ?>"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

