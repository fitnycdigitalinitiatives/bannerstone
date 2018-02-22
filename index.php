<?php echo head(array('bodyid'=>'home')); ?>

<div class="jumbotron" id="splash">
  <div class="container">
    <h1 class="display-1 d-none d-md-block">Archaic Bannerstone Project</h1>
    <h1 class="display-4 d-block d-md-none">Archaic Bannerstone Project</h1>
  </div>
  <a class="btn btn-light btn-arrow" href="#about" role="button"><i class="material-icons">keyboard_arrow_down</i></a>
</div>

<div class="container" id="about">
  <div class="row">
    <div class="col-md-8">
      <?php fire_plugin_hook('public_home', array('view' => $this)); ?>
      <h2 class="pt-5">About the FIT Archaic Bannerstone Project</h2>
      <p class="lead">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
      <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
    </div>
  </div>
</div>

<div class="jumbotron mt-5 mb-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <p class="display-4 text-center">I am an interesting factoid about this project.</p>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-8">
      <h2>More Info</h2>
      <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
      <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
      <h2>Rights Info</h2>
      <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
    </div>
  </div>
</div>



<?php echo foot(array('bodyid'=>'home')); ?>
