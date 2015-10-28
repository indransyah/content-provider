<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Detail Konten
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
            <h3 class="box-title">Detail Konten</h3>
          </div><!-- /.box-header -->
          <div class="box-body no-padding">
            <form role="form" action="<?=base_url('dashboard/konten/detail/'.$konten->konten_id)?>" method="post">
              <table class="table table-hover">
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th style="width: 400px"></th>
                </tr>
                <tr>
                  <td><strong>Konten ID</strong></td>
                  <td><strong>:</strong> </td> 
                  <td><?=$konten->konten_id?></td>
                  <td><strong>Kreator</strong></td>
                  <td><strong>:</strong> <?=$konten->kreator_nama?></td>
                </tr>
                <tr>
                  <td><strong>Download</strong></td>
                  <td><strong>:</strong></td> 
                  <td> <a href="<?=base_url('upload/'.$konten->konten_file)?>"><?=$konten->konten_file?></a> </td>
                  <td><strong>Telefon</strong></td>
                  <td><strong>:</strong> <?=$konten->kreator_telfon?></td>
                </tr>
               <!--  <tr>
                  <td><strong>Paket</strong></td>
                  <td><strong>:</strong></td>
                  <td> A2</td>
                </tr>
                <tr>
                  <td><strong>Jumlah</strong></td>
                  <td><strong>:</strong></td> 
                  <td>2</td>
                </tr> 
                <tr>
                  <td><strong>Download</strong></td>
                  <td><strong>:</strong></td> 
                  <td> <a href="#"> Link Download</a> </td>
                </tr> -->
                <tr>
                  <td><strong>Keterangan</strong></td>
                  <td><strong>:</strong> </td>
                  <td><?=$konten->konten_keterangan?></td>
                </tr>
                <tr>
                  <td><strong>Status Saat Ini</strong></td>
                  <td><strong>:</strong> </td>
                  <td><?=ucwords($konten->konten_status)?></td>
                </tr>
                <tr>
                  <td><strong>Komentar</strong></td>
                  <td><strong>:</strong></td> 
                  <td> <?php echo form_error('komentar'); ?><textarea name="komentar" class="form-control" rows="3" placeholder="Komentar..."><?=$konten->konten_komentar?></textarea></td>
                </tr>
                <tr>
                  <td><strong>Status</strong></td>
                  <td><strong>:</strong></td> 
                  <td><?php echo form_error('status'); ?>
                    <select name="status" class="form-control">
                        <option value="diterima" <?php if (set_value('status', $konten->konten_status) == 'diterima')  echo 'selected'; ?>>Terima</option>
                        <option value="ditolak" <?php if (set_value('status', $konten->konten_status) == 'ditolak')  echo 'selected'; ?>>Tolak</option>
                      </select>
                    </td>
                </tr>
                <tr>
                  <td></td>
                  <td></td> 
                  <td><button type="submit" class="btn btn-success">Simpan</button></td>
                </tr>
              </table>
            </form>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <div class="box box-solid box-info">
          <div class="box-header">
            <h3 class="box-title">Detail Order</h3>
          </div><!-- /.box-header -->
          <div class="box-body no-padding">
            <table class="table table-hover">
              <tr>
                <td><strong>Order ID</strong></td>
                <td><strong>:</strong></td>
                <td><a href="<?=base_url('dashboard/order/detail/'.$konten->order_id)?>"><?=$konten->order_id?></a></td>
              </tr>
              <tr>
                <td><strong>Customer</strong></td>
                <td><strong>:</strong></td>
                <td><?=$konten->customer_nama?></td>
              </tr>
              <tr>
                <td><strong>Date</strong></td>
                <td><strong>:</strong></td>
                <td><?=tanggal($konten->order_date)?></td>
              </tr>
              <!-- <tr>
                <td><strong>Paket</strong></td>
                <td><strong>:</strong></td>
                <td>A2</td>
              </tr> -->
              <tr>
                <td><strong>Jumlah</strong></td>
                <td><strong>:</strong></td>
                <td><?=$konten->order_jumlah?></td>
              </tr>
              <tr>
                <td><strong>Keterangan</strong></td>
                <td><strong>:</strong></td>
                <td><?=$konten->order_keterangan?></td>
              </tr>
              <tr>
                <td><strong>Total</strong></td>
                <td><strong>:</strong></td>
                <td><?=rupiah($konten->order_total)?></td>
              </tr>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

