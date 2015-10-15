<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Paket
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Paket</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-solid box-success">
          <div class="box-header">
            <h3 class="box-title">Detail Paket</h3>
          </div><!-- /.box-header -->
          <form role="form">
            <div class="box-body">
              <div class="form-group">
                <label for="namapaket">Nama Paket</label>
                <input type="text" class="form-control" id="namapaket" placeholder="Nama Paket">
              </div>
              <div class="form-group">
                <label for="jeniskonten">Jenis Konten</label> <br>
                <input type="text" class="form-control" id="jeniskonten" placeholder="Jenis Konten"
              </div>
              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" rows="4" placeholder="Deskripsi"></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Jangka Waktu</label>
                <input type="text" class="form-control" id="jangkawaktu" placeholder="Jangka Waktu">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Harga</label>
                <input type="text" class="form-control" id="harga" placeholder="Harga">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Jumlah Koten</label>
                <input type="text" class="form-control" id="jumlahkonten" placeholder="Jumlah Konten">
              </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-success btn-flat">Save</button>
            </div>
          </form>
        </div>   
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->