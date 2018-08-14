<?php
    $pageTitle = __('Browse collections');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'collections browse'));
?>
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-6">
          <h1 class="text-center mb-4">Bannerstone Collections</h1>
          <p class="px-3 mb-4">
            This section gives an overview of the different collections the bannerstones are from. Since there are only bannerstones from the AMNH, this can probably be hidden until it's useful.
          </p>

          <ul class="leaders">
          <?php foreach (loop('collections') as $collection): ?>
            <li>
              <span><?php echo link_to_items_browse(metadata($collection, array('Dublin Core', 'Title')), array('collection' => metadata($collection, 'id'), 'sort_field' => 'added', 'sort_dir' => 'a'), array('class' => 'text-dark')); ?></span>
              <span><?php echo link_to_items_browse(metadata($collection, 'total_items'), array('collection' => metadata($collection, 'id'), 'sort_field' => 'added', 'sort_dir' => 'a'), array('class' => 'text-dark')); ?></span>
            </li>
          <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>

    <?php echo pagination_links(); ?>

<?php fire_plugin_hook('public_collections_browse', array('collections'=> $collections, 'view' => $this)); ?>
<?php echo foot(); ?>
