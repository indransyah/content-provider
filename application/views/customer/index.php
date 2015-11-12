<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Customer | Dashboard</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 3.3.2 -->
  <link href="<?php echo base_url('assets/backend/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
  <!-- Font Awesome Icons -->
  <link href="<?php echo base_url('assets/backend/Font-Awesome-master/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css" />
  <!-- Ionicons -->
  <link href="<?php echo base_url('assets/backend/ionicons/css/ionicons.min.css'); ?>" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="<?php echo base_url('assets/backend/dist/css/AdminLTE.min.css'); ?>" rel="stylesheet" type="text/css" />
  <!-- DATA TABLES -->
  <link href="<?php echo base_url('assets/backend/plugins/datatables/dataTables.bootstrap.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
    folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url('assets/backend/dist/css/skins/_all-skins.min.css'); ?>" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
      </head>
      <body class="skin-blue">
        <div class="wrapper">

          <?php echo $header; ?>
          <!-- Left side column. contains the logo and sidebar -->
          <?php echo $sidebar; ?>

          <?php echo $content; ?>
          <?php echo $footer; ?>

        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.3 -->
        <script src="<?php echo base_url('assets/backend/plugins/jQuery/jQuery-2.1.3.min.js'); ?>"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url('assets/backend/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url('assets/backend/plugins/fastclick/fastclick.min.js'); ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url('assets/backend/dist/js/app.min.js'); ?>" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="<?php echo base_url('assets/backend/plugins/sparkline/jquery.sparkline.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="<?php echo base_url('assets/backend/plugins/datatables/jquery.dataTables.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/backend/plugins/datatables/dataTables.bootstrap.js'); ?>" type="text/javascript"></script>
        <!-- SlimScroll -->
        <script src="<?php echo base_url('assets/backend/plugins/slimScroll/jquery.slimscroll.min.js'); ?>" type="text/javascript"></script> 
        <!-- page script -->
        <script type="text/javascript">
        $(document).ready(function() {
          $('#tabel').dataTable({
            //"aaSorting": [[0,'desc']],
            "bSort": false,
            "oLanguage": {
              "sUrl": "//cdn.datatables.net/plug-ins/f2c75b7247b/i18n/Indonesian.json"
            }
          });
        });
        </script>
      </body>
      </html>



