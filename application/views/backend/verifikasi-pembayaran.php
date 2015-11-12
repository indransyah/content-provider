<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pembayaran
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
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Verifikasi Pembayaran</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID Pembayaran</th>
                  <th>ID Order</th>
                  <th>Tanggal</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($payment as $value) : ?>
                <tr>
                  <td><?=$value->payment_id ?></td>
                  <td><?=$value->order_id ?></td>
                  <td><?=tanggal($value->payment_date) ?></td>
                  <td><?=rupiah($value->payment_total) ?></td>
                  <td><?=ucwords($value->payment_status) ?></td>
                  <td>
                    <a class="btn btn-success btn-flat"  href="<?=base_url('dashboard/pembayaran/detail/'.$value->payment_id) ?>"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-danger btn-flat"  href="<?=base_url('dashboard/pembayaran/delete/'.$value->payment_id) ?>"><i class="fa fa-trash-o"></i></a>
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

