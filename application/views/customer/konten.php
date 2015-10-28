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
    <div class="box box-warning">
      <div class="box-header">
        <h3 class="box-title">Konten</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="table" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Order ID</th>
              <th>Nama</th>
              <th>Keterangan</th>
              <th>File</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($konten as $value): ?>
            <tr>
              <td><?=$value->konten_id?></td>
              <td><a href="<?=base_url('customer/order/detail/'.$value->order_id) ?>"><?=$value->order_id?></a></td>
              <td><?=$value->konten_nama?></td>
              <td><?=$value->konten_keterangan?></td>
              <td><?=$value->konten_file?></td>
              <td>
                <a href="<?=base_url('uploads/'.$value->konten_file) ?>" class="btn btn-block btn-info btn-flat"><i class="fa fa-download"></i></a>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->


