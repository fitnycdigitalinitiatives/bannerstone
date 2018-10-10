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

    <!-- Icon -->
    <link rel="icon" href="<?php echo img('banner_icon.ico'); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo img('banner_icon.ico'); ?>" type="image/x-icon">


    <!-- Need to add custom and third-party CSS files? Include them here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <?php
        queue_css_url('https://fonts.googleapis.com/icon?family=Material+Icons');
        queue_css_url('https://fonts.googleapis.com/css?family=Cormorant+Garamond:400,400i,500,500i,700,700i|Playfair+Display:400,400i,700,700i');
        queue_css_file('style');
        echo head_css();
    ?>

    <!-- Javascript section -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
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

  <div class="container d-none d-md-block">
    <header class="pt-4">
      <div class="row flex-nowrap justify-content-center align-items-center">
        <div class="col-auto" id="fit-logo">
          <img src="<?php echo img('fit-logo.png'); ?>"alt="Fashion Institute of Technology logo">
        </div>
        <div class="col-auto text-center">
          <?php echo link_to_home_page('Archaic Bannerstone Project', array('class' => 'text-dark header-logo')); ?>
        </div>
      </div>
    </header>
  </div>


  <nav class="navbar navbar-expand-md bg-white sticky-top mb-md-2 py-md-3" id="main-nav">
      <?php echo link_to_home_page('Archaic Bannerstone Project', array('class' => 'navbar-brand d-md-none text-dark')); ?>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30" height="30" focusable="false"><title>Menu</title><path stroke="#343a40" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"></path></svg>
      </button>

      <div class="collapse navbar-collapse justify-content-md-center position-relative" id="navbarSupportedContent">
        <?php echo public_nav_main_bootstrap(); ?>
        <?/* No Search Functionality Needed Until further notice ?>
        <span class="navbar-text p-0 mr-auto d-none d-md-block" id="search-button">
          <i class="material-icons">search</i>
        </span>
        <!-- Search -->
      	<!-- Get filter for plugin use -->
      	<?php $url = apply_filters('search_form_default_action', url('search')); ?>
      	<form id="search-form" name="search-form" role="search" action="<?php echo $url; ?>" method="get">
      		<div class="form-group mb-0">
      			<input type="text" name="query" id="query" value="" class="form-control" placeholder="Enter Search Terms..." aria-label="Search" autocomplete="off">
      		</div>
      	</form>
        <?*/?>
      </div>
  </nav>

  <main id="content" role="main">
        <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
