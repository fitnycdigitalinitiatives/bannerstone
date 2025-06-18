<?php
$pageTitle = __('Browse Items');
echo head(array('title' => $pageTitle, 'bodyclass' => 'items browse'));
?>

<div class="container" id="grid">
  <?php if ($total_results > 0): ?>

    <!-- Header -->
    <?php if ($isfb = item_search_filters_bootstrap()): ?>
      <h1 class="text-center mb-5">
        Showing <?php echo $total_results; ?> <?php echo ($total_results > 1 ? 'bannerstones' : 'bannerstone'); ?>
        <br />
        <small class="text-muted"><em><?php echo $isfb; ?></em></small>
      </h1>
    <?php else: ?>
      <h1 class="text-center mb-5">Showing <?php echo $total_results; ?> bannerstones total</h1>
    <?php endif; ?>


    <!-- Grid -->
    <div class="card-deck">
      <?php foreach (loop('items') as $item): ?>
        <div class="card">
          <a class="text-dark" href="<?php echo record_url($item, null, true); ?>">
            <div class="card-push"></div>
            <?php if (strtolower(metadata($item, ['Item Type Metadata', 'NAGPRA'])) == "true"): ?>
              <div class="nagpra text-center p-3">
                Bannerstone Found in a Burial Site Respectfully Removed Upon the Request of The Seminole Tribe of Florida
              </div>
            <?php else: ?>
              <img class="card-img" src="<?php echo thumbnail_url($item, 1); ?>"
                alt="Bannerstone <?php echo metadata($item, array('Dublin Core', 'Title')); ?>">
            <?php endif; ?>
            <div class="card-push"></div>
            <h3 class="card-title text-center"><?php echo metadata($item, array('Dublin Core', 'Title')); ?></h3>
            <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' => $item)); ?>
          </a>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Pagination -->
    <?php echo pagination_links(); ?>

    <!-- Meta -->
    <!-- <div id="outputs">
        <span class="outputs-label"><?php echo __('Output Formats'); ?></span>
        <?php echo output_format_list(false); ?>
    </div> -->

    <!-- No Results -->
  <?php else: ?>
    <div class="row justify-content-md-center">
      <div class="col-md-6">
        <h1 class="text-center mb-4"><?php echo 'No results'; ?></h1>
        <p>
          There appears to have been some sort of error. Please try searching again.
        </p>
      </div>
    </div>
  <?php endif; ?>

</div>


<?php fire_plugin_hook('public_items_browse', array('items' => $items, 'view' => $this)); ?>
<?php echo foot(); ?>