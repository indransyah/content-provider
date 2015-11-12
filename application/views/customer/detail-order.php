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
                <td><?=$order->order_id?></td>
              </tr>
              <tr>
                <td><strong>Tanggal</strong></td>
                <td><strong>:</strong></td>
                <td><?=tanggal($order->order_id)?></td>
              </tr>
              <tr>
                <td><strong>Paket</strong></td>
                <td><strong>:</strong></td>
                <td><?=$order->paket_nama?></td>
              </tr>
              <tr>
                <td><strong>Jumlah</strong></td>
                <td><strong>:</strong></td> 
                <td><?=$order->order_jumlah?></td>
              </tr>
              <tr>
                <td><strong>Keterangan</strong></td>
                <td><strong>:</strong> </td>
                <td><?=$order->order_keterangan?></td>
              </tr>
              <tr>
                <td><strong>Total</strong></td>
                <td><strong>:</strong></td> 
                <td><?=rupiah($order->order_total)?></td>
              </tr>
              <tr>
                <td><strong>Status</strong></td>
                <td><strong>:</strong></tf> 
                  <td><?=$order->order_status?></td>
                </tr>
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
                  <td><?=$order->paket_nama?></td>
                </tr>
                <tr>
                  <td><strong>Jenis Konten</strong></td>
                  <td><strong>:</strong></td>
                  <td><?=$order->konten_jenis?></td>
                </tr>
                <tr>
                  <td><strong>Jumlah Konten</strong></td>
                  <td><strong>:</strong></td>
                  <td><?=$order->paket_jumlah?></td>
                </tr>
                <tr>
                  <td><strong>Lama Pengerjaan</strong></td>
                  <td><strong>:</strong></td>
                  <td><?=$order->paket_jangkawaktu?></td>
                </tr>
                <tr>
                  <td><strong>Deskripsi</strong></td>
                  <td><strong>:</strong></td>
                  <td><?=$order->paket_deskripsi?></td>
                </tr>
                <tr>
                  <td><strong>Harga</strong></td>
                  <td><strong>:</strong></td>
                  <td><?=rupiah($order->paket_harga)?></td>
                </tr>
              </table>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->