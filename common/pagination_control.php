<?php
if ($this->pageCount > 1):
    $getParams = $_GET;
?>
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">

        <?php if (isset($this->previous)): ?>
          <!-- Previous page link -->
          <li class="page-item arrow">
    		    <?php $getParams['page'] = $previous; ?>
            <a class="page-link" href="<?php echo html_escape($this->url(array(), null, $getParams)); ?>" aria-label="Previous"><i class="material-icons">keyboard_arrow_left</i><span class="sr-only">Previous</span></a>
          </li>
        <?php endif; ?>

        <?php if (($this->first != $this->current) && !(in_array($this->first, $this->pagesInRange))): ?>
          <!-- First page link -->
          <li class="page-item">
    		    <?php $getParams['page'] = $first; ?>
            <a class="page-link" href="<?php echo html_escape($this->url(array(), null, $getParams)); ?>"><?php echo __('First...'); ?></a>
          </li>
        <?php endif; ?>

        <!-- Numbered page links -->
        <?php foreach ($this->pagesInRange as $page): ?>
          <?php if ($page != $this->current): ?>
            <li class="page-item">
          		<?php $getParams['page'] = $page; ?>
          		<a class="page-link" href="<?php echo html_escape($this->url(array(), null, $getParams)); ?>"><?php echo $page; ?></a>
        		</li>
          <?php else: ?>
          <li class="page-item active">
        		<?php $getParams['page'] = $page; ?>
        		<a class="page-link" href="<?php echo html_escape($this->url(array(), null, $getParams)); ?>"><?php echo $page; ?><span class="sr-only">(current)</span></a>
      		</li>
          <?php endif; ?>
        <?php endforeach; ?>
        <?php if (($this->last != $this->current) && !(in_array($this->last, $this->pagesInRange))): ?>
          <!-- Last page link -->
          <li class="page-item">
    		    <?php $getParams['page'] = $last; ?>
            <a class="page-link" href="<?php echo html_escape($this->url(array(), null, $getParams)); ?>"><?php echo __('Last'); ?></a>
          </li>
        <?php endif; ?>

        <?php if (isset($this->next)): ?>
          <!-- Next page link -->
          <li class="page-item arrow">
    		    <?php $getParams['page'] = $next; ?>
            <a class="page-link" href="<?php echo html_escape($this->url(array(), null, $getParams)); ?>" aria-label="Next"><i class="material-icons">keyboard_arrow_right</i><span class="sr-only">Next</span></a>
          </li>
        <?php endif; ?>

    </ul>
</nav>
<?php endif; ?>
