<?php $ceks = $this->session->userdata('no_pendaftaran'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PPDB Online SMP NEGERI 4 TAPUNG</title>
    <base href="<?php echo base_url(); ?>" />

    <link rel="icon" href="assets/images/logo.png" type="image/x-icon" />
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/freelancer.css" rel="stylesheet">
</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom bxshad">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top"><img src="img/logo.png" alt="Logo" width="30" style="position:absolute;margin-top:-10px;"> <span style="margin-left:35px;">PPDB Online</span> </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#portfolio"><img src="img/logo.png" alt="Logo" width="15"> Tentang Sekolah</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about"><i class="fa fa-info-circle"></i> Informasi</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact"><i class="fa fa-phone-square"></i> Kontak Kami</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <?php
        if (strtolower($this->uri->segment(1)) == 'logcs') {
            $this->load->view('web/login');
        } ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="img/logo.png" style="margin-top:-15%;margin-bottom:-10px;" width="100">
                    <div class="intro-text"><br>
                        <span class="name shad" style="font-size:35px">PPDB ONLINE <br> SMP NEGERI 4 TAPUNG</span>

                        <br>
                        <?php if ($web_ppdb->status_ppdb == 'buka') { ?>
                            <span class="skills">
                                <a href="files/smp4_tapung.pdf" class="btn btn-danger btn-lg"><i class="fa fa-file-pdf-o faa-pulse animated"></i> &nbsp;Download Panduan PPDB Online</a>
                            </span>
                            <br> <br>
                           
                            <br>
                            <span>
                                <a href="pendaftaran" class="btn btn-primary btn-lg" style="width:300px;margin:5px;"><i class="fa fa-file faa-pulse animated"></i> &nbsp;Pendaftaran PPDB Online</a>
                                <a href="logcs" class="btn btn-primary btn-lg" style="width:300px;margin:5px;"><i class="fa fa-users faa-pulse animated"></i> &nbsp;<?php if ($ceks == '') {
                                                                                                                                                                        echo "Login";
                                                                                                                                                                    } else {
                                                                                                                                                                        echo "Panel";
                                                                                                                                                                    } ?> Calon Siswa</a>
                                <br>
                            </span>
                        <?php } else { ?>
                            <span class="skills">
                            </span>
                            <br> <br>
                            <hr class="star-light">
                            <br>
                            <span>
                                <a href="javascript:void(0);" class="btn btn-success btn-lg" style="margin:5px;"><i class="fa fa-file faa-pulse animated"></i> &nbsp;Pendaftaran PPDB Online ditutup</a>
                                <br>
                            </span>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
  

</body>

</html>