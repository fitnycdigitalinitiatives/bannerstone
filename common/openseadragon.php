<?php $button_path = src('images/', 'javascripts/openseadragon');?>
<?php $unique_id = "openseadragon_".hash("md4", html_escape($hash)); ?>
<div class="tab-pane fade <?php if ($panel_id == 1) { echo 'show active'; } ?>" id="openseadragon-<?php echo $panel_id; ?>" role="tabpanel" aria-labelledby="image-panel-<?php echo $panel_id; ?>">
	<img class="card-img-top mx-auto" src="<?php echo $static_image; ?>" id="openseadragon-image-<?php echo $panel_id; ?>" />
	<div class="openseadragon" id="<?php echo $unique_id; ?>">
		<script type="text/javascript">
			$('#openseadragon-image-<?php echo $panel_id; ?>').click(function(){
				OpenSeadragon({
					id: "<?php echo $unique_id; ?>",
					prefixUrl: "<?php echo $button_path; ?>",
					navigatorSizeRatio: 0.1,
					minZoomImageRatio: 0.8,
					maxZoomPixelRatio: 10,
					controlsFadeDelay: 1000,
					tileSources: {
						type: 'legacy-image-pyramid',
						levels:<?php echo $pyramid_json; ?>
					}
				}).setFullScreen(true).addHandler('full-screen', function (data) {
						if (!data.fullScreen) {
							viewer.destroy();
						};
				});
			});
		</script>
	</div>
</div>
