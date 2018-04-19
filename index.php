<?php echo head(array('bodyid'=>'home')); ?>

<div class="container-fluid my-5" id="banner">
  <div class="row justify-content-md-center">
    <div class="col-auto" id="large-img">
      <img src="<?php echo img('grid-1.jpg'); ?>" class="img-fluid" alt="Bannerstone image">
    </div>
    <div class="col-auto" id="small-img">
        <div class="row">
          <div class="col-auto">
            <img src="<?php echo img('grid-2.jpg'); ?>" class="img-fluid" id="small-top" alt="Bannerstone image">
          </div>
        </div>
        <div class="row">
          <div class="col-auto">
            <img src="<?php echo img('grid-3.jpg'); ?>" class="img-fluid" id="small-middle" alt="Bannerstone image">
          </div>
        </div>
        <div class="row">
          <div class="col-auto">
            <img src="<?php echo img('grid-4.jpg'); ?>" class="img-fluid" id="small-bottom" alt="Bannerstone image">
          </div>
        </div>
    </div>
  </div>
</div>

<div class="container" id="about">
  <div class="row justify-content-md-center">
    <div class="col-md-6">
      <?php fire_plugin_hook('public_home', array('view' => $this)); ?>
      <p>Welcome to the FIT Archaic Bannerstone Project. This project was launched in 2018 by Professor Anna Blume of the Fashion Institute of Technology. This Project is a collaboration betweent the Art History Department and Gladys Marcus Library, along with several contributing institutions, including the Natural History Museum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
    </div>
  </div>
</div>




<?php echo foot(array('bodyid'=>'home')); ?>
