<?php
    $pageTitle = __('Browse Items');
    echo head(array('title'=>$pageTitle, 'bodyclass'=>'items tags'));
?>

<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-md-6">
      <h1 class="text-center mb-4">Bannerstone Typology</h1>
      <p class="px-3 mb-4">
        The Archaic Bannerstone Project (ABP) distinguishes 24 bannerstone types based on terms established by Byron Knoblock in his 1939 text <em>Banner-stones of the North American Indian</em>. Below, bannerstones can be browsed by these types and sub-types. As more collections are photographed and added to this ABP site we hope to include examples of all 24 types.
      </p>

      <ul class="leaders mb-4">
      <?php
        $tags = get_records('Tag', array('include_zero' => true, 'sort_field' => 'name'), 0);
        foreach ($tags as $tag):
      ?>
        <?php if ($tag["tagCount"] > 0): ?>
        <li>
          <span><?php echo link_to_items_browse($tag['name'], array('tags' => $tag['name']), array('class' => 'text-dark')); ?></span>
          <span><?php echo link_to_items_browse($tag["tagCount"], array('tags' => $tag['name']), array('class' => 'text-dark')); ?></span>
        </li>
        <?php else: ?>
          <li class="text-dark disabled">
            <span><?php echo $tag['name']; ?></span>
            <span><?php echo $tag["tagCount"]; ?></span>
          </li>
        <?php endif; ?>
      <?php endforeach; ?>
      </ul>
      <h2 class="text-center mb-4">Illustrated Bannerstone Typology</h2>
      <div class="embed-responsive embed-responsive-7by5">
        <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/11NO1WSsXWq9kQ-ATR4bcZOWPKHqrfOUL/preview"></iframe>
      </div>
    </div>
  </div>
</div>

<?php echo foot(); ?>
