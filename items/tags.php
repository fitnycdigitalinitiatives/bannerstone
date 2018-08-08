<?php
    $pageTitle = __('Browse Items');
    echo head(array('title'=>$pageTitle, 'bodyclass'=>'items tags'));
?>

<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-md-6">
      <h1 class="text-center mb-4">Bannerstone Types</h1>
      <p class="px-3 mb-4">
        The Archaic Bannerstone Project uses 24 distinct bannerstone types based on terms established by Byron Knoblock in his 1939 test <em>Banner-stones of the North American Indian</em>. Below, bannerstones can be browsed by these types. More information regarding this morphology can be found in our <a class="text-dark" href="/morphology">resources</a> section.
      </p>

      <ul class="leaders">
      <?php foreach ($tags as $tag): ?>
        <li>
          <span><?php echo link_to_items_browse($tag['name'], array('tags' => $tag['name']), array('class' => 'text-dark')); ?></span>
          <span><?php echo link_to_items_browse($tag["tagCount"], array('tags' => $tag['name']), array('class' => 'text-dark')); ?></span>
        </li>
      <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>

<?php echo foot(); ?>
