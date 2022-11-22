<?php $elementsForDisplay = array_reverse($elementsForDisplay); ?>
<?php foreach ($elementsForDisplay as $setName => $setElements): ?>
<div class="element-set">
    <?php if ($showElementSetHeadings): ?>
    <h2><?php echo html_escape(__($setName)); ?></h2>
    <?php endif; ?>
    <?php foreach ($setElements as $elementName => $elementInfo): ?>
      <?php if (($elementName == "Bannerstone Type") or ($elementName == "Condition") or ($elementName == "Find") or ($elementName == "Location") or ($elementName == "Material") or ($elementName == "Perforation")): ?>
    		<div id="<?php echo text_to_id(html_escape("$setName $elementName")); ?>" class="element">
    			<h3><?php echo html_escape(__($elementName)); ?></h3>
    			<?php foreach ($elementInfo['texts'] as $text): ?>
    				<div class="element-text"><?php echo heading_links($elementName, $text); ?></div>
    			<?php endforeach; ?>
    		</div><!-- end element -->
      <?php elseif ($elementName == "Provenance/Provenience"): ?>
        <div id="<?php echo text_to_id(html_escape("$setName $elementName")); ?>" class="element">
            <h3><?php echo html_escape(__($elementName)); ?></h3>
            <?php foreach ($elementInfo['texts'] as $text): ?>
                <div class="element-text"><?php echo $text; ?></div>
            <?php endforeach; ?>
            <?php echo $this->geolocationMapSingle($record, '100%', '270px'); ?>
        </div><!-- end element -->
    	<?php else: ?>
        <div id="<?php echo text_to_id(html_escape("$setName $elementName")); ?>" class="element">
            <h3><?php echo html_escape(__($elementName)); ?></h3>
            <?php foreach ($elementInfo['texts'] as $text): ?>
                <div class="element-text"><?php echo $text; ?></div>
            <?php endforeach; ?>
        </div><!-- end element -->
      <?php endif; ?>
    <?php endforeach; ?>
</div><!-- end element-set -->
<?php endforeach;
