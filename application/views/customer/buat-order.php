<!-- Right side column. Contains the navbar and content of the page -->
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
        <div class="box box-success">
          <div class="box-header">
            <h3 class="box-title">Buat Order</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form role="form" method="POST" action="<?=base_url('customer/order/add') ?>">
            <div class="box-body">
              <div class="form-group">
                <label>Paket</label> <br>
                <!-- Single button -->
                <div class="btn-group">
                  <select name="paket" class="form-control">
                    <?php foreach ($paket as $value) : ?>
                    <option value="<?=$value->paket_id ?>"><?=$value->paket_nama.' @ '.rupiah($value->paket_harga) ?></option>
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
              <!-- <div class="form-group">
                <label for="exampleInputPassword1">Total : </label>
                <label for="exampleInputPassword1">Rp100000</label>
              </div> -->
            </div><!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary btn-flat">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

