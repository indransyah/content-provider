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
        <div class="box box-success">
          <div class="box-header">
            <h3 class="box-title">Konfirmasi Pembayaran</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form role="form" method="POST" action="<?=base_url('customer/payment/confirm') ?>">
            <div class="box-body">
              <div class="form-group">
                <label>Order</label> <br>
                <!-- Single button -->
                <div class="btn-group">
                  <select name="order" class="form-control">
                    <?php foreach ($order as $value) : ?>
                    <option value="<?=$value->order_id ?>"><?=$value->order_id ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label>Jumlah</label>
                <?=form_error('jumlah'); ?>
                <input name="jumlah" type="text" class="form-control" placeholder="Jumlah" value="<?=set_value('jumlah'); ?>">
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <?=form_error('keterangan'); ?>
                <textarea name="keterangan" class="form-control" rows="3" placeholder="Keterangan"><?=set_value('keterangan'); ?></textarea>
              </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary btn-flat">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div><!-- /.row -->
  </section><!-- /.content -->
</div>