<?php
    $pageTitle = __('Browse Items');
    echo head(array('title'=>$pageTitle, 'bodyclass'=>'items tags'));
?>

<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-md-6">
      <h1 class="text-center mb-4">Bannerstone Morphology</h1>
      <p class="px-3 mb-4">
        This section briefly explains the bannerstone types. Established by Anna Blume in 2016 based on terms established by Knoblock (1939). Link to PDF with more detailed classification.
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
