<?php
    $pageTitle = __('Browse Items');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse'));
?>

<div class="container" id="grid">
  <?php if ($total_results > 0): ?>

    <!-- Header -->
    <h1 class="text-center mb-5">Showing <?php echo $total_results; ?> bannerstones total</h1>

    <!-- Grid -->
    <div class="card-deck">
      <?php foreach (loop('items') as $item): ?>
        <div class="card">
          <a class="text-dark" href="<?php echo record_url($item, null, true); ?>">
            <div class="card-push"></div>
            <img class="card-img" src="<?php echo thumbnail_url($item); ?>" alt="<?php echo metadata($item, array('Dublin Core', 'Title')); ?>">
            <div class="card-push"></div>
            <h3 class="card-title text-center"><?php echo metadata($item, array('Dublin Core', 'Title')); ?></h3>
            <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>
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
  <?php else : ?>
      <p><?php echo 'No results.'; ?></p>
  <?php endif; ?>

</div>


<?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>
<?php echo foot(); ?>
