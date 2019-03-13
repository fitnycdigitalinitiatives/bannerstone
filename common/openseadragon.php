<?php $button_path = src('images/', 'javascripts/openseadragon');?>
<?php $unique_id = "openseadragon_".hash("md4", html_escape($hash)); ?>
<div class="justify-content-center tab-pane fade <?php if ($panel_id == 1) { echo 'show active'; } ?>" id="openseadragon-<?php echo $panel_id; ?>" role="tabpanel" aria-labelledby="image-panel-<?php echo $panel_id; ?>">
	<div id="static-image-wrapper">
		<img class="os-static-image" src="<?php echo $static_image; ?>" id="openseadragon-image-<?php echo $panel_id; ?>" alt="Bannerstone view <?php echo $hash; ?>"/>
		<div class="dropdown">
			<button role="button" class="btn btn-download d-none d-md-block dropdown-toggle" title="Please see Rights statement below for usage guidelines" type="button" id="<?php echo $hash; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="material-icons">get_app</i>
				<span class="sr-only">Download Image</span>
			</button>
			<div class="dropdown-menu" aria-labelledby="<?php echo $hash; ?>">
				<a class="dropdown-item small" href="<?php echo $small_image; ?>" download="<?php echo $hash; ?>">Small (400px)</a>
				<a class="dropdown-item small" href="<?php echo $medium_image; ?>" download="<?php echo $hash; ?>">Medium (800px)</a>
				<a class="dropdown-item small" href="<?php echo $large_image; ?>" download="<?php echo $hash; ?>">Large (1600px)</a>
		    <a class="dropdown-item small" href="<?php echo $original_image; ?>" download="<?php echo $hash; ?>">Original</a>
		  </div>
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
					maxZoomPixelRatio: 5,
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
