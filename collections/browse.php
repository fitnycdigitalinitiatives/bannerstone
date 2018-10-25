<?php
    $pageTitle = __('Browse collections');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'collections browse'));
?>
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-6">
          <h1 class="text-center mb-4">Bannerstone Collections</h1>

          <?php foreach (loop('collections') as $collection): ?>
            <div class="collection mb-5">
              <h2><?php echo link_to_items_browse(metadata($collection, array('Dublin Core', 'Title')), array('collection' => metadata($collection, 'id'), 'sort_field' => 'added', 'sort_dir' => 'a'), array('class' => 'text-dark')); ?></span></h2>
              <p>
                <?php echo metadata($collection, array('Dublin Core', 'Description')); ?>
              </p>
              <p id="collection-action">
                <span id="collection-launch">
                  <?php echo link_to_items_browse("<i class='material-icons'>grid_on</i> Browse " . metadata($collection, array('Dublin Core', 'Identifier')), array('collection' => metadata($collection, 'id'), 'sort_field' => 'added', 'sort_dir' => 'a'), array('class' => 'text-dark')); ?>
                </span>
                <?php if ($meta_link = metadata($collection, array('Dublin Core', 'Relation'))): ?>
                <span class="float-right" id="collection-data">
                  <a class="text-dark" href="<?php echo $meta_link; ?>" target="_blank"><?php echo metadata($collection, array('Dublin Core', 'Identifier')); ?> Metadata <i class="material-icons">list</i></a>
                </span>
                <?php endif; ?>
              </p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <?php echo pagination_links(); ?>

<?php fire_plugin_hook('public_collections_browse', array('collections'=> $collections, 'view' => $this)); ?>
<?php echo foot(); ?>
