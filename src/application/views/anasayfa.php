<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?php echo strip_tags($ayarlar->site_title ." - ". $ayarlar->site_description); ?></title>
<meta name="author" content="Burak Dündar" />
<meta name="robots" content="all"/>
<meta name="description" content="<?php echo strip_tags($ayarlar->site_description); ?>">
<meta name="keywords" content="<?php echo strip_tags($ayarlar->site_keywords); ?>">
<meta name="owner" content="Burak Dündar" />
<meta name="copyright" content="Copyright Burak Dündar - Tüm Hakları Saklıdır." />
<meta name="twitter:card" content="summary"/>
<meta name="twitter:site" content="@desponres"/>
<meta name="twitter:url" content="<?php echo base_url(); ?>">
<meta name="twitter:title" content="<?php echo strip_tags($ayarlar->site_title); ?>">
<meta name="twitter:description" content="<?php echo strip_tags($ayarlar->site_description); ?>">
<meta name="twitter:image" content="<?php echo base_url("assets/images/bd.png"); ?>">
<meta property="og:locale" content="tr_TR">
<meta property="og:title" content="<?php echo strip_tags($ayarlar->site_title); ?>">
<meta property="og:site_name" content="<?php echo strip_tags($ayarlar->site_title); ?>">
<meta property="og:url" content="<?php echo base_url(); ?>">
<meta property="og:image" content="<?php echo base_url("assets/images/bd.png"); ?>">
<meta property="og:image:width" content="150">
<meta property="og:image:height" content="150">
<meta property="og:description" content="<?php echo strip_tags($ayarlar->site_description); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("assets/css/blg.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("assets/css/imagehover.min.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("assets/css/font-awesome.min.css"); ?>" rel="stylesheet">
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
<div class="container-fluid">
<a class="navbar-brand" href="<?php echo base_url();?>"><?php echo strip_tags($ayarlar->site_title); ?></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarResponsive">
<ul class="navbar-nav ml-auto"><?php $this->load->view("menu"); ?></ul>
</div>
</div>
</nav>
<!-- Page Content -->
<div class="container-fluid"><div class="row">
<div class="col-md-8">
<p class="mt-4"></p>
<div class="container-fluid"><p class="alert alert-info">En Son Eklenen Filmler</p></div>
<?php foreach ($film_listesi as $row) { ?>
<?php
$metin = $row->film_baslik;
$uzunluk = strlen($metin);
$sinir = 25;
if ($uzunluk> $sinir) {
$film_baslik_v2 = substr($metin,0,$sinir)."...";
}
else if($uzunluk<$sinir){
$film_baslik_v2 = $metin;
}
?>
<div class="film-listesi col-sm-4 col-md-4 col-xs-6 col-xl-4 mb-3">
<div style="height:450px;" class="card">
<?php if($row->film_resim){  ?>
<figure class="imghvr-zoom-in">
<figcaption style="background:#343a40;">
<strong style="font-size:14px;"><?php echo $film_baslik_v2; ?></strong>
<hr>
<p style="font-size:14px;"><?php echo strip_tags($row->kategori_adi); ?></p>
<hr>
<p style="font-size:14px;"><?php echo $row->film_tmdb; ?>/10</p>
<hr>
<p style="font-size:14px;"><?php echo $row->film_goruntulenme; ?> izlenme</p>
</figcaption>
<img class="card-img-top" height="310" src="<?php echo base_url("uploads/$row->film_resim"); ?>" alt="<?php echo $row->film_baslik; ?>">
<a href="<?php echo base_url("film/".$row->film_url); ?>"></a>
</figure>
<?php } ?>
<div class="card-body">
<strong class="card-title" style="float:left;position:relative;font-size:14px;font-weight:bold;"><?php echo $film_baslik_v2; ?></strong>
</div>
<div class="card-footer"><a href="<?php echo base_url("film/".$row->film_url); ?>" class="btn btn-primary" style="width:100%;">Filmi izle</a></div>
</div>
</div>
<?php } ?>
<div class="temizle"></div>
<nav class="container">
<?php echo $this->pagination->create_links(); ?>
</nav>
</div>
<!-- Sidebar Widgets Column -->
<div class="col-md-4">
<!-- arama -->
<div class="card my-4">
<h5 class="card-header">Film Ara</h5>
<div class="card-body">
<form action="<?php echo base_url("arama"); ?>">
<div class="input-group">
<input type="text" class="form-control" name="q" placeholder="Film adı veya TMDb id ile ara..." required>
<button class="btnara btn btn-secondary" type="submit">Ara!</button>
</div>
</form>
</div>
</div>
<!-- arama -->
<?php if($sag_blok_423_250->reklam_durum == '1'){ ?>
<!-- reklam -->
<div class="card my-4">
<?php echo $sag_blok_423_250->reklam_kodu; ?>
</div>
<!-- reklam -->
<?php } ?>
<!-- film türleri -->
<div class="card my-4">
<h5 class="card-header">Film Türleri</h5>
<div class="card-body">
<div class="row">
<div class="ktgrlg col-lg-6">
<ul class="ktgr list-unstyled mb-0">
<?php foreach($kategoriler as $ktg) { ?>
<li><i class="fa fa-angle-double-right"></i> <a href="<?php echo base_url("kategori/$ktg->kategori_url"); ?>"><?php echo $ktg->kategori_adi; ?></a></li>
<?php } ?>
</ul>
</div>
</div>
</div>
</div>
<!-- film türleri -->

<?php $this->load->view("enckizlenenler"); ?>

</div><!-- col-md-4 -->
</div><!-- row -->
</div><!-- c-fluid -->
<footer class="footer bg-dark">
<div class="container">
<p class="m-2 text-center text-white" <?php if(empty($sayfalar)) { ?>style="line-height: 60px;height: 70px;bottom: 0;"><?php } ?>Copyright &copy; 2019 - <u><a target="_blank" class="text-white" href="https://desponres.ml/">Burak Dündar</a></u> tarafından ıssız gecelerde kodlanmıştır :)</p>
<?php if(!empty($sayfalar)) { ?>
<hr>
<div class="m-2 text-center text-white footer-nav">
<?php foreach($sayfalar as $syf) { ?>
| <a href="<?php echo base_url("sayfa/$syf->sayfa_url"); ?>" class="text-white"><?php echo $syf->sayfa_baslik; ?></a> |
<?php } ?>
</div>
<?php } ?>
</div>
</footer>
<script src="<?php echo base_url("assets/vendor/jquery/jquery.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
</body>
</html>
