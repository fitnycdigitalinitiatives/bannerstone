<?php $button_path = src('images/', 'javascripts/openseadragon');?>
<?php $unique_id = "openseadragon_" . $hash; ?>
	<img class="card-img" src="<?php echo $static_image; ?>" id="openseadragon-image-<?php echo $unique_id; ?>" alt="<?php echo $title; ?>" />
	<div class="openseadragon" id="<?php echo $unique_id; ?>">
		<script type="text/javascript">
			$('#openseadragon-image-<?php echo $unique_id; ?>').click(function(){
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
