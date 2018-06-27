<?php
    echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show'));
?>
  <div class="container">
    <!-- Header -->
    <h1 class="text-center mb-5"><?php echo metadata($item, array('Item Type Metadata', 'Accession')); ?></h1>
    <!-- Viewer -->
    <?php
    $convert = new OpenSeadragon;
    echo $convert->render($item);
    ?>
  </div>

  <div class="container">
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
    <ul class="pager">
        <li class="previous"><?php echo link_to_previous_item_show(); ?></li>
        <li class="next"><?php echo link_to_next_item_show(); ?></li>
    </ul>
  </div>



<?php echo foot(); ?>
