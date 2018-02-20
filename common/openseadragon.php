<?php $button_path = src('images/', 'javascripts/openseadragon');?>
<?php $unique_id = "openseadragon_".hash("md4", html_escape($hash)); ?>
<div class="tab-pane fade <?php if ($panel_id == 1) { echo 'show active'; } ?>" id="openseadragon-<?php echo $panel_id; ?>" role="tabpanel" aria-labelledby="image-panel-<?php echo $panel_id; ?>">
	<div class="openseadragon-frame embed-responsive embed-responsive-16by9">
		<div class="openseadragon embed-responsive-item" id="<?php echo $unique_id; ?>">
			<script type="text/javascript">
				OpenSeadragon({
					id: "<?php echo $unique_id; ?>",
					prefixUrl: "<?php echo $button_path; ?>",
					showNavigator: true,
					navigatorSizeRatio: 0.1,
					minZoomImageRatio: 0.8,
					maxZoomPixelRatio: 10,
					controlsFadeDelay: 1000,
					tileSources: {
						type: 'legacy-image-pyramid',
						levels:<?php echo $pyramid_json; ?>
					}
				});
			</script>
		</div>
	</div>
</div>
