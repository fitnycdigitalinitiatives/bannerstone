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
        <p>As of September 1, 2024, we have removed from the Bannerstone Project website images and metadata from bannerstones D/142, D/144, D/146, D/147 of the American Museum of Natural History (AMNH) and from A61057, A61058, and A61059 of the National Museum of Natural History (NMNH) as we seek advice and perspectives from Indigenous tribes. What makes these bannerstones different from the others on this website is that they are known to have been taken from a mound in a separate location from, though in proximity to, burials. Following the newly revised NAGPRA (Native American Graves Protection and Repatriation Act), we have reached out to the culturally affiliated Seminole Tribe of Florida, the Seminole Nation of Oklahoma, the Miccosukee Tribe of Indians, and the Muscogee Nation of the Tomoko Creek for their perspectives and advice regarding these bannerstones. </p>
        <p>In response to our communications, in May of 2025 The Seminole Tribe of Florida Tribal Historic Preservation Office has requested in accordance with NAGPRA regulations (<a href="https://www.ecfr.gov/current/title-43/part-10/section-10.2#p-10.2(Funerary%20object)" target="_blank">43 CFR 10.2</a> and <a href="https://www.ecfr.gov/current/title-43/part-10/section-10.1#p-10.1(d)" target="_blank">43 CFR 10.1(d)</a>) that we permanently remove all images and metadata concerning these four bannerstones stones from the Bannerstone Project website. According to Dominique deBeaubien, Collections and Repatriation Program Manager of the tribe, “further research, including publication of images, may not proceed without the Free, Prior, and Informed Consent of all potentially culturally affiliated Tribes.”</p>
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