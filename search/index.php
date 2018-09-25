<?php
    $pageTitle = __('Search Results ') . __('(%s total)', $total_results);
    echo head(array('title' => $pageTitle, 'bodyclass' => 'search browse'));
    $searchRecordTypes = get_search_record_types();
?>
    <div class="container" id="grid">
      <?php if ($total_results): ?>
        <h1 class="text-center mb-5">
          Showing <?php echo $total_results; ?> <?php echo ($total_results > 1 ? 'bannerstones' : 'bannerstone'); ?>
          <br />
           <small class="text-muted"><em><?php echo search_filters() ?></em></small>
         </h1>

          <!-- Grid -->
          <div class="card-deck">

            <?php foreach (loop('search_texts') as $searchText): ?>
              <?php $record = get_record_by_id($searchText['record_type'], $searchText['record_id']); ?>
              <?php $recordType = $searchText['record_type']; ?>
              <?php set_current_record($recordType, $record); ?>
              <?php if ($recordType == 'Item'): ?>
                <?php $item = $record; ?>
                <div class="card">
                  <a class="text-dark" href="<?php echo record_url($item, null, true); ?>">
                    <div class="card-push"></div>
                    <img class="card-img" src="<?php echo thumbnail_url($item); ?>" alt="<?php echo metadata($item, array('Dublin Core', 'Title')); ?>">
                    <div class="card-push"></div>
                    <h3 class="card-title text-center"><?php echo metadata($item, array('Dublin Core', 'Title')); ?></h3>
                    <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>
                  </a>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
          <?php echo pagination_links(); ?>
      <?php else: ?>
        <div class="row justify-content-md-center">
          <div class="col-md-6">
            <h1 class="text-center mb-4"><?php echo 'No results'; ?>
              <br />
               <small class="text-muted"><em><?php echo search_filters() ?></em></small>
            </h1>
            <p>
              There does not appear to be any search results. Please try again with another term.
            </p>
          </div>
        </div>
      <?php endif; ?>
    </div>
<?php echo foot(); ?>
