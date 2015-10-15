 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Order
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
        <h3 class="box-title">Lihat Order</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="tabel" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Order ID</th>
              <th>Tanggal</th>
              <th>Paket</th>
              <th>Jumlah</th>
              <th>Total</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($order as $value) : ?>
            <tr>
              <td><?=$value->order_id ?></td>
              <td><?=tanggal($value->order_date) ?></td>
              <td><?=$value->paket_nama ?></td>
              <td><?=$value->order_jumlah ?></td>
              <td><?=rupiah($value->order_total) ?></td>
              <td><?=ucwords($value->order_status) ?></td>
              <td>
                <a class="btn btn-success btn-flat"  href="<?=base_url('customer/order/confirm/'.$value->order_id) ?>"><i class="fa fa-check"></i></a>
                <a class="btn btn-danger btn-flat"  href="<?=base_url('customer/order/delete/'.$value->order_id) ?>"><i class="fa fa-trash-o"></i></a>
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
</div>
<!-- page script -->
