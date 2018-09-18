<?php $button_path = src('images/', 'javascripts/openseadragon');?>
<?php $unique_id = "openseadragon_".hash("md4", html_escape($hash)); ?>
<div class="justify-content-center tab-pane fade <?php if ($panel_id == 1) { echo 'show active'; } ?>" id="openseadragon-<?php echo $panel_id; ?>" role="tabpanel" aria-labelledby="image-panel-<?php echo $panel_id; ?>">
	<div id="static-image-wrapper">
		<img class="os-static-image" src="<?php echo $static_image; ?>" id="openseadragon-image-<?php echo $panel_id; ?>" />
		<div class="d-none d-md-block text-right mt-2" id="download">
			<i class="material-icons">get_app</i>
			<span class="sr-only">Download Image</span>
		</div>
	</div>
	<div class="openseadragon" id="<?php echo $unique_id; ?>">
		<script type="text/javascript">
			$('#openseadragon-image-<?php echo $panel_id; ?>').click(function(){
				var viewer = OpenSeadragon({
					id: "<?php echo $unique_id; ?>",
					prefixUrl: "<?php echo $button_path; ?>",
					navigatorSizeRatio: 0.1,
					minZoomImageRatio: 0.5,
					maxZoomPixelRatio: 10,
					controlsFadeDelay: 1000,
					tileSources: ["<?php echo $info_json_url; ?>"]
				});
				viewer.setFullScreen(true).addHandler('full-screen', function (data) {
						if (!data.fullScreen) {
							viewer.destroy();
						};
				});
				var tileDrawnHandler = function (event) {
					viewer.removeHandler('tile-drawn', tileDrawnHandler);
					$('#<?php echo $unique_id; ?>').css('background-image', 'none');
				};
				viewer.addHandler('tile-drawn', tileDrawnHandler);
			});
		</script>
	</div>
</div>
