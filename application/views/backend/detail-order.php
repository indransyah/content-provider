Right side column. Contains the navbar and content of the page -->
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
        <div class="box box-solid box-info">
          <div class="box-header">
            <h3 class="box-title">Detail Order</h3>
          </div><!-- /.box-header -->
          <div class="box-body no-padding">
            <table class="table table-hover">
              <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th style="width: 400px"></th>
              </tr>
              <tr>
                <td><strong>Order ID</strong></td>
                <td><strong>:</strong> </td> 
                <td> <?=$order->order_id ?></td>
                <td><strong>Nama</strong></td>
                <td><strong>:</strong> <?=$order->customer_nama ?></td>
              </tr>
              <tr>
                <td><strong>Date</strong></td>
                <td><strong>:</strong></td>
                <td> <?=tanggal($order->order_date) ?></td>
                <td><strong>Telefon</strong></td>
                <td><strong>:</strong> <?=$order->customer_telefon ?></td>
              </tr>
              <tr>
                <td><strong>Paket</strong></td>
                <td><strong>:</strong></td>
                <td> <?=$order->paket_nama ?></td>
              </tr>
              <tr>
                <td><strong>Jumlah</strong></td>
                <td><strong>:</strong></td> 
                <td><?=$order->order_jumlah ?></td>
              </tr>
              <tr>
                <td><strong>Keterangan</strong></td>
                <td><strong>:</strong> </td>
                <td> <?=$order->order_keterangan ?></td>
              </tr>
              <tr>
                <td><strong>Total</strong></td>
                <td><strong>:</strong></td> 
                <td> <?=rupiah($order->order_total) ?></td>
              </tr>
              <tr>
                <td><strong>Status</strong></td>
                <td><strong>:</strong></tf> 
                  <td> <?=ucwords($order->order_status) ?></td>
                </tr>
              <?php if($order->order_status == 'pengerjaan') : ?>
              <form method="POST" action="<?=base_url('dashboard/job/add/'.$order->order_id) ?>">
              <tr>
                <td><strong>Tambahkan ke</strong></td>
                <td><strong>:</strong></tf> 
                <td>
                  <select name="kreator" class="form-control">
                    <?php foreach($kreator as $value) : ?>
                    <option value="<?=$value->kreator_id ?>"><?=$value->kreator_nama ?></option>
                    <?php endforeach; ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td><strong>Keuntungan</strong></td>
                <td><strong>:</strong></tf> 
                <td>
                  <input type="text" name="keuntungan" class="form-control" placeholder="dalam %">
                  <p><i>jika tidak diisi keuntungan 10%</i></p>
                </td>
              </tr>
              <tr>
                <td></td>
                <td></tf> 
                <td>
                  <button type="submit" class="btn btn-success">Tambah</button>
                </td>
              </tr>
              </form>
              <?php endif; ?>
              </table>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-solid box-info">
            <div class="box-header">
              <h3 class="box-title">Detail Paket</h3>
            </div><!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-hover">
                <tr>
                  <td><strong>Nama Paket</strong></td>
                  <td><strong>:</strong></td>
                  <td><?=$order->paket_nama ?></td>
                </tr>
                <tr>
                  <td><strong>Jenis Konten</strong></td>
                  <td><strong>:</strong></td>
                  <td><?=$order->konten_jenis ?></td>
                </tr>
                <tr>
                  <td><strong>Jumlah Konten</strong></td>
                  <td><strong>:</strong></td>
                  <td><?=$order->paket_jumlah ?></td>
                </tr>
                <tr>
                  <td><strong>Lama Pengerjaan</strong></td>
                  <td><strong>:</strong></td>
                  <td><?=$order->paket_jangkawaktu ?></td>
                </tr>
                <tr>
                  <td><strong>Deskripsi</strong></td>
                  <td><strong>:</strong></td>
                  <td><?=$order->paket_deskripsi ?></td>
                </tr>
                <tr>
                  <td><strong>Harga</strong></td>
                  <td><strong>:</strong></td>
                  <td><?=rupiah($order->paket_harga) ?></td>
                </tr>
              </table>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper