<?php
echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show'));
?>
<div class="container">
  <!-- Header -->
  <h1 class="text-center mb-5">
    <?php echo metadata($item, array('Dublin Core', 'Title')); ?>
    <?php if (metadata('item', 'has tags')): ?>
      <?php $tags = get_current_record('item')->Tags; ?>
      <?php foreach ($tags as $tag): ?>
        <?php if ($tag['name'] == "Plaster Cast"): ?>
          <br><span id="plaster">(Plaster Cast)</span>
          <?php break; ?>
        <?php endif; ?>
      <?php endforeach; ?>
    <?php endif; ?>
  </h1>
</div>

<?php if (strtolower(metadata('item', ['Item Type Metadata', 'NAGPRA'])) == "true"): ?>
  <div class="container">
    <div class="row justify-content-md-center" id="metadata">
      <div class="col-md-6">
        As of 09/01/2024 we have removed images and metadata from AMNH D/142, D/144, D/146, D/147 and NMNH A61057, A61058,
        and A61059 from the Bannerstone Project as we seek advice and perspectives from Indigenous tribes. What makes
        these bannerstones different from the others on this website is that they are known to have been taken from a
        mound in a separate location from, though in proximity to burials. Following the newly revised NAGPRA (Native
        American Graves Protection and Repatriation Act) we seek to find ethical and collaborative ways to respect and
        regard these particular bannerstones, we are reaching out to the Seminole Tribe of Florida, Seminole Nation of
        Oklahoma, Miccosukee Tribe of Indians, and the Muscogee Nation of the Tomoko Creek region were these bannerstones
        were originally cached over 5,000 years ago.
      </div>
    </div>
  </div>
<?php else: ?>
  <!-- Viewer -->
  <div class="container">
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
            <h3>
              <?php echo __('Collection'); ?>
            </h3>
            <div class="element-text">
              <?php echo link_to_items_browse(metadata('item', 'Collection Name'), array('collection' => metadata(get_collection_for_item(), 'id')), array('class' => 'text-dark')); ?>
            </div>
          </div>
        <?php endif; ?>
        <?php echo all_element_texts('item'); ?>
        <!-- The following prints a citation for this item. -->
        <div id="item-citation" class="element">
          <h3>
            <?php echo __('Citation'); ?>
          </h3>
          <div class="element-text">
            <?php echo metadata('item', 'citation', array('no_escape' => true)); ?>
          </div>
        </div>

        <div id="item-output-formats" class="element">
          <h3>
            <?php echo __('Output Formats'); ?>
          </h3>
          <div class="element-text">
            <?php echo output_format_list(false); ?>
          </div>
        </div>

        <?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>
      </div>
    </div>
  </div>
<?php endif; ?>



<?php echo foot(); ?>