<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo get_field_setting('NAMA_APLIKASI'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/bootstrap/css/bootstrap-responsive.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/bootstrap/css/docs.css') ?>" rel="stylesheet">

        <link href="<?php echo base_url('assets/jquery/css/black-tie/jquery-ui-1.10.3.custom.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/choosen/chosen.css') ?>" rel="stylesheet">

        <!-- Le javascript -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="<?php echo base_url('assets/bootstrap/js/jquery-1.9.1.js'); ?>"></script>
        <script src="<?php echo base_url('assets/jquery/js/jquery-ui-1.10.3.custom.js'); ?>"></script>
        <script src="<?php echo base_url('assets/choosen/chosen.jquery.js'); ?>"></script>
        <script src="<?php echo base_url('assets/bootstrap/js/bootstrap-transition.js'); ?>"></script>
        <script src="<?php echo base_url('assets/bootstrap/js/bootstrap-modal.js'); ?>"></script>
        <script src="<?php echo base_url('assets/bootstrap/js/bootstrap-dropdown.js'); ?>"></script>

        <script src="<?php echo base_url('assets/jquery/js/jquery.currency.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/contents.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/identitas.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/update_password.js'); ?>"></script>

    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <div class="pull-left" style="margin-top: 15px; margin-left: -10px; width: 44px;">
                        <div id="custome-loading"></div>
                    </div>
                    <a href="<?php echo site_url('users/sign_out'); ?>" class="btn pull-right btn-danger btn-small" style="margin-left: 50px;" title="Keluar Aplikasi"><i class="icon-off"></i></a>
                    <a class="brand" href="<?php echo site_url('welcome'); ?>"><?php echo get_field_setting('NAMA_APLIKASI'); ?></a>                    
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" role="button" id="drop2" href="#">Master Data <b class="caret"></b></a>
                                <ul aria-labelledby="drop2" role="menu" class="dropdown-menu">
                                    <li><a data-url="<?php echo site_url('master/identitas/load_data_identitas'); ?>" href="#modal_identitas" id="id_modal_identitas" data-toggle="modal" role="button">Identitas Perusahaan</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo site_url('master/golongan/') ?>" role="menuitem">Data Gol/Kel Barang</a></li>
                                    <li><a href="<?php echo site_url('master/jenis') ?>" role="menuitem">Data Jenis Barang</a></li>
                                    <li><a href="<?php echo site_url('master/produk') ?>" role="menuitem">Data Produk</a></li>
                                    <li><a href="<?php echo site_url('master/barang') ?>" role="menuitem">Data Master Barang</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo site_url('master/pemasok/'); ?>" role="menuitem">Data Pemasok(Suplier)</a></li>
                                    <li><a href="<?php echo site_url('master/pelanggan/'); ?>" role="menuitem">Data Pelanggan(Customer)</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" role="button" id="drop2" href="#">Mutasi <b class="caret"></b></a>
                                <ul aria-labelledby="drop2" role="menu" class="dropdown-menu">
                                    <li><a href="<?php echo site_url('mutasi/pembelian/'); ?>" role="menuitem">Pembelian</a></li>
                                    <li><a href="<?php echo site_url('mutasi/penjualan/tambah'); ?>" role="menuitem">Penjualan</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo site_url('mutasi/retur_pembelian/tambah'); ?>" role="menuitem">Retur Pembelian</a></li>
                                    <li><a href="<?php echo site_url('mutasi/retur_penjualan/tambah'); ?>" role="menuitem">Retur Penjualan</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo site_url('mutasi/repacking/tambah'); ?>" role="menuitem">Repacking</a></li>
                                    <li><a href="<?php echo site_url('mutasi/pemusnahan/tambah'); ?>" role="menuitem">Pemusnahan</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo site_url('mutasi/stock_opname'); ?>" role="menuitem">Stock Opname</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" role="button" id="drop2" href="#">Hutang/Piutang <b class="caret"></b></a>
                                <ul aria-labelledby="drop2" role="menu" class="dropdown-menu">
                                    <!--<li><a href="<?php //echo site_url('hutang/bayar/periksa/'); ?>" role="menuitem">Periksa->Hutang</a></li>-->
                                    <li><a href="<?php echo site_url('hutang/bayar/'); ?>" role="menuitem">Hutang</a></li>
                                    <!--<li class="divider"></li>-->
                                    <!--<li><a href="<?php //echo site_url('piutang/bayar/periksa/'); ?>" role="menuitem">Periksa->Piutang</a></li>-->
                                    <li><a href="<?php echo site_url('piutang/bayar/'); ?>" role="menuitem">Piutang</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" role="button" id="drop2" href="#">Laporan <b class="caret"></b></a>
                                <ul aria-labelledby="drop2" role="menu" class="dropdown-menu">
                                    <li><a href="#myModalLaporan" data-toggle="modal" role="button">Lap. Kode Stock</a></li>
                                    <li><a href="#myModalLaporan" data-toggle="modal" role="button">Lap. Saldo Stock</a></li>
                                    <li><a href="#myModalLaporan" data-toggle="modal" role="button">Lap. Reorder Stock</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#myModalLaporan" data-toggle="modal" role="button">Lap. Akum Bulanan Pembelian</a></li>
                                    <li><a href="#myModalLaporan" data-toggle="modal" role="button">Lap. Akum Bulanan Penjualan</a></li>                                    
                                    <li class="divider"></li>
                                    <li><a href="#myModalLaporan" data-toggle="modal" role="button">Lap. Hutang</a></li>
                                    <li><a href="#myModalLaporan" data-toggle="modal" role="button">Lap. Piutang</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo site_url('laporan/kartu_barang/') ?>" role="menuitem">Lap. Kartu Barang</a></li>
                                    <li><a href="<?php echo site_url('laporan/gudang/') ?>" data-toggle="modal" role="button">Lap. Gudang</a></li>
                                    <li><a href="<?php echo site_url('laporan/buku_pembelian/') ?>" data-toggle="modal" role="button">Lap. Buku Pembelian</a></li>
                                    <li><a href="<?php echo site_url('laporan/gudang/buku_penjualan/') ?>" data-toggle="modal" role="button">Lap. Buku Penjualan</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" role="button" id="drop2" href="#">Utility <b class="caret"></b></a>
                                <ul aria-labelledby="drop2" role="menu" class="dropdown-menu">
                                    <li><a href="<?php echo site_url('utility/pengaturan/'); ?>" role="menuitem">Pengaturan Apps</a></li>
                                    <li><a href="<?php echo site_url('utility/users/'); ?>" role="menuitem">Data Users</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo site_url('utility/backup/'); ?>" role="menuitem">Backup Database</a></li>
                                    <li><a href="<?php echo site_url('utility/restore/'); ?>" role="menuitem">Restore Database</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>


        <div style="margin-top: 20px;">
            <div class="container-fluid">
