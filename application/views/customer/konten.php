<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Konten
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
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Lihat Konten</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Tanggal</th>
                  <th>Paket</th>
                  <th>Jumlah</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 4.0</td>
                    <td>Win 95+</td>
                    <td> 4</td>
                    <td>
                      <button class="btn btn-block btn-info btn-flat"><i class="fa fa-eye"></i> Lihat</button>
                    </td>
                  </tr>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 5.0</td>
                      <td>Win 95+</td>
                      <td>5</td>
                      <td>
                        <button class="btn btn-block btn-info btn-flat"><i class="fa fa-eye"></i> Lihat</button>
                      </td>
                    </tr>
                    <tr>
                      <td>Trident</td>
                      <td>Internet
                        Explorer 5.5</td>
                        <td>Win 95+</td>
                        <td>5.5</td>
                        <td><button class="btn btn-block btn-info btn-flat"><i class="fa fa-eye"></i> Lihat</button>
                        </td>
                      </tr>
                      <tr>
                        <td>Trident</td>
                        <td>Internet
                          Explorer 6</td>
                          <td>Win 98+</td>
                          <td>6</td>
                          <td>
                            <button class="btn btn-block btn-info btn-flat"><i class="fa fa-eye"></i> Lihat</button>
                          </td>
                        </tr>
                        <tr>
                          <td>Trident</td>
                          <td>Internet Explorer 7</td>
                          <td>Win XP SP2+</td>
                          <td>7</td>
                          <td>
                            <button class="btn btn-block btn-info btn-flat"><i class="fa fa-eye"></i> Lihat</button>
                          </td>
                        </tr>
                        <tr>
                          <td>Trident</td>
                          <td>AOL browser (AOL desktop)</td>
                          <td>Win XP</td>
                          <td>6</td>
                          <td>
                            <button class="btn btn-block btn-info btn-flat"><i class="fa fa-eye"></i> Lihat</button>
                          </td>
                        </tr>
                        <tr>
                          <td>Gecko</td>
                          <td>Firefox 1.0</td>
                          <td>Win 98+ / OSX.2+</td>
                          <td>1.7</td>
                          <td>
                            <button class="btn btn-block btn-info btn-flat"><i class="fa fa-eye"></i> Lihat</button>
                          </td>
                        </tr>
                        <tr>
                          <td>Gecko</td>
                          <td>Firefox 1.5</td>
                          <td>Win 98+ / OSX.2+</td>
                          <td>1.8</td>
                          <td>
                            <button class="btn btn-block btn-info btn-flat"><i class="fa fa-eye"></i> Lihat</button>
                          </td>
                        </tr>
                        <tr>
                          <td>Gecko</td>
                          <td>Firefox 2.0</td>
                          <td>Win 98+ / OSX.2+</td>
                          <td>1.8</td>
                          <td>
                            <button class="btn btn-block btn-info btn-flat"><i class="fa fa-eye"></i> Lihat</button>
                          </td>
                        </tr>
                        <tr>
                          <td>Gecko</td>
                          <td>Firefox 3.0</td>
                          <td>Win 2k+ / OSX.3+</td>
                          <td>1.9</td>
                          <td>
                            <button class="btn btn-block btn-info btn-flat"><i class="fa fa-eye"></i> Lihat</button>
                          </td>
                        </tr>
                        <tr>
                          <td>Gecko</td>
                          <td>Camino 1.0</td>
                          <td>OSX.2+</td>
                          <td>1.8</td>
                          <td>
                            <button class="btn btn-block btn-info btn-flat"><i class="fa fa-eye"></i> Lihat</button>
                          </td>
                        </tr>
                        <tr>
                          <td>Gecko</td>
                          <td>Camino 1.5</td>
                          <td>OSX.3+</td>
                          <td>1.8</td>
                          <td>
                            <button class="btn btn-block btn-info btn-flat"><i class="fa fa-eye"></i> Lihat</button>
                          </td>
                        </tr>
                        <tr>
                          <td>Gecko</td>
                          <td>Netscape 7.2</td>
                          <td>Win 95+ / Mac OS 8.6-9.2</td>
                          <td>1.7</td>
                          <td>
                            <button class="btn btn-block btn-info btn-flat"><i class="fa fa-eye"></i> Lihat</button>
                          </td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Order ID</th>
                          <th>Tanggal</th>
                          <th>Paket</th>
                          <th>Jumlah</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </section><!-- /.content -->
        </div>
        <!-- page script -->
        <script type="text/javascript">
        $(function () {
          $("#example1").dataTable();
          $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
          });
        });
      </script> 