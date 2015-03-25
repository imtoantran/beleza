<?php $slider = $this->slider; ?>
<?php if (is_array($slider)): ?>
	<div class="tp-banner" >
		<ul>
			<!-- SLIDE  -->

			<?php foreach ($slider as $key => $value): ?>
				<li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
					<!-- MAIN IMAGE -->
					<img src="<?php echo ASSETS."revslider/images/".$value['image'];?>"  alt=""  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
					<!-- LAYERS -->
					<!-- LAYER NR. 1 -->
					<?php foreach ($value['layers'] as $key => $layer) :?>
						<div class="tp-caption <?php print $layer->style; ?> <?php print $layer->animation; ?>"
							data-x="<?php print $layer->left; ?>"
							data-y="<?php print $layer->top; ?>"
							data-speed="<?php print $layer->speed; ?>"
							data-start="1200"
							data-easing="<?php print $layer->easing; ?>"><?php print $layer->text; ?>
						</div>
					<?php endforeach; ?>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
<script type="text/javascript">
	$.ajax({
		url: URL + 'admincp_banner/reloadCss',
		type: 'post',
	})
	.done(function(css) {
		$("head").append(css);
	})
	.fail(function() {
		console.log("error");
	})
</script>
<?php endif ?>
