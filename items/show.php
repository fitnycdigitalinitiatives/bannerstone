<?php
    echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show'));
?>
  <div class="container">
    <!-- Header -->
    <h1 class="text-center mb-5"><?php echo metadata($item, array('Dublin Core', 'Title')); ?></h1>
    <!-- Viewer -->
    <?php
    $convert = new OpenSeadragon;
    echo $convert->render($item);
    ?>
  </div>

  <div class="container">
    <div class="row justify-content-md-center" id="metadata">
      <div class="col-md-6">
        <h2 class="text-center mb-5">About this Bannerstone</h2>
        <!-- If the item belongs to a collection, the following creates a link to that collection. -->
        <?php if (metadata('item', 'Collection Name')): ?>
          <div id="item-collection" class="element">
            <h3><?php echo __('Collection'); ?></h3>
            <div class="element-text"><?php echo link_to_items_browse(metadata('item', 'Collection Name'), array('collection' => metadata(get_collection_for_item(), 'id')), array('class' => 'text-dark')); ?></div>
          </div>
        <?php endif; ?>
        <?php echo all_element_texts('item'); ?>
        <!-- The following prints a citation for this item. -->
        <div id="item-citation" class="element">
            <h3><?php echo __('Citation'); ?></h3>
            <div class="element-text"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></div>
        </div>

        <div id="item-output-formats" class="element">
            <h3><?php echo __('Output Formats'); ?></h3>
            <div class="element-text"><?php echo output_format_list(false); ?></div>
        </div>

        <?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>
      </div>
    </div>
  </div>



<?php echo foot(); ?>
