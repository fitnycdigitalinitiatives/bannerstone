<?php
    $pageTitle = __('Browse Items');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse'));
?>

<div class="container pt-4">
  <?php if ($total_results > 0): ?>

    <!-- Header -->
    <h4 class="text-muted">Showing <?php echo $total_results; ?> items total</h4>

    <!-- Grid -->
    <div class="card-columns">
      <?php foreach (loop('items') as $item): ?>
        <a href="<?php echo record_url($item, null, true); ?>">
          <div class="card">
            <img class="card-img-top" src="<?php echo thumbnail_url($item); ?>" alt="<?php echo metadata($item, array('Dublin Core', 'Title')); ?>">
            <div class="card-body">
              <h5 class="card-title"><?php echo metadata($item, array('Dublin Core', 'Title')); ?></h5>
              <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>
            </div>
          </div>
        </a>
      <?php endforeach; ?>
    </div>

    <!-- Pagination -->
    <?php echo pagination_links(); ?>

    <!-- Meta -->
    <div id="outputs">
        <span class="outputs-label"><?php echo __('Output Formats'); ?></span>
        <?php echo output_format_list(false); ?>
    </div>

  <!-- No Results -->
  <?php else : ?>
      <p><?php echo 'No results.'; ?></p>
  <?php endif; ?>

</div>


<?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>
<?php echo foot(); ?>
