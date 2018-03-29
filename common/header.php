<!doctype html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php if ( $description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>

    <!-- Will build the page <title> -->
    <?php
        if (isset($title)) { $titleParts[] = strip_formatting($title); }
        $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>
    <?php echo auto_discovery_link_tags(); ?>

    <!-- Will fire plugins that need to include their own files in <head> -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>


    <!-- Need to add custom and third-party CSS files? Include them here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <?php
        queue_css_url('https://fonts.googleapis.com/icon?family=Material+Icons');
        queue_css_url('https://fonts.googleapis.com/css?family=Cormorant+Garamond:400,400i,500,500i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i');
        queue_css_file('style');
        echo head_css();
    ?>

    <!-- Need more JavaScript files? Include them here -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <?php
        queue_js_file('openseadragon/openseadragon.min');
        echo head_js(false);
    ?>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
  <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>

  <div class="container">
    <header class="pt-3">
      <div class="text-center">
        <?php echo link_to_home_page('<img src="' . img('bannerstone-logo.png') . '"alt="FIT Archaic Bannerstone Project" id="logo">'); ?>

      </div>
    </header>
    <div class="nav-scroller py-1 mb-2">
      <nav class="nav d-flex justify-content-center">
        <a class="p-2 text-dark nav-link" href="#">Bannerstones</a>
        <a class="p-2 text-dark nav-link" href="#">Collections</a>
        <a class="p-2 text-dark nav-link" href="#">Essays</a>
        <a class="p-2 text-dark nav-link" href="#">Resources</a>
        <a class="p-2 text-dark nav-link" href="#">Blog</a>
        <a class="p-2 text-dark nav-link" href="#">Search</a>
      </nav>
    </div>
  </div>


  <nav class="navbar navbar-expand-md navbar-light bg-white d-none">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-md-center" id="navbarSupportedContent">
      <?php echo public_nav_main_bootstrap(); ?>
			<?php echo search_form(array('show_advanced' => false, 'form_attributes' => array('class' => 'form-inline my-2 my-lg-0'))); ?>
    </div>
  </nav>
  <main id="content" role="main" class="pb-5">
        <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
