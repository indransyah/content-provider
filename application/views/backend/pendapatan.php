<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pendapatan
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Pendapatan</li>
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
        <h3 class="box-title">Total Pendapatan : <?=rupiah($total->pendapatan_jumlah)?></h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="table" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Job ID</th>
              <th>Order Total</th>
              <th>Keuntungan</th>
              <th>Pendapatan</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($pendapatan as $value) : ?>
            <tr>
              <td><?=$value->pendapatan_id ?></td>
              <td><?=$value->job_id ?></td>
              <td><?=rupiah($value->order_total) ?></td>
              <td><?=100-$value->job_keuntungan ?>%</td>
              <td><?=rupiah($value->pendapatan_jumlah) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

