<?php
$bodyclass = 'page simple-page';
if ($is_home_page):
    $bodyclass .= ' simple-page-home';
endif;

echo head(array(
    'title' => metadata('simple_pages_page', 'title'),
    'bodyclass' => $bodyclass,
    'bodyid' => metadata('simple_pages_page', 'slug')
));
?>
<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-md-6">
      <h1 class="text-center mb-4"><?php echo metadata('simple_pages_page', 'title'); ?></h1>
      <?php
      $text = metadata('simple_pages_page', 'text', array('no_escape' => true));
      echo $this->shortcodes($text);
      ?>
    </div>
  </div>
</div>

<?php echo foot(); ?>
