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
        <div class="box box-solid box-info">
          <div class="box-header">
            <h3 class="box-title">Detail Pembayaran</h3>
          </div><!-- /.box-header -->
          <div class="box-body no-padding">
            <table class="table table-hover">
              <tr>
                <th style="width: 130px"></th>
                <th></th>
                <th></th>
                <th style="width: 60px"></th>
                <th style="width: 80px"></th>
                <th style="width: 300px"></th>
              </tr>
              <tr>
                <td><strong>ID Pembayaran</strong></td>
                <td><strong>:</strong> </td> 
                <td> <?=$payment->payment_id ?></td>
                <td></td>
                <td><strong>Nama</strong></td>
                <td><strong>:</strong> <?=$payment->customer_nama ?></td>
              </tr>
              <tr>
                <td><strong>Tanggal</strong></td>
                <td><strong>:</strong></td>
                <td> <?=tanggal($payment->payment_date) ?></td>
                <td></td>
                <td><strong>Telefon</strong></td>
                <td><strong>:</strong> <?=$payment->customer_telefon ?></td>
              </tr>
              <tr>
                <td><strong>Keterangan</strong></td>
                <td><strong>:</strong></td>
                <td> <?=$payment->payment_keterangan ?></td>
                <td></td>
                <td><strong>ID Order</strong></td>
                <td><strong>:</strong> <?=$payment->order_id ?></td>
              </tr>
              <tr>
                <td><strong>Status</strong></td>
                <td><strong>:</strong></tf> 
                  <td> <?=ucwords($payment->payment_status) ?></td>
                </tr>
              </table>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <div class="container">
                <div class="row-fluid">
                  <form method="POST" action="<?=base_url('dashboard/pembayaran/detail/'.$payment->payment_id) ?>">
                  <div class="col-md-4">
                    <select name="status" class="form-control">
                      <option value="belum diverifikasi" <?php if ($payment->payment_status == 'belum diverifikasi') echo 'selected' ?>>Belum Diverifikasi</option>
                      <option value="lunas" <?php if ($payment->payment_status=='lunas') echo 'selected' ?>>LUNAS</option>
                    </select>
                  </div>
                  <div class="col-md-8">
                    <button type="submit" class="btn btn-success btn-flat">Ubah</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div><!-- /.box -->
        </div>
      </div>
    </div>
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
