<div id="viewWrapper" class="view_wrapper">

	<!--  load good font -->
			
	<div class="wrap settings_wrap">
		<div class="clear_both"></div>

		<div class="title_line">
			<div id="icon-options-general" class="icon32"></div>
			<div class="view_title">
				Slider: Main slider, 
				Edit Slide 24, Title: Slide			</div>

			<a original-title="" href="http://themepunch.com/codecanyon/revolution_wp/documentation/#!/slide_general_settings" class="button-primary float_right revblue mtop_10 mleft_10" target="_blank">Help</a>

		</div>
		
		<div id="slide_selector" class="slide_selector">
						<ul class="list_slide_links ui-sortable">
									<li id="slidelist_item_50">
						<a original-title="Slide (DSC_1980.jpg)" href="javascript:void(0)" class="tipsy_enabled_top selected"><span class="nowrap slide_title">Slide</span></a>
					</li>
										<li id="slidelist_item_52">
						<a original-title="Slide (DSC_1975.jpg)" href="http://ddb.toantran.com/wp-admin/admin.php?page=revslider&amp;view=slide&amp;id=52" class="tipsy_enabled_top"><span class="nowrap">Slide</span></a>
					</li>
										<li id="slidelist_item_57">
						<a original-title="Slide (IMG_36011.jpg)" href="http://ddb.toantran.com/wp-admin/admin.php?page=revslider&amp;view=slide&amp;id=57" class="tipsy_enabled_top"><span class="nowrap">Slide</span></a>
					</li>
										<li id="slidelist_item_58">
						<a original-title="Slide (IMG_3606.jpg)" href="http://ddb.toantran.com/wp-admin/admin.php?page=revslider&amp;view=slide&amp;id=58" class="tipsy_enabled_top"><span class="nowrap">Slide</span></a>
					</li>
										<li id="slidelist_item_59">
						<a original-title="Slide (IMG_3608.jpg)" href="http://ddb.toantran.com/wp-admin/admin.php?page=revslider&amp;view=slide&amp;id=59" class="tipsy_enabled_top"><span class="nowrap">Slide</span></a>
					</li>
										<li id="slidelist_item_60">
						<a original-title="Slide (IMG_3609.jpg)" href="http://ddb.toantran.com/wp-admin/admin.php?page=revslider&amp;view=slide&amp;id=60" class="tipsy_enabled_top"><span class="nowrap">Slide</span></a>
					</li>
										<li id="slidelist_item_61">
						<a original-title="Slide (IMG_3615.jpg)" href="http://ddb.toantran.com/wp-admin/admin.php?page=revslider&amp;view=slide&amp;id=61" class="tipsy_enabled_top"><span class="nowrap">Slide</span></a>
					</li>
										<li id="slidelist_item_62">
						<a original-title="Slide (mmexport1410231834357.jpg)" href="http://ddb.toantran.com/wp-admin/admin.php?page=revslider&amp;view=slide&amp;id=62" class="tipsy_enabled_top"><span class="nowrap">Slide</span></a>
					</li>
									<li>
					<a id="link_add_slide" href="javascript:void(0);" class="add_slide"><span class="nowrap">Add Slide</span></a>
				</li>
				<li>
					<div id="loader_add_slide" class="loader_round" style="display:none"></div>
				</li>
			</ul>
		</div>

		<div class="clear"></div>
		<!--<hr class="tabdivider">-->

		
			<div class="divide220"></div>

				
				
			<div id="slide_params_holder" class="postbox unite-postbox" style="max-width:100% !important;">
				<h3 class="box-closed tp-accordion"><span class="postbox-arrow2">-</span><span>General Slide Settings</span></h3>
				<div class="toggled-content">
					<form name="form_slide_params" id="form_slide_params">
									<div class="settings_wrapper unite_settings_wide">
			<script type="text/javascript">
g_settingsObj['form_slide_params'] = {}
g_settingsObj['form_slide_params'].jsonControls = '{"enable_link":[{"name":"link_type","type":"show","value":"true"},{"name":"link","type":"show","value":"true"},{"name":"link_open_in","type":"show","value":"true"},{"name":"slide_link","type":"show","value":"true"},{"name":"link_pos","type":"show","value":"true"}],"link_type":[{"name":"slide_link","type":"enable","value":"slide"},{"name":"link","type":"disable","value":"slide"},{"name":"link_open_in","type":"disable","value":"slide"}]}'
g_settingsObj['form_slide_params'].controls = JSON.parse(g_settingsObj['form_slide_params'].jsonControls);

</script>
<table class="form-table">				<tbody><tr id="title_row" valign="top">
					<th scope="row">
						Slide&nbsp;Title:
					</th>
					<td>
										<input class="medium" id="title" name="title" value="Slide" type="text">
																				
						<div class="description_container">
															<span class="description">The title of the slide, will be shown in the slides list.</span>
													
						</div>
					</td>
					<td class="description_container_in_td">
															<span class="description">The title of the slide, will be shown in the slides list.</span>
								
					</td>
				</tr>								
							<tr id="state_row" valign="top">
					<th scope="row">
						State:
					</th>
					<td>
									<select id="state" name="state">
								<option value="published" selected="selected">Published</option>
									<option value="unpublished">Unpublished</option>
							</select>
																				
						<div class="description_container">
															<span class="description">The state of the slide. The unpublished slide will be excluded from the slider.</span>
													
						</div>
					</td>
					<td class="description_container_in_td">
															<span class="description">The state of the slide. The unpublished slide will be excluded from the slider.</span>
								
					</td>
				</tr>								
							<tr id="date_from_row" valign="top">
					<th scope="row">
						Visible&nbsp;from:
					</th>
					<td>
										<input class="inputDatePicker hasDatepicker" id="date_from" name="date_from" value="" type="text">
																				
						<div class="description_container">
															<span class="description">If set, slide will be visible after the date is reached</span>
													
						</div>
					</td>
					<td class="description_container_in_td">
															<span class="description">If set, slide will be visible after the date is reached</span>
								
					</td>
				</tr>								
							<tr id="date_to_row" valign="top">
					<th scope="row">
						Visible&nbsp;until:
					</th>
					<td>
										<input class="inputDatePicker hasDatepicker" id="date_to" name="date_to" value="" type="text">
																				
						<div class="description_container">
															<span class="description">If set, slide will be visible till the date is reached</span>
													
						</div>
					</td>
					<td class="description_container_in_td">
															<span class="description">If set, slide will be visible till the date is reached</span>
								
					</td>
				</tr>								
						<tr id="hr1_row">
				<td colspan="4" style="text-align:left;" align="left">
					 <hr> 
				</td>
			</tr>
							<tr id="slide_transition_row" valign="top">
					<th scope="row">
						Transitions:
					</th>
					<td>
									<select id="slide_transition" name="slide_transition" multiple="" class="input_checklist" data-minwidth="250px" size="1" style="z-index: 1000; display: none;">
								<option value="notselectable1">RANDOM TRANSITIONS</option>
									<option value="random-static">Random Flat</option>
									<option value="random-premium">Random Premium</option>
									<option value="random" selected="selected">Random Flat and Premium</option>
									<option value="notselectable2">SLIDING TRANSITIONS</option>
									<option value="slideup">Slide To Top</option>
									<option value="slidedown">Slide To Bottom</option>
									<option value="slideright">Slide To Right</option>
									<option value="slideleft">Slide To Left</option>
									<option value="slidehorizontal">Slide Horizontal (depending on Next/Previous)</option>
									<option value="slidevertical">Slide Vertical (depending on Next/Previous)</option>
									<option value="boxslide">Slide Boxes</option>
									<option value="slotslide-horizontal">Slide Slots Horizontal</option>
									<option value="slotslide-vertical">Slide Slots Vertical</option>
									<option value="notselectable3">FADE TRANSITIONS</option>
									<option value="notransition">No Transition</option>
									<option value="fade">Fade</option>
									<option value="boxfade">Fade Boxes</option>
									<option value="slotfade-horizontal">Fade Slots Horizontal</option>
									<option value="slotfade-vertical">Fade Slots Vertical</option>
									<option value="fadefromright">Fade and Slide from Right</option>
									<option value="fadefromleft">Fade and Slide from Left</option>
									<option value="fadefromtop">Fade and Slide from Top</option>
									<option value="fadefrombottom">Fade and Slide from Bottom</option>
									<option value="fadetoleftfadefromright">Fade To Left and Fade From Right</option>
									<option value="fadetorightfadefromleft">Fade To Right and Fade From Left</option>
									<option value="fadetotopfadefrombottom">Fade To Top and Fade From Bottom</option>
									<option value="fadetobottomfadefromtop">Fade To Bottom and Fade From Top</option>
									<option value="notselectable4">PARALLAX TRANSITIONS</option>
									<option value="parallaxtoright">Parallax to Right</option>
									<option value="parallaxtoleft">Parallax to Left</option>
									<option value="parallaxtotop">Parallax to Top</option>
									<option value="parallaxtobottom">Parallax to Bottom</option>
									<option value="parallaxhorizontal">Parallax Horizontal</option>
									<option value="parallaxvertical">Parallax Vertical</option>
									<option value="notselectable5">ZOOM TRANSITIONS</option>
									<option value="scaledownfromright">Zoom Out and Fade From Right</option>
									<option value="scaledownfromleft">Zoom Out and Fade From Left</option>
									<option value="scaledownfromtop">Zoom Out and Fade From Top</option>
									<option value="scaledownfrombottom">Zoom Out and Fade From Bottom</option>
									<option value="zoomout">ZoomOut</option>
									<option value="zoomin">ZoomIn</option>
									<option value="slotzoom-horizontal">Zoom Slots Horizontal</option>
									<option value="slotzoom-vertical">Zoom Slots Vertical</option>
									<option value="notselectable6">CURTAIN TRANSITIONS</option>
									<option value="curtain-1">Curtain from Left</option>
									<option value="curtain-2">Curtain from Right</option>
									<option value="curtain-3">Curtain from Middle</option>
									<option value="notselectable7">PREMIUM TRANSITIONS</option>
									<option value="3dcurtain-horizontal">3D Curtain Horizontal</option>
									<option value="3dcurtain-vertical">3D Curtain Vertical</option>
									<option value="cube">Cube Vertical</option>
									<option value="cube-horizontal">Cube Horizontal</option>
									<option value="incube">In Cube Vertical</option>
									<option value="incube-horizontal">In Cube Horizontal</option>
									<option value="turnoff">TurnOff Horizontal</option>
									<option value="turnoff-vertical">TurnOff Vertical</option>
									<option value="papercut">Paper Cut</option>
									<option value="flyin">Fly In</option>
							</select><span id="ddcl-slide_transition" style="display: inline-block; cursor: default; overflow: hidden;" class="ui-dropdownchecklist ui-dropdownchecklist-selector-wrapper ui-widget"><span tabindex="0" style="display: inline-block; overflow: hidden; white-space: nowrap; width: 331px;" class="ui-dropdownchecklist-selector ui-state-default"><span title="Random Flat and Premium" style="display: inline-block; white-space: nowrap; overflow: hidden; width: 327px;" class="ui-dropdownchecklist-text">Random Flat and Premium</span></span></span><div style="position: absolute; left: -33000px; top: -33000px; height: 2065px; width: 331px; z-index: 1000;" id="ddcl-slide_transition-ddw" class="ui-dropdownchecklist ui-dropdownchecklist-dropcontainer-wrapper ui-widget"><div style="overflow-y: auto; height: 2065px;" class="ui-dropdownchecklist-dropcontainer ui-widget-content"><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default dropdowntitleoption"><input disabled="" value="notselectable1" index="0" id="ddcl-slide_transition-i0" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i0">RANDOM TRANSITIONS</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="random-static" index="1" id="ddcl-slide_transition-i1" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i1">Random Flat</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="random-premium" index="2" id="ddcl-slide_transition-i2" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i2">Random Premium</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="random" index="3" id="ddcl-slide_transition-i3" checked="checked" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i3">Random Flat and Premium</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default dropdowntitleoption"><input disabled="" value="notselectable2" index="4" id="ddcl-slide_transition-i4" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i4">SLIDING TRANSITIONS</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="slideup" index="5" id="ddcl-slide_transition-i5" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i5">Slide To Top</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="slidedown" index="6" id="ddcl-slide_transition-i6" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i6">Slide To Bottom</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="slideright" index="7" id="ddcl-slide_transition-i7" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i7">Slide To Right</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="slideleft" index="8" id="ddcl-slide_transition-i8" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i8">Slide To Left</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="slidehorizontal" index="9" id="ddcl-slide_transition-i9" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i9">Slide Horizontal (depending on Next/Previous)</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="slidevertical" index="10" id="ddcl-slide_transition-i10" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i10">Slide Vertical (depending on Next/Previous)</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="boxslide" index="11" id="ddcl-slide_transition-i11" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i11">Slide Boxes</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="slotslide-horizontal" index="12" id="ddcl-slide_transition-i12" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i12">Slide Slots Horizontal</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="slotslide-vertical" index="13" id="ddcl-slide_transition-i13" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i13">Slide Slots Vertical</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default dropdowntitleoption"><input disabled="" value="notselectable3" index="14" id="ddcl-slide_transition-i14" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i14">FADE TRANSITIONS</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="notransition" index="15" id="ddcl-slide_transition-i15" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i15">No Transition</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="fade" index="16" id="ddcl-slide_transition-i16" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i16">Fade</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="boxfade" index="17" id="ddcl-slide_transition-i17" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i17">Fade Boxes</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="slotfade-horizontal" index="18" id="ddcl-slide_transition-i18" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i18">Fade Slots Horizontal</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="slotfade-vertical" index="19" id="ddcl-slide_transition-i19" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i19">Fade Slots Vertical</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="fadefromright" index="20" id="ddcl-slide_transition-i20" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i20">Fade and Slide from Right</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="fadefromleft" index="21" id="ddcl-slide_transition-i21" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i21">Fade and Slide from Left</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="fadefromtop" index="22" id="ddcl-slide_transition-i22" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i22">Fade and Slide from Top</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="fadefrombottom" index="23" id="ddcl-slide_transition-i23" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i23">Fade and Slide from Bottom</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="fadetoleftfadefromright" index="24" id="ddcl-slide_transition-i24" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i24">Fade To Left and Fade From Right</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="fadetorightfadefromleft" index="25" id="ddcl-slide_transition-i25" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i25">Fade To Right and Fade From Left</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="fadetotopfadefrombottom" index="26" id="ddcl-slide_transition-i26" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i26">Fade To Top and Fade From Bottom</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="fadetobottomfadefromtop" index="27" id="ddcl-slide_transition-i27" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i27">Fade To Bottom and Fade From Top</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default dropdowntitleoption"><input disabled="" value="notselectable4" index="28" id="ddcl-slide_transition-i28" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i28">PARALLAX TRANSITIONS</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="parallaxtoright" index="29" id="ddcl-slide_transition-i29" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i29">Parallax to Right</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="parallaxtoleft" index="30" id="ddcl-slide_transition-i30" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i30">Parallax to Left</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="parallaxtotop" index="31" id="ddcl-slide_transition-i31" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i31">Parallax to Top</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="parallaxtobottom" index="32" id="ddcl-slide_transition-i32" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i32">Parallax to Bottom</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="parallaxhorizontal" index="33" id="ddcl-slide_transition-i33" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i33">Parallax Horizontal</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="parallaxvertical" index="34" id="ddcl-slide_transition-i34" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i34">Parallax Vertical</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default dropdowntitleoption"><input disabled="" value="notselectable5" index="35" id="ddcl-slide_transition-i35" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i35">ZOOM TRANSITIONS</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="scaledownfromright" index="36" id="ddcl-slide_transition-i36" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i36">Zoom Out and Fade From Right</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="scaledownfromleft" index="37" id="ddcl-slide_transition-i37" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i37">Zoom Out and Fade From Left</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="scaledownfromtop" index="38" id="ddcl-slide_transition-i38" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i38">Zoom Out and Fade From Top</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="scaledownfrombottom" index="39" id="ddcl-slide_transition-i39" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i39">Zoom Out and Fade From Bottom</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="zoomout" index="40" id="ddcl-slide_transition-i40" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i40">ZoomOut</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="zoomin" index="41" id="ddcl-slide_transition-i41" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i41">ZoomIn</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="slotzoom-horizontal" index="42" id="ddcl-slide_transition-i42" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i42">Zoom Slots Horizontal</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="slotzoom-vertical" index="43" id="ddcl-slide_transition-i43" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i43">Zoom Slots Vertical</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default dropdowntitleoption"><input disabled="" value="notselectable6" index="44" id="ddcl-slide_transition-i44" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i44">CURTAIN TRANSITIONS</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="curtain-1" index="45" id="ddcl-slide_transition-i45" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i45">Curtain from Left</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="curtain-2" index="46" id="ddcl-slide_transition-i46" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i46">Curtain from Right</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="curtain-3" index="47" id="ddcl-slide_transition-i47" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i47">Curtain from Middle</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default dropdowntitleoption"><input disabled="" value="notselectable7" index="48" id="ddcl-slide_transition-i48" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i48">PREMIUM TRANSITIONS</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="3dcurtain-horizontal" index="49" id="ddcl-slide_transition-i49" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i49">3D Curtain Horizontal</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="3dcurtain-vertical" index="50" id="ddcl-slide_transition-i50" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i50">3D Curtain Vertical</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="cube" index="51" id="ddcl-slide_transition-i51" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i51">Cube Vertical</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="cube-horizontal" index="52" id="ddcl-slide_transition-i52" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i52">Cube Horizontal</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="incube" index="53" id="ddcl-slide_transition-i53" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i53">In Cube Vertical</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="incube-horizontal" index="54" id="ddcl-slide_transition-i54" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i54">In Cube Horizontal</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="turnoff" index="55" id="ddcl-slide_transition-i55" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i55">TurnOff Horizontal</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="turnoff-vertical" index="56" id="ddcl-slide_transition-i56" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i56">TurnOff Vertical</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="papercut" index="57" id="ddcl-slide_transition-i57" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i57">Paper Cut</label></div><div style="white-space: nowrap;" class="ui-dropdownchecklist-item ui-state-default"><input disabled="" value="flyin" index="58" id="ddcl-slide_transition-i58" class="active" tabindex="0" type="checkbox"><label style="cursor: default;" class="ui-dropdownchecklist-text" for="ddcl-slide_transition-i58">Fly In</label></div></div></div>
																				
						<div class="description_container">
															<span class="description">The appearance transitions of this slide.</span>
													
						</div>
					</td>
					<td class="description_container_in_td">
															<span class="description">The appearance transitions of this slide.</span>
								
					</td>
				</tr>								
							<tr id="slot_amount_row" valign="top">
					<th scope="row">
						Slot&nbsp;Amount:
					</th>
					<td>
										<input class="small-text" id="slot_amount" name="slot_amount" value="7" type="text">
																				
						<div class="description_container">
															<span class="description">The number of slots or boxes the slide is divided into. If you use boxfade, over 7 slots can be juggy.</span>
													
						</div>
					</td>
					<td class="description_container_in_td">
															<span class="description">The number of slots or boxes the slide is divided into. If you use boxfade, over 7 slots can be juggy.</span>
								
					</td>
				</tr>								
							<tr id="transition_rotation_row" valign="top">
					<th scope="row">
						Rotation:
					</th>
					<td>
										<input class="small-text" id="transition_rotation" name="transition_rotation" value="0" type="text">
																				
						<div class="description_container">
															<span class="description">Rotation (-720 -&gt; 720, 999 = random) Only for Simple Transitions.</span>
													
						</div>
					</td>
					<td class="description_container_in_td">
															<span class="description">Rotation (-720 -&gt; 720, 999 = random) Only for Simple Transitions.</span>
								
					</td>
				</tr>								
							<tr id="transition_duration_row" valign="top">
					<th scope="row">
						Transition&nbsp;Duration:
					</th>
					<td>
										<input class="small-text" id="transition_duration" name="transition_duration" value="300" type="text">
																				
						<div class="description_container">
															<span class="description">The duration of the transition (Default:300, min: 100 max 2000). </span>
													
						</div>
					</td>
					<td class="description_container_in_td">
															<span class="description">The duration of the transition (Default:300, min: 100 max 2000). </span>
								
					</td>
				</tr>								
							<tr id="delay_row" valign="top">
					<th scope="row">
						Delay:
					</th>
					<td>
										<input class="small-text" id="delay" name="delay" value="" type="text">
																				
						<div class="description_container">
															<span class="description">A new delay value for the Slide. If no delay defined per slide, the delay defined via Options (5000ms) will be used</span>
													
						</div>
					</td>
					<td class="description_container_in_td">
															<span class="description">A new delay value for the Slide. If no delay defined per slide, the delay defined via Options (5000ms) will be used</span>
								
					</td>
				</tr>								
							<tr id="save_performance_row" valign="top">
					<th scope="row">
						Save&nbsp;Performance:
					</th>
					<td>
									<span id="save_performance_wrapper" class="radio_settings_wrapper">
								<div class="radio_inner_wrapper">
						<input id="save_performance_1" value="on" name="save_performance" type="radio">
						<label for="save_performance_1" style="cursor:pointer;">On</label>
					</div>
					
									<div class="radio_inner_wrapper">
						<input id="save_performance_2" value="off" name="save_performance" checked="checked" type="radio">
						<label for="save_performance_2" style="cursor:pointer;">Off</label>
					</div>
					
							</span>
																				
						<div class="description_container">
													
						</div>
					</td>
					<td class="description_container_in_td">
								
					</td>
				</tr>								
						<tr id="hr2_row">
				<td colspan="4" style="text-align:left;" align="left">
					 <hr> 
				</td>
			</tr>
							<tr id="enable_link_row" valign="top">
					<th scope="row">
						Enable&nbsp;Link:
					</th>
					<td>
									<select id="enable_link" name="enable_link">
								<option value="true">Enable</option>
									<option value="false" selected="selected">Disable</option>
							</select>
																				
						<div class="description_container">
													
						</div>
					</td>
					<td class="description_container_in_td">
								
					</td>
				</tr>								
							<tr id="link_type_row" style="display:none;" valign="top">
					<th scope="row">
						Link&nbsp;Type:
					</th>
					<td>
									<span id="link_type_wrapper" class="radio_settings_wrapper">
								<div class="radio_inner_wrapper">
						<input id="link_type_1" value="regular" name="link_type" checked="checked" type="radio">
						<label for="link_type_1" style="cursor:pointer;">Regular</label>
					</div>
					
									<div class="radio_inner_wrapper">
						<input id="link_type_2" value="slide" name="link_type" type="radio">
						<label for="link_type_2" style="cursor:pointer;">To Slide</label>
					</div>
					
							</span>
																				
						<div class="description_container">
													
						</div>
					</td>
					<td class="description_container_in_td">
								
					</td>
				</tr>								
							<tr id="link_row" style="display:none;" valign="top">
					<th scope="row">
						Slide&nbsp;Link:
					</th>
					<td>
										<input class="regular-text" id="rev_link" name="link" value="" type="text">
																				
						<div class="description_container">
															<span class="description">A link on the whole slide pic (use %link% or %meta:somemegatag% in template sliders to link to a post or some other meta)</span>
													
						</div>
					</td>
					<td class="description_container_in_td">
															<span class="description">A link on the whole slide pic (use %link% or %meta:somemegatag% in template sliders to link to a post or some other meta)</span>
								
					</td>
				</tr>								
							<tr id="link_open_in_row" style="display:none;" valign="top">
					<th scope="row">
						Link&nbsp;Open&nbsp;In:
					</th>
					<td>
									<select id="link_open_in" name="link_open_in">
								<option value="same" selected="selected">Same Window</option>
									<option value="new">New Window</option>
							</select>
																				
						<div class="description_container">
															<span class="description">The target of the slide link</span>
													
						</div>
					</td>
					<td class="description_container_in_td">
															<span class="description">The target of the slide link</span>
								
					</td>
				</tr>								
							<tr id="slide_link_row" style="display:none;" class="disabled" valign="top">
					<th scope="row">
						Link&nbsp;To&nbsp;Slide:
					</th>
					<td>
									<select id="slide_link" name="slide_link" disabled="disabled">
								<option value="nothing" selected="selected">-- Not Chosen --</option>
									<option value="next">-- Next Slide --</option>
									<option value="prev">-- Previous Slide --</option>
									<option value="50">Slide</option>
									<option value="52">Slide</option>
									<option value="57">Slide</option>
									<option value="58">Slide</option>
									<option value="59">Slide</option>
									<option value="60">Slide</option>
									<option value="61">Slide</option>
									<option value="62">Slide</option>
							</select>
																				
						<div class="description_container">
													
						</div>
					</td>
					<td class="description_container_in_td">
								
					</td>
				</tr>								
							<tr id="link_pos_row" style="display:none;" valign="top">
					<th scope="row">
						Link&nbsp;Position:
					</th>
					<td>
									<span id="link_pos_wrapper" class="radio_settings_wrapper">
								<div class="radio_inner_wrapper">
						<input id="link_pos_1" value="front" name="link_pos" checked="checked" type="radio">
						<label for="link_pos_1" style="cursor:pointer;">Front</label>
					</div>
					
									<div class="radio_inner_wrapper">
						<input id="link_pos_2" value="back" name="link_pos" type="radio">
						<label for="link_pos_2" style="cursor:pointer;">Back</label>
					</div>
					
							</span>
																				
						<div class="description_container">
															<span class="description">The position of the link related to layers</span>
													
						</div>
					</td>
					<td class="description_container_in_td">
															<span class="description">The position of the link related to layers</span>
								
					</td>
				</tr>								
						<tr id="hr3_row">
				<td colspan="4" style="text-align:left;" align="left">
					 <hr> 
				</td>
			</tr>
							<tr id="slide_thumb_row" valign="top">
					<th scope="row">
						Thumbnail:
					</th>
					<td>
										<span id="slide_thumb_button_preview" class="setting-image-preview"></span>
				
				<input id="slide_thumb" name="slide_thumb" value="" type="hidden">
				
				<input original-title="" id="slide_thumb_button" style="width: 110px !important; float: left;" class="button-image-select button-primary revblue" value="Choose Image" type="button">
				<input original-title="" class="button-image-remove button-primary revred" style="width: 110px !important;" id="slide_thumb_button_remove" value="Remove" type="button">
				<div class="clear"></div>
																				
						<div class="description_container">
															<span class="description">Slide Thumbnail. If not set - it will be taken from the slide image.</span>
													
						</div>
					</td>
					<td class="description_container_in_td">
															<span class="description">Slide Thumbnail. If not set - it will be taken from the slide image.</span>
								
					</td>
				</tr>								
							<tr id="background_type_row" style="display:none;" valign="top">
					<th scope="row">
						Background&nbsp;Type:
					</th>
					<td>
										<input class="regular-text" id="background_type" name="background_type" value="solid" type="text">
																				
						<div class="description_container">
													
						</div>
					</td>
					<td class="description_container_in_td">
								
					</td>
				</tr>								
						<tr id="hr4_row">
				<td colspan="4" style="text-align:left;" align="left">
					 <hr> 
				</td>
			</tr>
							<tr id="class_attr_row" valign="top">
					<th scope="row">
						Class:
					</th>
					<td>
										<input class="regular-text" id="class_attr" name="class_attr" value="" type="text">
																				
						<div class="description_container">
															<span class="description">Adds a unique class to the li of the Slide like class="rev_special_class" (add only the classnames, seperated by space)</span>
													
						</div>
					</td>
					<td class="description_container_in_td">
															<span class="description">Adds a unique class to the li of the Slide like class="rev_special_class" (add only the classnames, seperated by space)</span>
								
					</td>
				</tr>								
							<tr id="id_attr_row" valign="top">
					<th scope="row">
						ID:
					</th>
					<td>
										<input class="regular-text" id="id_attr" name="id_attr" value="" type="text">
																				
						<div class="description_container">
															<span class="description">Adds a unique ID to the li of the Slide like id="rev_special_id" (add only the id)</span>
													
						</div>
					</td>
					<td class="description_container_in_td">
															<span class="description">Adds a unique ID to the li of the Slide like id="rev_special_id" (add only the id)</span>
								
					</td>
				</tr>								
							<tr id="attr_attr_row" valign="top">
					<th scope="row">
						Attribute:
					</th>
					<td>
										<input class="regular-text" id="attr_attr" name="attr_attr" value="" type="text">
																				
						<div class="description_container">
															<span class="description">Adds a unique Attribute to the li of the Slide like attr="rev_special_attr" (add only the attribute)</span>
													
						</div>
					</td>
					<td class="description_container_in_td">
															<span class="description">Adds a unique Attribute to the li of the Slide like attr="rev_special_attr" (add only the attribute)</span>
								
					</td>
				</tr>								
							<tr id="data_attr_row" valign="top">
					<th scope="row">
						Custom&nbsp;Fields:
					</th>
					<td>
										<textarea style="width: 222px; height: 93px;" id="data_attr" name="data_attr"></textarea>
																				
						<div class="description_container">
															<span class="description">Add as many attributes as you wish here. (i.e.: data-layer="firstlayer" data-custom="somevalue")</span>
													
						</div>
					</td>
					<td class="description_container_in_td">
															<span class="description">Add as many attributes as you wish here. (i.e.: data-layer="firstlayer" data-custom="somevalue")</span>
								
					</td>
				</tr>								
			</tbody></table>			
			
						</div>
									<input id="image_url" name="image_url" value="http://ddb.toantran.com/wp-content/uploads/2014/07/DSC_1980.jpg" type="hidden">
						<input id="image_id" name="image_id" value="372" type="hidden">
					</form>
				</div>
			</div>

		
		<div id="jqueryui_error_message" class="unite_error_message" style="display:none;">
				<b>Warning!!! </b>The jquery ui javascript include that is loaded by some of the plugins are custom made and not contain needed components like 'autocomplete' or 'draggable' function.
				Without those functions the editor may not work correctly. Please remove those custom jquery ui includes in order the editor will work correctly.
		 </div>

		
	<div class="edit_slide_wrapper">
					<div class="editor_buttons_wrapper  postbox unite-postbox" style="max-width:100% !important;">
				<h3 class="box-closed tp-accordion">
					<span class="postbox-arrow2">-</span><span>Slider Main Image / Background</span>
				</h3>
				<div class="toggled-content">
					<div class="inner_wrapper p10 pb0 pt0 boxsized">
						<div class="editor_buttons_wrapper_top">
							<h3 style="cursor:default !important; background:none !important;border:none;box-shadow:none !important;font-size:12px;padding:0px;margin:10px 0px 0px;">Background Source:</h3>


							<!-- IMAGE FROM MEDIAGALLERY -->
							<input style="float:left" name="radio_bgtype" class="bgsrcchanger" data-callid="tp-bgimagewpsrc" data-imgsettings="on" data-bgtype="image" id="radio_back_image" type="radio">
							<label style="float:left;margin-left:5px;margin-top:2px;" for="radio_back_image">Image BG</label>
							<!-- THE BG IMAGE CHANGED DIV -->
							<div id="tp-bgimagewpsrc" class="bgsrcchanger-div" style="display:none;float:left;margin-top:-7px;">
								<a original-title="" href="javascript:void(0)" id="button_change_image" class="button-primary revblue button-disabled" style="margin-bottom:5px">Change Image</a>
							</div>


							<!-- IMAGE FROM EXTERNAL -->
							<input name="radio_bgtype" style="float:left;margin-left:15px;" data-callid="tp-bgimageextsrc" data-imgsettings="on" class="bgsrcchanger" data-bgtype="external" id="radio_back_external" type="radio">
							<label style="float:left;margin-left:5px;margin-top:2px;" for="radio_back_external">External URL</label>
							<!-- THE BG IMAGE FROM EXTERNAL SOURCE -->
							<div id="tp-bgimageextsrc" class="bgsrcchanger-div" style="display:none;float:left;margin-top:-7px;">
								<input name="bg_external" id="slide_bg_external" value="" class="disabled" type="text">
								<a original-title="" href="javascript:void(0)" id="button_change_external" class="button-primary revblue button-disabled" style="margin-bottom:5px">Get External</a>
							</div>


							<!-- TRANSPARENT BACKGROUND -->
							<input name="radio_bgtype" style="float:left;margin-left:15px;" data-callid="" class="bgsrcchanger" data-bgtype="trans" id="radio_back_trans" type="radio">
							<label style="float:left;margin-left:5px;margin-top:2px;" for="radio_back_trans">Transparent</label>


							<!-- COLORED BACKGROUND -->
							<input name="radio_bgtype" style="float:left;margin-left:15px;" data-callid="tp-bgcolorsrc" class="bgsrcchanger" data-bgtype="solid" id="radio_back_solid" checked="solid" type="radio">
							<label style="float:left;margin-left:5px;margin-top:2px;" for="radio_back_solid">Solid Colored</label>

							<!-- THE COLOR SELECTOR -->
							<div id="tp-bgcolorsrc" class="bgsrcchanger-div" style="display: block; float: left; margin-top: -5px;">
								<input name="bg_color" id="slide_bg_color" class="inputColorPicker slide_bg_color" style="background-color:#E7E7E7" value="#E7E7E7" type="text">
							</div>

							<!--<a href="javascript:void(0)" id="button_preview_slide" class="button-primary revbluedark" style="float:right;margin-top:-9px !important;" title="Preview Slide"><i class="revicon-search-1"></i>Preview Slide</a>
	-->
							<div style="clear:both"></div>

							<!-- PREVIEW BUTTON -->

							<!-- THE BG IMAGE SETTINGS -->
							<div id="tp-bgimagesettings" class="bgsrcchanger-div" style="margin-top: 10px; display: none;">
								<div id="bg-setting-wrap">
									<h3 style="cursor:default !important; background:none !important;border:none;box-shadow:none !important;font-size:12px;padding:0px;margin:17px 0px 0px;">Background Settings:</h3>
									<label for="slide_bg_fit">Background Fit:</label>
									<select name="bg_fit" id="slide_bg_fit" style="margin-right:20px">
										<option value="cover" selected="selected">cover</option>
										<option value="contain">contain</option>
										<option value="percentage">(%, %)</option>
										<option value="normal">normal</option>
									</select>
									<input name="bg_fit_x" style="display: none;  width:60px;margin-right:10px" value="100" type="text">
									<input name="bg_fit_y" style="display: none;  width:60px;margin-right:10px" value="100" type="text">

									<label for="slide_bg_repeat">Background Repeat:</label>
									<select name="bg_repeat" id="slide_bg_repeat" style="margin-right:20px">
										<option value="no-repeat" selected="selected">no-repeat</option>
										<option value="repeat">repeat</option>
										<option value="repeat-x">repeat-x</option>
										<option value="repeat-y">repeat-y</option>
									</select>
									<label for="slide_bg_position" id="bg-position-lbl">Background Position:</label>
									<div id="bg-start-position-wrapper">
										<select name="bg_position" id="slide_bg_position">
											<option value="center top" selected="selected">center top</option>
											<option value="center right">center right</option>
											<option value="center bottom">center bottom</option>
											<option value="center center">center center</option>
											<option value="left top">left top</option>
											<option value="left center">left center</option>
											<option value="left bottom">left bottom</option>
											<option value="right top">right top</option>
											<option value="right center">right center</option>
											<option value="right bottom">right bottom</option>
											<option value="percentage">(x%, y%)</option>
										</select><input name="bg_position_x" style="display: none;" value="0" type="text"><input name="bg_position_y" style="display: none;" value="0" type="text">
									</div>
								</div>
								<div style="clear:both"></div>
								<h3 style="cursor:default !important; background:none !important;border:none;box-shadow:none !important;font-size:12px;padding:0px;margin:17px 0px 0px; float: left;">Ken Burns / Pan Zoom Settings:</h3>

								<div style="margin-top: 15px; margin-left: 10px; float: left;">
									<input name="kenburn_effect" value="on" type="radio"> On&nbsp;&nbsp;<input name="kenburn_effect" value="off" checked="checked" type="radio"> Off								</div>
								<div class="clear"></div>

								<table id="kenburn_wrapper" style="display: none;">
									<tbody><tr>
										<td>Background</td>
										<td></td>
										<td></td>
										<td style="width: 15px;">&nbsp;</td>
										<td></td>
										<td>&nbsp;</td>
										<td></td>
										<td style="width: 15px;">&nbsp;</td>
										<td colspan="2"></td>
									</tr>
									<tr>
										<td>Start Position:</td>
										<td colspan="2" id="bg-start-position-wrapper-kb">

										</td>
										<td></td>
										<td>Start Fit: (in %)</td>
										<td colspan="2"><input name="kb_start_fit" value="100" type="text"></td>
										<td></td>
										<td>Easing:</td>
										<td>
											<select name="kb_easing">
												<option selected="selected" value="Linear.easeNone">Linear.easeNone</option>
												<option value="Power0.easeIn">Power0.easeIn  (linear)</option>
												<option value="Power0.easeInOut">Power0.easeInOut  (linear)</option>
												<option value="Power0.easeOut">Power0.easeOut  (linear)</option>
												<option value="Power1.easeIn">Power1.easeIn</option>
												<option value="Power1.easeInOut">Power1.easeInOut</option>
												<option value="Power1.easeOut">Power1.easeOut</option>
												<option value="Power2.easeIn">Power2.easeIn</option>
												<option value="Power2.easeInOut">Power2.easeInOut</option>
												<option value="Power2.easeOut">Power2.easeOut</option>
												<option value="Power3.easeIn">Power3.easeIn</option>
												<option value="Power3.easeInOut">Power3.easeInOut</option>
												<option value="Power3.easeOut">Power3.easeOut</option>
												<option value="Power4.easeIn">Power4.easeIn</option>
												<option value="Power4.easeInOut">Power4.easeInOut</option>
												<option value="Power4.easeOut">Power4.easeOut</option>
												<option value="Back.easeIn">Back.easeIn</option>
												<option value="Back.easeInOut">Back.easeInOut</option>
												<option value="Back.easeOut">Back.easeOut</option>
												<option value="Bounce.easeIn">Bounce.easeIn</option>
												<option value="Bounce.easeInOut">Bounce.easeInOut</option>
												<option value="Bounce.easeOut">Bounce.easeOut</option>
												<option value="Circ.easeIn">Circ.easeIn</option>
												<option value="Circ.easeInOut">Circ.easeInOut</option>
												<option value="Circ.easeOut">Circ.easeOut</option>
												<option value="Elastic.easeIn">Elastic.easeIn</option>
												<option value="Elastic.easeInOut">Elastic.easeInOut</option>
												<option value="Elastic.easeOut">Elastic.easeOut</option>
												<option value="Expo.easeIn">Expo.easeIn</option>
												<option value="Expo.easeInOut">Expo.easeInOut</option>
												<option value="Expo.easeOut">Expo.easeOut</option>
												<option value="Sine.easeIn">Sine.easeIn</option>
												<option value="Sine.easeInOut">Sine.easeInOut</option>
												<option value="Sine.easeOut">Sine.easeOut</option>
												<option value="SlowMo.ease">SlowMo.ease</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>End Position:</td>
										<td colspan="2">
											<select name="bg_end_position" id="slide_bg_end_position">
												<option value="center top" selected="selected">center top</option>
												<option value="center right">center right</option>
												<option value="center bottom">center bottom</option>
												<option value="center center">center center</option>
												<option value="left top">left top</option>
												<option value="left center">left center</option>
												<option value="left bottom">left bottom</option>
												<option value="right top">right top</option>
												<option value="right center">right center</option>
												<option value="right bottom">right bottom</option>
												<option value="percentage">(x%, y%)</option>
											</select><input name="bg_end_position_x" style="display: none;" value="0" type="text"><input name="bg_end_position_y" style="display: none;" value="0" type="text">
										</td>
										<td></td>
										<td>End Fit: (in %)</td>
										<td colspan="2"><input name="kb_end_fit" value="100" type="text"></td>
																				<td></td>
										<td>Duration (in ms):</td>
										<td><input name="kb_duration" value="2000" type="text"></td>
									</tr>

								</tbody></table>

							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>

			<div class="clear"></div>

			<div class="divide20"></div>
			
							<div class="editor_buttons_wrapper  postbox unite-postbox" style="max-width:100% !important;">
			<h3 class="box-closed tp-accordion">
				<span>Slide</span>
			</h3>
			<div class="layer-editor-toolbar">
				<span class="setting_text_3">Helper Grid:</span>
				<select name="rs-grid-sizes" id="rs-grid-sizes">
					<option value="1">Disabled</option>
					<option value="5">5 x 5</option>
					<option value="10">10 x 10</option>
					<option value="25">25 x 25</option>
					<option value="50">50 x 50</option>
				</select>
				
				<span class="setting_text_3">Snap to:</span>
				<select name="rs-grid-snapto" id="rs-grid-snapto">
					<option value="">None</option>
					<option value=".helplines">Help Lines</option>
					<option value=".slide_layer">Layers</option>
				</select>
				
								
			</div>
			<div id="divLayers-wrapper" style="height: 420px; margin: 0px auto; max-width: 100%;" class="slide_wrap_layers">
				<div id="divbgholder" style="background-color: rgb(231, 231, 231); width: 100%; min-width: 960px; background-size: cover; background-repeat: no-repeat; background-position: center top;" class=""></div>
				<div id="divLayers" class="slide_layers" style="height:420px; margin: 0 auto;width:960px;"><div id="slide_layer_0" style="z-index: 1; position: absolute; white-space: nowrap; right: auto; left: 109px; bottom: auto; top: 286px; height: auto; width: auto;" class="slide_layer ui-draggable"><div style="max-width: none; max-height: 13px; white-space: nowrap; transform-origin: 50% 50% 0px; transform: matrix(1, 0, 0, 1, 0, 0);" class="innerslide_layer tp-caption black">Caption Text1</div><div style="left: -11px; top: -11px;" class="icon_cross"></div></div><div id="slide_layer_1" style="z-index: 2; position: absolute; white-space: nowrap; right: auto; left: 100px; bottom: auto; top: 100px;" class="slide_layer ui-draggable layer_selected ui-resizable"><div style="" class="innerslide_layer tp-caption black">Caption Text2<div class="ui-rotatable-handle ui-draggable"></div></div><div style="left: -11px; top: -11px;" class="icon_cross"></div><div style="z-index: 90;" class="ui-resizable-handle ui-resizable-n"></div><div style="z-index: 90;" class="ui-resizable-handle ui-resizable-e"></div><div style="z-index: 90;" class="ui-resizable-handle ui-resizable-s"></div><div style="z-index: 90;" class="ui-resizable-handle ui-resizable-w"></div><div style="z-index: 90;" class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se"></div><div style="z-index: 90;" class="ui-resizable-handle ui-resizable-sw"></div><div style="z-index: 90;" class="ui-resizable-handle ui-resizable-ne"></div><div style="z-index: 90;" class="ui-resizable-handle ui-resizable-nw"></div></div></div>
			</div>
			<div class="clear"></div>
			<div class="editor_buttons_wrapper  postbox unite-postbox" style="max-width:100% !important;">
			<div style="width:100%; border-top:1px solid #f1f1f1; margin-top:0px;"></div>
			<div class="toggled-content">
				<div class="inner_wrapper p10 pb0 pt0 boxsized">
										<div class="editor_buttons_wrapper_bottom">
						<div style="float:left">
							<a original-title="" href="javascript:void(0)" id="button_add_layer" data-isstatic="false" class="button-primary revblue"><i class="revicon-layers-alt"></i>Add Layer</a>
							<a original-title="" href="javascript:void(0)" id="button_add_layer_image" data-isstatic="false" class="button-primary revblue"><i class="revicon-picture-1"></i>Add Layer: Image </a>
							<a original-title="" href="javascript:void(0)" id="button_add_layer_video" data-isstatic="false" class="button-primary revblue"><i class="revicon-video"></i>Add Layer: Video </a>
							<!--a href="javascript:void(0)" id="button_add_layer_image_static" class="button-primary revblue"><i class="revicon-picture-1"></i>Add Static Layer: Image </a>
							<a href="javascript:void(0)" id="button_add_layer_video_static" class="button-primary revblue"><i class="revicon-video"></i>Add Static Layer: Video </a-->
							<a original-title="" href="javascript:void(0)" id="button_duplicate_layer" class="button-primary revyellow"><i class="revicon-picture"></i>Duplicate Layer</a>
						</div>
						<div style="float:right;">
							<a original-title="" href="javascript:void(0)" id="button_delete_layer" class="button-primary  revred"><i class="revicon-trash"></i>Delete Layer</a>
							<a original-title="" href="javascript:void(0)" id="button_delete_all" class="button-primary  revred"><i class="revicon-trash"></i>Delete All Layers </a>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		</div>
		<div class="clear"></div>
		<div class="divide20"></div>
			<div class="layer_props_wrapper">
				<div class="edit_layers_right" style="position:relative;height:100%">
					<div class="postbox unite-postbox layer_sortbox" style="height:100%;">
						<div class="open_right_panel">
							<div class="open_right_panel_bullet"></div>
							<div class="open_right_panel_bullet bulsecond"></div>
							<div class="open_right_panel_bullet bulthird"></div>																		
						</div>							
						<h3 class="no-accordion">
							<span>Layers Timing &amp; Sorting</span>																																				
						</h3>
						<div style="display:table; line-height:30px">
							<div style="display:table-cell; padding:10px 15px; min-width:45px;">z-Index</div>
							<div style="display:table-cell; min-width:78px">
								<div original-title="Hide All Layers" id="button_sort_visibility" class="tipsy_enabled_top"><i class="eg-icon-eye"></i><i class="eg-icon-eye-off"></i></div>
								<div original-title="Lock All Layers" id="button_sort_lock" class="tipsy_enabled_top"><i class="eg-icon-lock-open"></i><i class="eg-icon-lock"></i></div>	
								<div original-title="Snap to Slide End / Custom End" id="button_sort_tillend" class="tipsy_enabled_top"><i class="eg-icon-back-in-time"></i></div>											
							</div>
							<div style="display:table-cell;padding:10px 15px 10px 0px;width:100%">Timing								<div original-title="Show / Hide Timer Settings" id="button_sort_timing" class="button-primary revblue" style="margin-left:15px !important"><i class="eg-icon-equalizer"></i> <span class="onoff"> - on</span></div>
							</div>									
							<div style="display:table-cell;padding:10px 0px 10px 0px; min-width:50px;">Start</div>									
							<div style="display:table-cell;padding:10px 0px 10px 0px; min-width:54px;">End</div>																		
						</div>									
						
						<div class="inside" style="margin:0;">
							<ul id="sortlist" class="sortlist ui-sortable"><li id="layer_sort_0" class="ui-state-default"><div class="sort_content_container"><span style="display:table-cell"><i class="eg-icon-sort"></i></span><div class="layer_sort_input_depth sortbox-tablecell"><input class="sortbox_depth" readonly="" title="Edit Depth" value="1" type="text"></div><div class="sortbox-tablecell sort-iconcollection"><span class="sortbox_eye" title="Show / Hide Layer"><i class="eg-icon-eye"></i><i class="eg-icon-eye-off"></i></span><span class="sortbox_lock" title="Lock / Unlock Layer"><i class="eg-icon-lock-open"></i><i class="eg-icon-lock"></i></span><span class="till_slideend tillendon" title="Snap to Slide End / Custom End"><i class="eg-icon-back-in-time"></i><i class="eg-icon-minus"></i></span></div><div style="position:relative;" class="sort-hover-part layer_sort_layer_text_field sortbox-tablecell" <span=""><i style="margin:0px 10px" class="eg-icon-font"></i>Caption Text1<div class="timeline"><div style="width: 90%; left: 10%;" class="tl-fullanim ui-draggable ui-resizable"><div style="width: 19.56px;" class="tl-startanim"></div><div style="width: 19.56px;" class="tl-endanim"></div><div style="z-index: 90;" class="ui-resizable-handle ui-resizable-w"></div><div style="z-index: 90;" class="ui-resizable-handle ui-resizable-e"></div></div></div></div><div class="layer_sort_inputs sortbox-tablecell"><input class="sortbox_time" title="Edit Layer Start" value="500" type="text"><input class="sortbox_timeend" title="Edit Layer End" value="5000" type="text"></div></div></li><li id="layer_sort_1" class="ui-state-hover"><div class="sort_content_container"><span style="display:table-cell"><i class="eg-icon-sort"></i></span><div class="layer_sort_input_depth sortbox-tablecell"><input class="sortbox_depth" readonly="" title="Edit Depth" value="2" type="text"></div><div class="sortbox-tablecell sort-iconcollection"><span class="sortbox_eye" title="Show / Hide Layer"><i class="eg-icon-eye"></i><i class="eg-icon-eye-off"></i></span><span class="sortbox_lock" title="Lock / Unlock Layer"><i class="eg-icon-lock-open"></i><i class="eg-icon-lock"></i></span><span class="till_slideend tillendon" title="Snap to Slide End / Custom End"><i class="eg-icon-back-in-time"></i><i class="eg-icon-minus"></i></span></div><div style="position:relative;" class="sort-hover-part layer_sort_layer_text_field sortbox-tablecell" <span=""><i style="margin:0px 10px" class="eg-icon-font"></i>Caption Text2<div class="timeline"><div style="width: 90%; left: 10%;" class="tl-fullanim ui-draggable ui-resizable"><div style="width: 19.56px;" class="tl-startanim"></div><div style="width: 19.56px;" class="tl-endanim"></div><div style="z-index: 90;" class="ui-resizable-handle ui-resizable-w"></div><div style="z-index: 90;" class="ui-resizable-handle ui-resizable-e"></div></div></div></div><div class="layer_sort_inputs sortbox-tablecell"><input class="sortbox_time" title="Edit Layer Start" value="500" type="text"><input class="sortbox_timeend" title="Edit Layer End" value="5000" type="text"></div></div></li></ul>
						</div>
						
						<div class="clear"></div>
					</div>
				</div>
				
						
			<!-----  Left Layers Form ------>

				<div class="edit_layers_left">

					<form name="form_layers" id="form_layers">
						<script type="text/javascript">
							g_settingsObj['form_layers'] = {}
						</script>
						
												<!-- THE GENERAL LAYER PARAMETERS -->
						<div class="settings_wrapper" style="display: none;">
							<div class="postbox unite-postbox">
								<h3 class="no-accordion tp-accordion tpa-closed box_closed"><span class="postbox-arrow2">+</span>
									<span>Static Options </span>
								</h3>
								<div style="display: none;" class="toggled-content tp-closeifotheropen">
									<ul class="list_settings">
																				<div id="layer_static_wrapper">
											<li>
												<div original-title="" id="static_start_on_wrap" class="setting_text">Start on Slide</div>
												<select class="" id="layer_static_start" name="static_start">
																												<option selected="selected" value="1">1</option>
																														<option value="2">2</option>
																														<option value="3">3</option>
																														<option value="4">4</option>
																														<option value="5">5</option>
																														<option value="6">6</option>
																														<option value="7">7</option>
																											</select>
											</li>
											<div class="clear"></div>
											<li>
												<div original-title="" id="static_end_on_wrap" class="setting_text">End on Slide</div>
												<select class="" id="layer_static_end" name="static_end"><option selected="selected" value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option></select>
											</li>
										</div>
									</ul>
								</div>
							</div>
						</div>
						
						<!-- THE GENERAL LAYER PARAMETERS -->
						<div class="settings_wrapper">
							<div class="postbox unite-postbox">
								<h3 class="no-accordion tp-accordion tpa-closed box_closed"><span class="postbox-arrow2">+</span>
									<span>Layer General Parameters </span>
								</h3>
								<div style="display: none;" class="toggled-content tp-closeifotheropen">
									<ul class="list_settings">
										<li id="end_layer_sap" class="attribute_title" style="margin-top:-10px;">
											<span class="setting_text_2 text-disabled" original-title="">Layer Content</span>
											<!--<hr>-->
										</li>
														<li id="layer_caption_row">
					
											<div original-title="" id="layer_caption_text" class="setting_text">Style</div>
										
										
					<div class="setting_input">
										<input autocomplete="off" class="textbox-caption ui-autocomplete-input" id="layer_caption" name="layer_caption" value="black" type="text"><span class="ui-helper-hidden-accessible" aria-live="polite" role="status"></span>
								</div>
																					<div class="settings_addhtml"><div original-title="" id="layer_captions_down" style="width:30px; text-align:center;padding:0px;" class="revgray button-primary ui-state-active"><i class="eg-icon-down-dir"></i></div><a original-title="" href="javascript:void(0)" id="button_edit_css" class="button-primary revblue"><i class="revicon-magic"></i>Edit Style</a><a original-title="" href="javascript:void(0)" id="button_edit_css_global" class="button-primary revblue"><i class="revicon-palette"></i>Edit Global Style</a></div>
										<div class="clear"></div>
				</li>
							<div id="css_editor_wrap" title="Style Editor" style="display:none;">

				<div class="tp-present-wrapper-parent"><div class="tp-present-wrapper"><div class="tp-present-caption"><div style="border-style: none; text-decoration: none; background-color: rgb(0, 0, 0);" id="css_preview" class="">example</div></div></div></div>
				<ul class="list_idlehover">
					<li><a href="javascript:void(0)" id="change-type-idle" class="change-type selected"><span class="nowrap">Idle</span></a></li>
					<li><a href="javascript:void(0)" id="change-type-hover" class="change-type"><span class="nowrap">Hover</span></a></li>					
					<div style="clear:both"></div>
				</ul>
				<div role="tablist" class="ui-accordion ui-widget ui-helper-reset" id="css-editor-accordion">
					<h3 tabindex="0" aria-selected="true" aria-controls="ui-accordion-css-editor-accordion-panel-0" id="ui-accordion-css-editor-accordion-header-0" role="tab" class="ui-accordion-header ui-helper-reset ui-state-default ui-accordion-header-active ui-state-active ui-corner-top ui-accordion-icons"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-s"></span>Simple Editor:</h3>
					<div aria-hidden="false" aria-expanded="true" role="tabpanel" aria-labelledby="ui-accordion-css-editor-accordion-header-0" id="ui-accordion-css-editor-accordion-panel-0" style="display: block;" class="css_editor_novice_wrap ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom ui-accordion-content-active">
						<table style="border-spacing:0px">
							<tbody><tr class="css-edit-enable"><td colspan="4"><input class="css_edit_novice" name="css_allow" type="checkbox"> enable  <span id="css_editor_allow"></span></td></tr>
							<!--<tr class="css-edit-enable css-edit-title topborder"><td colspan="4"></td></tr>-->
							<tr class="css-edit-title"><td colspan="4">Font</td></tr>
							<tr class="css-edit-title noborder"><td colspan="4"></td></tr>														
							<tr>
								<td>Family:</td>
								<td>
									<input autocomplete="off" class="css_edit_novice ui-autocomplete-input" style="width:160px; line-height:17px;margin-top:3px;" id="font_family" name="css_font-family" value="" type="text"><span class="ui-helper-hidden-accessible" aria-live="polite" role="status"></span>
									<div id="font_family_down" class="ui-corner-all ui-state-active" style="margin-right:0px"><span class="ui-icon ui-icon-arrowthick-1-s"></span></div>
								</td>
								<td>Size:</td>
								<td>
									<div aria-disabled="false" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" id="font-size-slider"><div style="width: 0%;" class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min"></div><a style="left: 0%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a></div>
									<input class="css_edit_novice" name="css_font-size" value="" type="hidden">
								</td>
							</tr>
							<tr>
								<td>Color:</td>
								<td><input name="css_color" data-linkto="color" style="width:160px" class="inputColorPicker css_edit_novice w100" value="" type="text"></td>
								
								<td>Line-Height:</td>
								<td>
									<div aria-disabled="false" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" id="line-height-slider"><div style="width: 0%;" class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min"></div><a style="left: 0%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a></div>
									<input class="css_edit_novice" name="css_line-height" value="" type="hidden">
								</td>
							</tr>
							<tr>
								<td>Padding:</td>
								<td>
									<div class="sub_main_wrapper">
										<div class="subslider_wrapper"><input class="css_edit_novice pad-input sub-input" name="css_padding[]" value="" type="text"></div>
										<div class="subslider_wrapper"><input class="css_edit_novice pad-input sub-input" name="css_padding[]" value="" type="text"></div>
										<div class="subslider_wrapper"><input class="css_edit_novice pad-input sub-input" name="css_padding[]" value="" type="text"></div>
										<div class="subslider_wrapper"><input class="css_edit_novice pad-input sub-input" name="css_padding[]" value="" type="text"></div>
										<div style="clear:both"></div>
									</div>
								</td>
								<td>Weight:</td>
								<td>
									<div aria-disabled="false" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" id="font-weight-slider"><div style="width: 0%;" class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min"></div><a style="left: 0%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a></div>
									<input class="css_edit_novice" name="css_font-weight" value="" type="hidden">
								</td>
							</tr>
							<tr>
								<td>Style:</td>
								<td><input name="css_font-style" class="css_edit_novice" type="checkbox"> italic</td>
								
								<td>Decoration:</td>
								<td>
									<select class="css_edit_novice w100" style="cursor:pointer" name="css_text-decoration">
										<option value="none">none</option>
										<option value="underline">underline</option>
										<option value="overline">overline</option>
										<option value="line-through">line-through</option>
									</select>
								</td>
							</tr>
							<tr class="css-edit-title noborder"><td colspan="4"></td></tr>							
							<tr class="css-edit-title"><td colspan="4">Background</td></tr>
							<tr class="css-edit-title noborder"><td colspan="4"></td></tr>														
							<tr>
								<td>Color:</td>
								<td>
									<input name="css_background-color" style="width:160px;float:left" data-linkto="background-color" class="inputColorPicker css_edit_novice" value="" type="text">
									<a href="javascript:void(0);" id="reset-background-color"><i class="revicon-ccw editoricon" style="float:left"></i></a>
								</td>
								<td>Transparency:</td>
								<td>
									<div aria-disabled="false" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" id="background-transparency-slider"><div style="width: 0%;" class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min"></div><a style="left: 0%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a></div>
									<input class="css_edit_novice" name="css_background-transparency" value="1" type="hidden">
								</td>
							</tr>
							<tr class="css-edit-title noborder"><td colspan="4"></td></tr>							
							<tr class="css-edit-title"><td colspan="4">Border</td></tr>
							<tr class="css-edit-title noborder"><td colspan="4"></td></tr>														
							<tr>
								<td>Color:</td>
								<td>
									<input name="css_border-color-show" data-linkto="border-color" style="width:160px;float:left" class="inputColorPicker css_edit_novice" value="" type="text">
									<input name="css_border-color" class="css_edit_novice" value="" type="hidden">
									<a href="javascript:void(0);" id="reset-border-color"><i class="revicon-ccw editoricon" style="float:left"></i></a>
								</td>
								<td>Width:</td>
								<td>
									<div aria-disabled="false" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" id="border-width-slider"><div style="width: 0%;" class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min"></div><a style="left: 0%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#"></a></div>
									<input class="css_edit_novice" name="css_border-width" value="" type="hidden">
								</td>
							</tr>
							<tr>
								<td>Style:</td>
								<td>
									<select class="css_edit_novice w100" style="cursor:pointer" name="css_border-style">
										<option value="none">none</option>
										<option value="dotted">dotted</option>
										<option value="dashed">dashed</option>
										<option value="solid">solid</option>
										<option value="double">double</option>
									</select>
								</td>
								<td>Radius:</td>
								<td>
									<div class="sub_main_wrapper">										
										<div class="subslider_wrapper"><input class="css_edit_novice corn-input sub-input" name="css_border-radius[]" value="" type="text"><div style="visibility: hidden;" aria-disabled="false" class="subslider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div style="width: 0%;" class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min"></div><a style="left: 0%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#">px</a></div></div>
										<div class="subslider_wrapper"><input class="css_edit_novice corn-input sub-input" name="css_border-radius[]" value="" type="text"><div style="visibility: hidden;" aria-disabled="false" class="subslider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div style="width: 0%;" class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min"></div><a style="left: 0%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#">px</a></div></div>
										<div class="subslider_wrapper"><input class="css_edit_novice corn-input sub-input" name="css_border-radius[]" value="" type="text"><div style="visibility: hidden;" aria-disabled="false" class="subslider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div style="width: 0%;" class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min"></div><a style="left: 0%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#">px</a></div></div>
										<div class="subslider_wrapper"><input class="css_edit_novice corn-input sub-input" name="css_border-radius[]" value="" type="text"><div style="visibility: hidden;" aria-disabled="false" class="subslider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div style="width: 0%;" class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min"></div><a style="left: 0%;" class="ui-slider-handle ui-state-default ui-corner-all" href="#">px</a></div></div>
										<div style="clear:both"></div>
									</div>
								</td>
							</tr>
							<tr class="css-edit-title noborder"><td colspan="4"></td></tr>							
						</tbody></table>
						<div class="css_editor-disable-inputs">&nbsp;</div>
					</div>
					<h3 tabindex="-1" aria-selected="false" aria-controls="ui-accordion-css-editor-accordion-panel-1" id="ui-accordion-css-editor-accordion-header-1" role="tab" class="notopradius ui-accordion-header ui-helper-reset ui-state-default ui-corner-all ui-accordion-icons" style="margin-top:20px"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>Advanced Editor:</h3>
					<div aria-hidden="true" aria-expanded="false" role="tabpanel" aria-labelledby="ui-accordion-css-editor-accordion-header-1" id="ui-accordion-css-editor-accordion-panel-1" style="display: none;" class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom">
						<textarea class="" id="textarea_edit_expert" rows="20" cols="81"></textarea>
					</div>
				</div>
			</div>
			
			<div id="dialog-change-css" title="Save Styles" style="display:none;">
				<p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 50px 0;"></span>Overwrite the current selected class "<span id="current-class-handle"></span>" or save the styles as a new class?</p>
			</div>
			
			<div id="dialog-change-css-save-as" title="Save As" style="display:none;">
				<p>
					Save as class:<br>
					<input class="" name="css_save_as" value="" type="text">
				</p>
			</div>
			
						<div id="css_static_editor_wrap" title="Global Style Editor" style="display:none;">
				<div role="tablist" class="ui-accordion ui-widget ui-helper-reset" id="css-static-accordion">
					<h3 tabindex="0" aria-selected="true" aria-controls="ui-accordion-css-static-accordion-panel-0" id="ui-accordion-css-static-accordion-header-0" role="tab" class="ui-accordion-header ui-helper-reset ui-state-default ui-accordion-header-active ui-state-active ui-corner-top ui-accordion-icons"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-s"></span>Dynamic Styles (Not Editable):</h3>
					<div aria-hidden="false" aria-expanded="true" role="tabpanel" aria-labelledby="ui-accordion-css-static-accordion-header-0" id="ui-accordion-css-static-accordion-panel-0" style="display: block;" class="css_editor_novice_wrap ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom ui-accordion-content-active">
						<textarea class="" id="textarea_show_dynamic_styles" rows="20" cols="81"></textarea>
					</div>
					<h3 tabindex="-1" aria-selected="false" aria-controls="ui-accordion-css-static-accordion-panel-1" id="ui-accordion-css-static-accordion-header-1" role="tab" class="notopradius ui-accordion-header ui-helper-reset ui-state-default ui-corner-all ui-accordion-icons" style="margin-top:20px"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>Static Styles:</h3>
					<div aria-hidden="true" aria-expanded="false" role="tabpanel" aria-labelledby="ui-accordion-css-static-accordion-header-1" id="ui-accordion-css-static-accordion-panel-1" style="display: none;" class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom">
						<textarea class="" id="textarea_edit_static" rows="20" cols="81"></textarea>
					</div>
				</div>
			</div>
			
			<div id="dialog-change-css-static" title="Save Static Styles" style="display:none;">
				<p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 50px 0;"></span>Overwrite current static styles?</p>
			</div>
							<li id="layer_text_row">
					
											<div original-title="" id="layer_text_text" class="setting_text">Text&nbsp;/&nbsp;Html</div>
										
											<div class="settings_addhtmlbefore"><a original-title="" href="javascript:void(0)" id="linkInsertButton" class="revblue button-primary">Insert Button</a></div>
										
					<div class="setting_input">
										<textarea style="height: 80px;" id="layer_text" class="area-layer-params" name="layer_text"></textarea>				
								</div>
																				<div class="clear"></div>
				</li>
								<li id="button_edit_video_row" style="display:none;">
					
										
										
					<div class="setting_input">
										<input original-title="" id="button_edit_video" value="Edit Video" class="button-primary revblue" type="button">
								</div>
																				<div class="clear"></div>
				</li>
								<li id="button_change_image_source_row" style="display:none;">
					
										
										
					<div class="setting_input">
										<input original-title="" id="button_change_image_source" value="Change Image Source" class="button-primary revblue" type="button">
								</div>
																				<div class="clear"></div>
				</li>
								<li id="layer_alt_row" style="display:none;">
					
											<div original-title="" id="layer_alt_text" class="setting_text">Alt&nbsp;Text</div>
										
										
					<div class="setting_input">
										<input class="area-alt-params" id="layer_alt" name="layer_alt" value="" type="text">
								</div>
																				<div class="clear"></div>
				</li>
														<li style="clear:both">
											<span class="setting_text_2 text-disabled" original-title="">Align, Position &amp; Styling</span>
											<!--<hr>-->
										</li>
										<li class="align_table_wrapper">
											<table id="align_table" class="align_table">
												<tbody><tr>
													<td><a class="selected" href="javascript:void(0)" id="linkalign_left_top" data-hor="left" data-vert="top"></a></td>
													<td><a href="javascript:void(0)" id="linkalign_center_top" data-hor="center" data-vert="top"></a></td>
													<td><a href="javascript:void(0)" id="linkalign_right_top" data-hor="right" data-vert="top"></a></td>
												</tr>
												<tr>
													<td><a href="javascript:void(0)" id="linkalign_left_middle" data-hor="left" data-vert="middle"></a></td>
													<td><a href="javascript:void(0)" id="linkalign_center_middle" data-hor="center" data-vert="middle"></a></td>
													<td><a href="javascript:void(0)" id="linkalign_right_middle" data-hor="right" data-vert="middle"></a></td>
												</tr>
												<tr>
													<td><a href="javascript:void(0)" id="linkalign_left_bottom" data-hor="left" data-vert="bottom"></a></td>
													<td><a href="javascript:void(0)" id="linkalign_center_bottom" data-hor="center" data-vert="bottom"></a></td>
													<td><a href="javascript:void(0)" id="linkalign_right_bottom" data-hor="right" data-vert="bottom"></a></td>
												</tr>
											</tbody></table>
										</li>
										<div style="float:left;width:300px;">
											<div style="clear:both">
															<li id="layer_left_row">
					
											<div original-title="" id="layer_left_text" class="setting_text" data-textoffset="OffsetX" data-textnormal="X">X</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_left" name="layer_left" value="" type="text">
								</div>
																				<div class="clear"></div>
				</li>
								<li id="layer_top_row">
					
											<div original-title="" id="layer_top_text" class="setting_text" data-textoffset="OffsetY" data-textnormal="Y">Y</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_top" name="layer_top" value="" type="text">
								</div>
																				<div class="clear"></div>
				</li>
															</div>
											<div style="clear:both">
															<li id="layer_whitespace_row" style="display: block;">
					
											<div original-title="" id="layer_whitespace_text" class="setting_text">White&nbsp;Space</div>
										
										
					<div class="setting_input">
									<select class="" id="layer_whitespace" name="layer_whitespace">
								<option value="normal">Normal</option>
									<option value="pre">Pre</option>
									<option value="nowrap" selected="selected">No-wrap</option>
									<option value="pre-wrap">Pre-Wrap</option>
									<option value="pre-line">Pre-Line</option>
							</select>
								</div>
																				<div class="clear"></div>
				</li>
															</div>

											<div style="clear:both;display:none">
															<li id="layer_align_hor_row" style="display:none;">
					
											<div original-title="" id="layer_align_hor_text" class="setting_text">Hor&nbsp;Align</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_align_hor" name="layer_align_hor" value="left" type="text">
								</div>
																				<div class="clear"></div>
				</li>
								<li id="layer_align_vert_row" style="display:none;">
					
											<div original-title="" id="layer_align_vert_text" class="setting_text">Vert&nbsp;Align</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_align_vert" name="layer_align_vert" value="top" type="text">
								</div>
																				<div class="clear"></div>
				</li>
															</div>
											<div style="clear:both"></div>
											<div>
															<li id="layer_max_width_row" style="display: block;">
					
											<div original-title="" id="layer_max_width_text" class="setting_text">Max&nbsp;Width</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_max_width" name="layer_max_width" value="auto" type="text">
								</div>
											<div class="setting_unit">&nbsp;(example: 50px, 50%, auto)</div>
																				<div class="clear"></div>
				</li>
								<li id="layer_max_height_row" style="display: block;">
					
											<div original-title="" id="layer_max_height_text" class="setting_text">Max&nbsp;Height</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_max_height" name="layer_max_height" value="auto" type="text">
								</div>
											<div class="setting_unit">&nbsp;(example: 50px, 50%, auto)</div>
																				<div class="clear"></div>
				</li>
															</div>
										</div>
										
										<li id="layer_scale_title_row" style="clear: both; display: none;">
											<span class="setting_text_2 text-disabled" original-title="">Image Scale (dimensions in pixel)</span>
											<!--<hr>-->
										</li>
										<a original-title="" id="reset-scale" class="revred button-primary" href="javascript:void(0);">Reset Size</a>
														<li style="display: none;" id="layer_scaleX_row">
					
											<div original-title="" id="layer_scaleX_text" class="setting_text" data-textproportional="Width/Height" data-textnormal="Width">Width</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_scaleX" name="layer_scaleX" value="" type="text">
								</div>
																				<div class="clear"></div>
				</li>
								<li style="display: none;" id="layer_scaleY_row">
					
											<div original-title="" id="layer_scaleY_text" class="setting_text">Height</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_scaleY" name="layer_scaleY" value="" type="text">
								</div>
																				<div class="clear"></div>
				</li>
								<li style="display: none;" id="layer_proportional_scale_row">
					
											<div original-title="" id="layer_proportional_scale_text" class="setting_text"><label class="" for="layer_proportional_scale">Scale&nbsp;Proportional</label></div>
										
										
					<div class="setting_input">
										<input id="layer_proportional_scale" class="inputCheckbox" name="layer_proportional_scale" type="checkbox">
								</div>
																				<div class="clear"></div>
				</li>
														
										<li id="layer_2d_title_row" style="clear:both;">
											<span class="setting_text_2 text-disabled" original-title="">Final Rotation</span>
											<!--<hr>-->
										</li>
										<div style="clear: both;">
															<li id="layer_2d_rotation_row">
					
											<div original-title="" id="layer_2d_rotation_text" class="setting_text">2D&nbsp;Rotation</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_2d_rotation" name="layer_2d_rotation" value="0" type="text">
								</div>
											<div class="setting_unit">&nbsp;(-360 - 360)</div>
																				<div class="clear"></div>
				</li>
								<li id="layer_2d_origin_x_row">
					
											<div original-title="" id="layer_2d_origin_x_text" class="setting_text">Rotation&nbsp;Origin&nbsp;X</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_2d_origin_x" name="layer_2d_origin_x" value="50" type="text">
								</div>
											<div class="setting_unit">%&nbsp;(-100 - 200)</div>
																				<div class="clear"></div>
				</li>
								<li id="layer_2d_origin_y_row">
					
											<div original-title="" id="layer_2d_origin_y_text" class="setting_text">Rotation&nbsp;Origin&nbsp;Y</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_2d_origin_y" name="layer_2d_origin_y" value="50" type="text">
								</div>
											<div class="setting_unit">%&nbsp;(-100 - 200)</div>
																				<div class="clear"></div>
				</li>
														</div>
										
										<div id="parallax_wrapper_div" style="display: none;">
											<li id="parallax_title_row" style="clear:both;">
												<span class="setting_text_2 text-disabled" original-title="">Parallax Setting</span>
												<!--hr-->
											</li>
															<li id="parallax_level_row">
					
											<div original-title="" id="parallax_level_text" class="setting_text">Level</div>
										
										
					<div class="setting_input">
									<select class="" id="parallax_level" name="parallax_level">
								<option value="-">No Movement</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
							</select>
								</div>
																				<div class="clear"></div>
				</li>
														</div>
									</ul>
									<div class="clear"></div>
								</div>
							</div>
						</div>

						<!-- THE ANIMATION PARAMETERS -->
						<div class="settings_wrapper">
							<div class="postbox unite-postbox">
								<h3 class="no-accordion tp-accordion"><span class="postbox-arrow2">-</span>
									<span>Layer Animation </span>
								</h3>
								<div style="display: block;" class="toggled-content tp-closedatstart tp-closeifotheropen">
									<ul class="list_settings">

										<!--LAYER START ANIMATION -->
										<li id="end_layer_sap" class="attribute_title" style="margin-top:-10px;">
											<span class="setting_text_2 text-disabled" original-title="">Preview Transition (Star end Endtime is Ignored during Demo)</span>
											<!--<hr>-->
										</li>
										<div id="preview_caption_transition">

											<div class="preview_caption_wrapper">
												<div style="visibility: visible; opacity: 0; transform-origin: 50% 50% 0px; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, -0.00166, 0, 0, 1, 0.998333);" id="preview_caption_animateme">LAYER EXAMPLE</div>
											</div>

											<div class="" id="preview_looper"><i class="revicon-arrows-ccw"></i><span class="replyinfo">ON</span></div>
										</div>

										<div class="divide10"></div>

										<!--LAYER START ANIMATION -->
										<li id="end_layer_sap" class="attribute_title" style="">
											<span class="setting_text_2 text-disabled" original-title="">Start Transition</span>
											<!--<hr>-->
										</li>
										<div class="layer-animations">
											<div style="float:left;margin-right:10px;">				<li id="layer_animation_row">
					
											<div original-title="" id="layer_animation_text" class="setting_text">Start&nbsp;Animation</div>
										
										
					<div class="setting_input">
									<select class="" id="layer_animation" name="layer_animation">
								<option selected="selected" value="tp-fade">Fade</option>
									<option value="sft">Short from Top</option>
									<option value="sfb">Short from Bottom</option>
									<option value="sfr">Short from Right</option>
									<option value="sfl">Short from Left</option>
									<option value="lft">Long from Top</option>
									<option value="lfb">Long from Bottom</option>
									<option value="lfr">Long from Right</option>
									<option value="lfl">Long from Left</option>
									<option value="skewfromright">Skew From Long Right</option>
									<option value="skewfromleft">Skew From Long Left</option>
									<option value="skewfromrightshort">Skew From Short Right</option>
									<option value="skewfromleftshort">Skew From Short Left</option>
									<option value="randomrotate">Random Rotate</option>
							</select>
								</div>
																				<div class="clear"></div>
				</li>
				</div>

											<a original-title="" href="javascript:void(0)" id="add_customanimation_in" class="button-primary revblue"><i class="revicon-equalizer"></i>Custom Animation</a>
											<div class="clear"></div>
															<li id="layer_easing_row">
					
											<div original-title="" id="layer_easing_text" class="setting_text">Start&nbsp;Easing</div>
										
										
					<div class="setting_input">
									<select class="" id="layer_easing" name="layer_easing">
								<option value="Linear.easeNone">Linear.easeNone</option>
									<option value="Power0.easeIn">Power0.easeIn  (linear)</option>
									<option value="Power0.easeInOut">Power0.easeInOut  (linear)</option>
									<option value="Power0.easeOut">Power0.easeOut  (linear)</option>
									<option value="Power1.easeIn">Power1.easeIn</option>
									<option value="Power1.easeInOut">Power1.easeInOut</option>
									<option value="Power1.easeOut">Power1.easeOut</option>
									<option value="Power2.easeIn">Power2.easeIn</option>
									<option value="Power2.easeInOut">Power2.easeInOut</option>
									<option value="Power2.easeOut">Power2.easeOut</option>
									<option value="Power3.easeIn">Power3.easeIn</option>
									<option value="Power3.easeInOut" selected="selected">Power3.easeInOut</option>
									<option value="Power3.easeOut">Power3.easeOut</option>
									<option value="Power4.easeIn">Power4.easeIn</option>
									<option value="Power4.easeInOut">Power4.easeInOut</option>
									<option value="Power4.easeOut">Power4.easeOut</option>
									<option value="Quad.easeIn">Quad.easeIn  (same as Power1.easeIn)</option>
									<option value="Quad.easeInOut">Quad.easeInOut  (same as Power1.easeInOut)</option>
									<option value="Quad.easeOut">Quad.easeOut  (same as Power1.easeOut)</option>
									<option value="Cubic.easeIn">Cubic.easeIn  (same as Power2.easeIn)</option>
									<option value="Cubic.easeInOut">Cubic.easeInOut  (same as Power2.easeInOut)</option>
									<option value="Cubic.easeOut">Cubic.easeOut  (same as Power2.easeOut)</option>
									<option value="Quart.easeIn">Quart.easeIn  (same as Power3.easeIn)</option>
									<option value="Quart.easeInOut">Quart.easeInOut  (same as Power3.easeInOut)</option>
									<option value="Quart.easeOut">Quart.easeOut  (same as Power3.easeOut)</option>
									<option value="Quint.easeIn">Quint.easeIn  (same as Power4.easeIn)</option>
									<option value="Quint.easeInOut">Quint.easeInOut  (same as Power4.easeInOut)</option>
									<option value="Quint.easeOut">Quint.easeOut  (same as Power4.easeOut)</option>
									<option value="Strong.easeIn">Strong.easeIn  (same as Power4.easeIn)</option>
									<option value="Strong.easeInOut">Strong.easeInOut  (same as Power4.easeInOut)</option>
									<option value="Strong.easeOut">Strong.easeOut  (same as Power4.easeOut)</option>
									<option value="Back.easeIn">Back.easeIn</option>
									<option value="Back.easeInOut">Back.easeInOut</option>
									<option value="Back.easeOut">Back.easeOut</option>
									<option value="Bounce.easeIn">Bounce.easeIn</option>
									<option value="Bounce.easeInOut">Bounce.easeInOut</option>
									<option value="Bounce.easeOut">Bounce.easeOut</option>
									<option value="Circ.easeIn">Circ.easeIn</option>
									<option value="Circ.easeInOut">Circ.easeInOut</option>
									<option value="Circ.easeOut">Circ.easeOut</option>
									<option value="Elastic.easeIn">Elastic.easeIn</option>
									<option value="Elastic.easeInOut">Elastic.easeInOut</option>
									<option value="Elastic.easeOut">Elastic.easeOut</option>
									<option value="Expo.easeIn">Expo.easeIn</option>
									<option value="Expo.easeInOut">Expo.easeInOut</option>
									<option value="Expo.easeOut">Expo.easeOut</option>
									<option value="Sine.easeIn">Sine.easeIn</option>
									<option value="Sine.easeInOut">Sine.easeInOut</option>
									<option value="Sine.easeOut">Sine.easeOut</option>
									<option value="SlowMo.ease">SlowMo.ease</option>
									<option value="easeOutBack">easeOutBack</option>
									<option value="easeInQuad">easeInQuad</option>
									<option value="easeOutQuad">easeOutQuad</option>
									<option value="easeInOutQuad">easeInOutQuad</option>
									<option value="easeInCubic">easeInCubic</option>
									<option value="easeOutCubic">easeOutCubic</option>
									<option value="easeInOutCubic">easeInOutCubic</option>
									<option value="easeInQuart">easeInQuart</option>
									<option value="easeOutQuart">easeOutQuart</option>
									<option value="easeInOutQuart">easeInOutQuart</option>
									<option value="easeInQuint">easeInQuint</option>
									<option value="easeOutQuint">easeOutQuint</option>
									<option value="easeInOutQuint">easeInOutQuint</option>
									<option value="easeInSine">easeInSine</option>
									<option value="easeOutSine">easeOutSine</option>
									<option value="easeInOutSine">easeInOutSine</option>
									<option value="easeInExpo">easeInExpo</option>
									<option value="easeOutExpo">easeOutExpo</option>
									<option value="easeInOutExpo">easeInOutExpo</option>
									<option value="easeInCirc">easeInCirc</option>
									<option value="easeOutCirc">easeOutCirc</option>
									<option value="easeInOutCirc">easeInOutCirc</option>
									<option value="easeInElastic">easeInElastic</option>
									<option value="easeOutElastic">easeOutElastic</option>
									<option value="easeInOutElastic">easeInOutElastic</option>
									<option value="easeInBack">easeInBack</option>
									<option value="easeInOutBack">easeInOutBack</option>
									<option value="easeInBounce">easeInBounce</option>
									<option value="easeOutBounce">easeOutBounce</option>
									<option value="easeInOutBounce">easeInOutBounce</option>
							</select>
								</div>
																				<div class="clear"></div>
				</li>
								<li id="layer_speed_row">
					
											<div original-title="" id="layer_speed_text" class="setting_text">Start&nbsp;Duration</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_speed" name="layer_speed" value="" type="text">
								</div>
											<div class="setting_unit">ms</div>
																				<div class="clear"></div>
				</li>
								<li id="layer_split_row">
					
											<div original-title="" id="layer_split_text" class="setting_text">Split&nbsp;Text&nbsp;per</div>
										
										
					<div class="setting_input">
									<select class="" id="layer_split" name="layer_split">
								<option value="none" selected="selected">No Split</option>
									<option value="chars">Char Based</option>
									<option value="words">Word Based</option>
									<option value="lines">Line Based</option>
							</select>
								</div>
																				<div class="clear"></div>
				</li>
								<li id="layer_splitdelay_row">
					
											<div original-title="" id="layer_splitdelay_text" class="setting_text">Split&nbsp;Delay</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_splitdelay" name="layer_splitdelay" value="10" type="text">
								</div>
											<div class="setting_unit"> ms (keep it low i.e. 1- 200)</div>
																				<div class="clear"></div>
				</li>
														</div>
										<!--LAYER END ANIMATION -->
										<li id="end_layer_sap" class="attribute_title" style="">
											<span class="setting_text_2 text-disabled" original-title="">End Transition (optional)</span>
											<!--<hr>-->
										</li>
										<div class="layer-animations">
										<div style="float:left;margin-right:10px;">				<li id="layer_endanimation_row">
					
											<div original-title="" id="layer_endanimation_text" class="setting_text">End&nbsp;Animation</div>
										
										
					<div class="setting_input">
									<select class="" id="layer_endanimation" name="layer_endanimation">
								<option value="auto" selected="selected">Choose Automatic</option>
									<option value="fadeout">Fade Out</option>
									<option value="stt">Short to Top</option>
									<option value="stb">Short to Bottom</option>
									<option value="stl">Short to Left</option>
									<option value="str">Short to Right</option>
									<option value="ltt">Long to Top</option>
									<option value="ltb">Long to Bottom</option>
									<option value="ltl">Long to Left</option>
									<option value="ltr">Long to Right</option>
									<option value="skewtoright">Skew To Right</option>
									<option value="skewtoleft">Skew To Left</option>
									<option value="skewtorightshort">Skew To Right Short</option>
									<option value="skewtoleftshort">Skew To Left Short</option>
									<option value="randomrotateout">Random Rotate Out</option>
							</select>
								</div>
																				<div class="clear"></div>
				</li>
				</div>

											<a original-title="" href="javascript:void(0)" id="add_customanimation_out" class="button-primary revblue"><i class="revicon-equalizer"></i>Custom Animation</a>
											<div class="clear"></div>
															<li id="layer_endeasing_row">
					
											<div original-title="" id="layer_endeasing_text" class="setting_text">End&nbsp;Easing</div>
										
										
					<div class="setting_input">
									<select class="" id="layer_endeasing" name="layer_endeasing">
								<option value="nothing" selected="selected">No Change</option>
									<option value="Linear.easeNone">Linear.easeNone</option>
									<option value="Power0.easeIn">Power0.easeIn  (linear)</option>
									<option value="Power0.easeInOut">Power0.easeInOut  (linear)</option>
									<option value="Power0.easeOut">Power0.easeOut  (linear)</option>
									<option value="Power1.easeIn">Power1.easeIn</option>
									<option value="Power1.easeInOut">Power1.easeInOut</option>
									<option value="Power1.easeOut">Power1.easeOut</option>
									<option value="Power2.easeIn">Power2.easeIn</option>
									<option value="Power2.easeInOut">Power2.easeInOut</option>
									<option value="Power2.easeOut">Power2.easeOut</option>
									<option value="Power3.easeIn">Power3.easeIn</option>
									<option value="Power3.easeInOut">Power3.easeInOut</option>
									<option value="Power3.easeOut">Power3.easeOut</option>
									<option value="Power4.easeIn">Power4.easeIn</option>
									<option value="Power4.easeInOut">Power4.easeInOut</option>
									<option value="Power4.easeOut">Power4.easeOut</option>
									<option value="Quad.easeIn">Quad.easeIn  (same as Power1.easeIn)</option>
									<option value="Quad.easeInOut">Quad.easeInOut  (same as Power1.easeInOut)</option>
									<option value="Quad.easeOut">Quad.easeOut  (same as Power1.easeOut)</option>
									<option value="Cubic.easeIn">Cubic.easeIn  (same as Power2.easeIn)</option>
									<option value="Cubic.easeInOut">Cubic.easeInOut  (same as Power2.easeInOut)</option>
									<option value="Cubic.easeOut">Cubic.easeOut  (same as Power2.easeOut)</option>
									<option value="Quart.easeIn">Quart.easeIn  (same as Power3.easeIn)</option>
									<option value="Quart.easeInOut">Quart.easeInOut  (same as Power3.easeInOut)</option>
									<option value="Quart.easeOut">Quart.easeOut  (same as Power3.easeOut)</option>
									<option value="Quint.easeIn">Quint.easeIn  (same as Power4.easeIn)</option>
									<option value="Quint.easeInOut">Quint.easeInOut  (same as Power4.easeInOut)</option>
									<option value="Quint.easeOut">Quint.easeOut  (same as Power4.easeOut)</option>
									<option value="Strong.easeIn">Strong.easeIn  (same as Power4.easeIn)</option>
									<option value="Strong.easeInOut">Strong.easeInOut  (same as Power4.easeInOut)</option>
									<option value="Strong.easeOut">Strong.easeOut  (same as Power4.easeOut)</option>
									<option value="Back.easeIn">Back.easeIn</option>
									<option value="Back.easeInOut">Back.easeInOut</option>
									<option value="Back.easeOut">Back.easeOut</option>
									<option value="Bounce.easeIn">Bounce.easeIn</option>
									<option value="Bounce.easeInOut">Bounce.easeInOut</option>
									<option value="Bounce.easeOut">Bounce.easeOut</option>
									<option value="Circ.easeIn">Circ.easeIn</option>
									<option value="Circ.easeInOut">Circ.easeInOut</option>
									<option value="Circ.easeOut">Circ.easeOut</option>
									<option value="Elastic.easeIn">Elastic.easeIn</option>
									<option value="Elastic.easeInOut">Elastic.easeInOut</option>
									<option value="Elastic.easeOut">Elastic.easeOut</option>
									<option value="Expo.easeIn">Expo.easeIn</option>
									<option value="Expo.easeInOut">Expo.easeInOut</option>
									<option value="Expo.easeOut">Expo.easeOut</option>
									<option value="Sine.easeIn">Sine.easeIn</option>
									<option value="Sine.easeInOut">Sine.easeInOut</option>
									<option value="Sine.easeOut">Sine.easeOut</option>
									<option value="SlowMo.ease">SlowMo.ease</option>
									<option value="easeOutBack">easeOutBack</option>
									<option value="easeInQuad">easeInQuad</option>
									<option value="easeOutQuad">easeOutQuad</option>
									<option value="easeInOutQuad">easeInOutQuad</option>
									<option value="easeInCubic">easeInCubic</option>
									<option value="easeOutCubic">easeOutCubic</option>
									<option value="easeInOutCubic">easeInOutCubic</option>
									<option value="easeInQuart">easeInQuart</option>
									<option value="easeOutQuart">easeOutQuart</option>
									<option value="easeInOutQuart">easeInOutQuart</option>
									<option value="easeInQuint">easeInQuint</option>
									<option value="easeOutQuint">easeOutQuint</option>
									<option value="easeInOutQuint">easeInOutQuint</option>
									<option value="easeInSine">easeInSine</option>
									<option value="easeOutSine">easeOutSine</option>
									<option value="easeInOutSine">easeInOutSine</option>
									<option value="easeInExpo">easeInExpo</option>
									<option value="easeOutExpo">easeOutExpo</option>
									<option value="easeInOutExpo">easeInOutExpo</option>
									<option value="easeInCirc">easeInCirc</option>
									<option value="easeOutCirc">easeOutCirc</option>
									<option value="easeInOutCirc">easeInOutCirc</option>
									<option value="easeInElastic">easeInElastic</option>
									<option value="easeOutElastic">easeOutElastic</option>
									<option value="easeInOutElastic">easeInOutElastic</option>
									<option value="easeInBack">easeInBack</option>
									<option value="easeInOutBack">easeInOutBack</option>
									<option value="easeInBounce">easeInBounce</option>
									<option value="easeOutBounce">easeOutBounce</option>
									<option value="easeInOutBounce">easeInOutBounce</option>
							</select>
								</div>
																				<div class="clear"></div>
				</li>
								<li id="layer_endspeed_row">
					
											<div original-title="" id="layer_endspeed_text" class="setting_text">End&nbsp;Duration</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_endspeed" name="layer_endspeed" value="" type="text">
								</div>
											<div class="setting_unit">ms</div>
																				<div class="clear"></div>
				</li>
								<li id="layer_endtime_row" style="display:none;">
					
											<div original-title="" id="layer_endtime_text" class="setting_text">End&nbsp;Time</div>
										
										
					<div class="setting_input">
										<input title="" class="text-sidebar" id="layer_endtime" name="layer_endtime" value="" type="text">
								</div>
											<div class="setting_unit">ms</div>
																				<div class="clear"></div>
				</li>
								<li id="layer_endsplit_row">
					
											<div original-title="" id="layer_endsplit_text" class="setting_text">Split&nbsp;Text&nbsp;per</div>
										
										
					<div class="setting_input">
									<select class="" id="layer_endsplit" name="layer_endsplit">
								<option value="none" selected="selected">No Split</option>
									<option value="chars">Char Based</option>
									<option value="words">Word Based</option>
									<option value="lines">Line Based</option>
							</select>
								</div>
																				<div class="clear"></div>
				</li>
								<li id="layer_endsplitdelay_row">
					
											<div original-title="" id="layer_endsplitdelay_text" class="setting_text">End&nbsp;Split&nbsp;Delay</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_endsplitdelay" name="layer_endsplitdelay" value="10" type="text">
								</div>
											<div class="setting_unit"> ms (keep it low i.e. 1- 200)</div>
																				<div class="clear"></div>
				</li>
				
										</div>

										<!--LAYER LOOP ANIMATION -->
										<li id="loop_layer_sap" class="attribute_title" style="">
											<span class="setting_text_2 text-disabled" original-title="">Loop Animation</span>
											<!--<hr>-->
										</li>
														<li id="layer_loop_animation_row">
					
											<div original-title="" id="layer_loop_animation_text" class="setting_text">Animation</div>
										
										
					<div class="setting_input">
									<select class="" id="layer_loop_animation" name="layer_loop_animation">
								<option value="none" selected="selected">Disabled</option>
									<option value="rs-pendulum">Pendulum</option>
									<option value="rs-slideloop">Slideloop</option>
									<option value="rs-pulse">Pulse</option>
									<option value="rs-wave">Wave</option>
							</select>
								</div>
																				<div class="clear"></div>
				</li>
														<div id="layer_speed_wrapper" style="display: none;">
															<li id="layer_loop_speed_row">
					
											<div original-title="" id="layer_loop_speed_text" class="setting_text">Speed</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_loop_speed" name="layer_loop_speed" value="2" type="text">
								</div>
											<div class="setting_unit">&nbsp;(0.00 - 10.00)</div>
																				<div class="clear"></div>
				</li>
														</div>
										<div id="layer_easing_wrapper" style="display: none;">
															<li id="layer_loop_easing_row">
					
											<div original-title="" id="layer_loop_easing_text" class="setting_text">Easing</div>
										
										
					<div class="setting_input">
									<select class="" id="layer_loop_easing" name="layer_loop_easing">
								<option value="Linear.easeNone">Linear.easeNone</option>
									<option value="Power0.easeIn">Power0.easeIn  (linear)</option>
									<option value="Power0.easeInOut">Power0.easeInOut  (linear)</option>
									<option value="Power0.easeOut">Power0.easeOut  (linear)</option>
									<option value="Power1.easeIn">Power1.easeIn</option>
									<option value="Power1.easeInOut">Power1.easeInOut</option>
									<option value="Power1.easeOut">Power1.easeOut</option>
									<option value="Power2.easeIn">Power2.easeIn</option>
									<option value="Power2.easeInOut">Power2.easeInOut</option>
									<option value="Power2.easeOut">Power2.easeOut</option>
									<option value="Power3.easeIn">Power3.easeIn</option>
									<option value="Power3.easeInOut" selected="selected">Power3.easeInOut</option>
									<option value="Power3.easeOut">Power3.easeOut</option>
									<option value="Power4.easeIn">Power4.easeIn</option>
									<option value="Power4.easeInOut">Power4.easeInOut</option>
									<option value="Power4.easeOut">Power4.easeOut</option>
									<option value="Quad.easeIn">Quad.easeIn  (same as Power1.easeIn)</option>
									<option value="Quad.easeInOut">Quad.easeInOut  (same as Power1.easeInOut)</option>
									<option value="Quad.easeOut">Quad.easeOut  (same as Power1.easeOut)</option>
									<option value="Cubic.easeIn">Cubic.easeIn  (same as Power2.easeIn)</option>
									<option value="Cubic.easeInOut">Cubic.easeInOut  (same as Power2.easeInOut)</option>
									<option value="Cubic.easeOut">Cubic.easeOut  (same as Power2.easeOut)</option>
									<option value="Quart.easeIn">Quart.easeIn  (same as Power3.easeIn)</option>
									<option value="Quart.easeInOut">Quart.easeInOut  (same as Power3.easeInOut)</option>
									<option value="Quart.easeOut">Quart.easeOut  (same as Power3.easeOut)</option>
									<option value="Quint.easeIn">Quint.easeIn  (same as Power4.easeIn)</option>
									<option value="Quint.easeInOut">Quint.easeInOut  (same as Power4.easeInOut)</option>
									<option value="Quint.easeOut">Quint.easeOut  (same as Power4.easeOut)</option>
									<option value="Strong.easeIn">Strong.easeIn  (same as Power4.easeIn)</option>
									<option value="Strong.easeInOut">Strong.easeInOut  (same as Power4.easeInOut)</option>
									<option value="Strong.easeOut">Strong.easeOut  (same as Power4.easeOut)</option>
									<option value="Back.easeIn">Back.easeIn</option>
									<option value="Back.easeInOut">Back.easeInOut</option>
									<option value="Back.easeOut">Back.easeOut</option>
									<option value="Bounce.easeIn">Bounce.easeIn</option>
									<option value="Bounce.easeInOut">Bounce.easeInOut</option>
									<option value="Bounce.easeOut">Bounce.easeOut</option>
									<option value="Circ.easeIn">Circ.easeIn</option>
									<option value="Circ.easeInOut">Circ.easeInOut</option>
									<option value="Circ.easeOut">Circ.easeOut</option>
									<option value="Elastic.easeIn">Elastic.easeIn</option>
									<option value="Elastic.easeInOut">Elastic.easeInOut</option>
									<option value="Elastic.easeOut">Elastic.easeOut</option>
									<option value="Expo.easeIn">Expo.easeIn</option>
									<option value="Expo.easeInOut">Expo.easeInOut</option>
									<option value="Expo.easeOut">Expo.easeOut</option>
									<option value="Sine.easeIn">Sine.easeIn</option>
									<option value="Sine.easeInOut">Sine.easeInOut</option>
									<option value="Sine.easeOut">Sine.easeOut</option>
									<option value="SlowMo.ease">SlowMo.ease</option>
									<option value="easeOutBack">easeOutBack</option>
									<option value="easeInQuad">easeInQuad</option>
									<option value="easeOutQuad">easeOutQuad</option>
									<option value="easeInOutQuad">easeInOutQuad</option>
									<option value="easeInCubic">easeInCubic</option>
									<option value="easeOutCubic">easeOutCubic</option>
									<option value="easeInOutCubic">easeInOutCubic</option>
									<option value="easeInQuart">easeInQuart</option>
									<option value="easeOutQuart">easeOutQuart</option>
									<option value="easeInOutQuart">easeInOutQuart</option>
									<option value="easeInQuint">easeInQuint</option>
									<option value="easeOutQuint">easeOutQuint</option>
									<option value="easeInOutQuint">easeInOutQuint</option>
									<option value="easeInSine">easeInSine</option>
									<option value="easeOutSine">easeOutSine</option>
									<option value="easeInOutSine">easeInOutSine</option>
									<option value="easeInExpo">easeInExpo</option>
									<option value="easeOutExpo">easeOutExpo</option>
									<option value="easeInOutExpo">easeInOutExpo</option>
									<option value="easeInCirc">easeInCirc</option>
									<option value="easeOutCirc">easeOutCirc</option>
									<option value="easeInOutCirc">easeInOutCirc</option>
									<option value="easeInElastic">easeInElastic</option>
									<option value="easeOutElastic">easeOutElastic</option>
									<option value="easeInOutElastic">easeInOutElastic</option>
									<option value="easeInBack">easeInBack</option>
									<option value="easeInOutBack">easeInOutBack</option>
									<option value="easeInBounce">easeInBounce</option>
									<option value="easeOutBounce">easeOutBounce</option>
									<option value="easeInOutBounce">easeInOutBounce</option>
							</select>
								</div>
																				<div class="clear"></div>
				</li>
														</div>
										<div id="layer_degree_wrapper" style="display: none;">
															<li id="layer_loop_startdeg_row">
					
											<div original-title="" id="layer_loop_startdeg_text" class="setting_text">Start&nbsp;Degree</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_loop_startdeg" name="layer_loop_startdeg" value="-20" type="text">
								</div>
																				<div class="clear"></div>
				</li>
								<li id="layer_loop_enddeg_row">
					
											<div original-title="" id="layer_loop_enddeg_text" class="setting_text">End&nbsp;Degree</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_loop_enddeg" name="layer_loop_enddeg" value="20" type="text">
								</div>
											<div class="setting_unit">&nbsp;(-720 - 720)</div>
																				<div class="clear"></div>
				</li>
														<div style="clear: both"></div>
										</div>

										<div id="layer_origin_wrapper" style="display: none;">
															<li id="layer_loop_xorigin_row">
					
											<div original-title="" id="layer_loop_xorigin_text" class="setting_text">x&nbsp;Origin</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_loop_xorigin" name="layer_loop_xorigin" value="50" type="text">
								</div>
											<div class="setting_unit">%</div>
																				<div class="clear"></div>
				</li>
								<li id="layer_loop_yorigin_row">
					
											<div original-title="" id="layer_loop_yorigin_text" class="setting_text">y&nbsp;Origin</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_loop_yorigin" name="layer_loop_yorigin" value="50" type="text">
								</div>
											<div class="setting_unit">% (-250% - 250%)</div>
																				<div class="clear"></div>
				</li>
														<div style="clear: both"></div>
										</div>
										<div id="layer_x_wrapper" style="display: none;">
															<li id="layer_loop_xstart_row">
					
											<div original-title="" id="layer_loop_xstart_text" class="setting_text">x&nbsp;Start&nbsp;Pos.</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_loop_xstart" name="layer_loop_xstart" value="0" type="text">
								</div>
											<div class="setting_unit">px</div>
																				<div class="clear"></div>
				</li>
								<li id="layer_loop_xend_row">
					
											<div original-title="" id="layer_loop_xend_text" class="setting_text">x&nbsp;End&nbsp;Pos.</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_loop_xend" name="layer_loop_xend" value="0" type="text">
								</div>
											<div class="setting_unit">px (-2000px - 2000px)</div>
																				<div class="clear"></div>
				</li>
															<div style="clear: both"></div>
										</div>
										<div id="layer_y_wrapper" style="display: none;">
															<li id="layer_loop_ystart_row">
					
											<div original-title="" id="layer_loop_ystart_text" class="setting_text">y&nbsp;Start&nbsp;Pos.</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_loop_ystart" name="layer_loop_ystart" value="0" type="text">
								</div>
											<div class="setting_unit">px</div>
																				<div class="clear"></div>
				</li>
								<li id="layer_loop_yend_row">
					
											<div original-title="" id="layer_loop_yend_text" class="setting_text">y&nbsp;End&nbsp;Pos.</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_loop_yend" name="layer_loop_yend" value="0" type="text">
								</div>
											<div class="setting_unit">px (-2000px - 2000px)</div>
																				<div class="clear"></div>
				</li>
															<div style="clear: both"></div>
										</div>
										<div id="layer_zoom_wrapper" style="display: none;">
															<li id="layer_loop_zoomstart_row">
					
											<div original-title="" id="layer_loop_zoomstart_text" class="setting_text">Start&nbsp;Zoom</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_loop_zoomstart" name="layer_loop_zoomstart" value="1" type="text">
								</div>
																				<div class="clear"></div>
				</li>
								<li id="layer_loop_zoomend_row">
					
											<div original-title="" id="layer_loop_zoomend_text" class="setting_text">End&nbsp;Zoom</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_loop_zoomend" name="layer_loop_zoomend" value="1" type="text">
								</div>
											<div class="setting_unit">&nbsp;(0.00 - 20.00)</div>
																				<div class="clear"></div>
				</li>
															<div style="clear: both"></div>
										</div>
										<div id="layer_angle_wrapper" style="display: none;">
															<li id="layer_loop_angle_row">
					
											<div original-title="" id="layer_loop_angle_text" class="setting_text">Angle</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_loop_angle" name="layer_loop_angle" value="0" type="text">
								</div>
											<div class="setting_unit">° (0° - 360°)</div>
																				<div class="clear"></div>
				</li>
														</div>
										<div id="layer_radius_wrapper" style="display: none;">
															<li id="layer_loop_radius_row">
					
											<div original-title="" id="layer_loop_radius_text" class="setting_text">Radius</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_loop_radius" name="layer_loop_radius" value="10" type="text">
								</div>
											<div class="setting_unit">px (0px - 2000px)</div>
																				<div class="clear"></div>
				</li>
														</div>
									</ul>
									<div class="clear"></div>
								</div>
							</div>
						</div><!-- END OF ANIMATION PARAMETERS -->


						<!-- LAYER ANIMATION EDITOR  (DISPLAY NONE !!)-->
						<div id="layeranimeditor_wrap" title="Layer Animation Editor" style="display:none;margin-bottom:0px; padding-bottom:0px;">
							<div class="tp-present-wrapper-parent">
								<div class="tp-present-wrapper">
									<div class="tp-present-caption">
										<div style="visibility: visible; opacity: 0.23; transform: translate3d(0px, 0px, 1px) scale(0.23, 0.23); transform-origin: 0% 0% 0px;" id="caption_custon_anim_preview" class="">LAYER EXAMPLE</div>
									</div>
								</div>
							</div>

							<div class="divide20"></div>
							<div class="settings_wrapper">
								<div class="postbox unite-postbox">
									<h3 class="no-accordion tp-accordion">
										<span style="font-size:13px;padding-left:4px;"><i class="revicon-equalizer"></i>Layer Animation Settings Panel</span>
										<span style="float: right;"><a original-title="" href="javascript:void(0);" style="margin-top:-7px;border: none;font-weight: 400;box-shadow: none;-webkit-box-shadow: none;-moz-box-shadow: none;" id="set-random-animation" class="button-primary revgreen"><i class="eg-icon-shuffle"></i>Randomize</a></span>
									</h3>

									<table style="border-spacing:0px">

										<!-- TRANSITION -->

										<tbody><tr class="css-edit-title graybasicbg"><td colspan="6" style="padding:10px">Transition</td></tr>

										<tr class="graybasicbg">
											<td>X:</td>
											<td style="padding-bottom:15px">
												<div id="caption-movex-slider" class="rotationsliders"></div>
												<input class="css_edit_novice tpshortinput" name="movex" value="0" type="text">px
											</td>

											<td>Y:</td>
											<td style="padding-bottom:15px">
												<div id="caption-movey-slider" class="rotationsliders"></div>
												<input class="css_edit_novice tpshortinput" name="movey" value="0" type="text">px
											</td>

											<td>Z:</td>
											<td style="padding-bottom:15px">
												<div id="caption-movez-slider" class="rotationsliders"></div>
												<input class="css_edit_novice tpshortinput" name="movez" value="0" type="text">px
											</td>

										</tr>

										<!-- ROTATION -->

										<tr class="css-edit-title"><td colspan="6" style="padding:10px">Rotation</td></tr>
										<tr>
											<td>X:</td>
											<td style="padding-bottom:15px">
												<div id="caption-rotationx-slider" class="rotationsliders"></div>
												<input class="css_edit_novice tpshortinput" name="rotationx" value="0" type="text">°
											</td>

											<td>Y:</td>
											<td style="padding-bottom:15px">
												<div id="caption-rotationy-slider" class="rotationsliders"></div>
												<input class="css_edit_novice tpshortinput" name="rotationy" value="0" type="text">°
											</td>

											<td>Z:</td>
											<td style="padding-bottom:15px">
												<div id="caption-rotationz-slider" class="rotationsliders"></div>
												<input class="css_edit_novice tpshortinput" name="rotationz" value="0" type="text">°
											</td>

										</tr>

									</tbody></table>
									<table style="border-spacing:0px">
										<!-- SCALE && SKEW-->

										<tbody><tr class="css-edit-title graybasicbg">
											<td colspan="4" style="padding:10px">Scale</td>
											<td colspan="4" style="padding:10px;padding-left:20px">Skew</td>
										</tr>

										<tr class="graybasicbg">
											<!-- SCALE X -->
											<td style="width:30px">X:</td>
											<td style="width:100px; padding-bottom:15px; ">
												<div id="caption-scalex-slider" class="rotationsliders" style="width:100px !important;"></div>
												<input class="css_edit_novice tpshortinput" name="scalex" value="0" type="text">%
											</td>
											<!-- SCALE Y -->
											<td style="width:30px;">Y:</td>
											<td style="width:100px; padding-bottom:15px; ">
												<div id="caption-scaley-slider" class="rotationsliders" style="width:100px;"></div>
												<input class="css_edit_novice tpshortinput" name="scaley" value="0" type="text">%
											</td>
											<td style="width:30px;">X:</td>
											<!-- SKEW X -->
											<td style="width:100px; padding-bottom:15px; ">
												<div id="caption-skewx-slider" class="rotationsliders" style="width:100px;"></div>
												<input class="css_edit_novice tpshortinput" name="skewx" value="0" type="text">°
											</td>

											<td style="width:30px">Y:</td>
											<!-- SKEW Y -->
											<td style="width:100px; padding-bottom:15px; ">
												<div id="caption-skewy-slider" class="rotationsliders" style="width:100px;"></div>
												<input class="css_edit_novice tpshortinput" name="skewy" value="0" type="text">°
											</td>

										</tr>

									</tbody></table>

									<table style="border-spacing:0px;padding-bottom:10px">
										<!-- OPACITY -->

										<tbody><tr class="css-edit-title">
											<td colspan="2" style="padding:10px">Opacity</td>
											<td colspan="2" style="padding:10px;padding-left:20px">Perspective</td>
											<td colspan="2" style="padding:10px;padding-left:20px">Origin</td>
										</tr>

										<tr class="">
										<!-- OPACITY -->
											<td style="width:30px"></td>
											<td style="width:100px; padding-bottom:15px; ">
												<div id="caption-opacity-slider" class="rotationsliders" style="width:100px !important;"></div>
												<input class="css_edit_novice tpshortinput" name="captionopacity" value="0" type="text">%
											</td>
										<!-- PERSPECTIVE -->
											<td style="width:30px;"></td>
											<td style="width:100px; padding-bottom:15px; ">
												<div id="caption-perspective-slider" class="rotationsliders" style="width:100px;"></div>
												<input class="css_edit_novice tpshortinput" name="captionperspective" value="0" type="text">px
											</td>
										<!-- ORIGINX -->
											<td style="width:30px;">X:</td>
											<td style="width:100px; padding-bottom:15px; ">
												<div id="caption-originx-slider" class="rotationsliders" style="width:100px;"></div>
												<input class="css_edit_novice tpshortinput" name="originx" value="0" type="text">%
											</td>
										<!-- ORIGINY -->
											<td style="width:30px">Y:</td>
											<td style="width:100px; padding-bottom:15px; ">
												<div id="caption-originy-slider" class="rotationsliders" style="width:100px;"></div>
												<input class="css_edit_novice tpshortinput" name="originy" value="0" type="text">%
											</td>

										</tr>

									</tbody></table>
								</div>
							</div>


							<div class="settings_wrapper">
								<div class="postbox unite-postbox">
									<h3 class="no-accordion tp-accordion">
										<span style="font-size:13px;padding-left:4px;"><i class="eg-icon-tools"></i>Test Parameters</span>
										<span style="font-size: 9px;text-align: right;font-weight: 300;font-style: italic;white-space: nowrap;">*These Settings are only for Customizer. Settings can be set per Start and End Animation.</span>
									</h3>

										<table>
											<tbody><tr>
												<td>Speed:</td>
												<td style="vertical-align: middle; line-height: 25px;"><input class="css_edit_novice tpshortinput" style="margin-top:3px;margin-right:5px;" name="captionspeed" value="600" type="text">ms</td>
												<td>Easing:</td>
												<td>
													<select id="caption-easing-demo" name="caption-easing-demo" class="">
														<option value="Linear.easeNone">Linear.easeNone</option>
														<option value="Power0.easeIn">Power0.easeIn  (linear)</option>
														<option value="Power0.easeInOut">Power0.easeInOut  (linear)</option>
														<option value="Power0.easeOut">Power0.easeOut  (linear)</option>
														<option value="Power1.easeIn">Power1.easeIn</option>
														<option value="Power1.easeInOut">Power1.easeInOut</option>
														<option value="Power1.easeOut">Power1.easeOut</option>
														<option value="Power2.easeIn">Power2.easeIn</option>
														<option value="Power2.easeInOut">Power2.easeInOut</option>
														<option value="Power2.easeOut">Power2.easeOut</option>
														<option value="Power3.easeIn">Power3.easeIn</option>
														<option value="Power3.easeInOut">Power3.easeInOut</option>
														<option value="Power3.easeOut">Power3.easeOut</option>
														<option value="Power4.easeIn">Power4.easeIn</option>
														<option value="Power4.easeInOut">Power4.easeInOut</option>
														<option value="Power4.easeOut">Power4.easeOut</option>
														<option value="Back.easeIn">Back.easeIn</option>
														<option value="Back.easeInOut">Back.easeInOut</option>
														<option value="Back.easeOut">Back.easeOut</option>
														<option value="Bounce.easeIn">Bounce.easeIn</option>
														<option value="Bounce.easeInOut">Bounce.easeInOut</option>
														<option value="Bounce.easeOut">Bounce.easeOut</option>
														<option value="Circ.easeIn">Circ.easeIn</option>
														<option value="Circ.easeInOut">Circ.easeInOut</option>
														<option value="Circ.easeOut">Circ.easeOut</option>
														<option value="Elastic.easeIn">Elastic.easeIn</option>
														<option value="Elastic.easeInOut">Elastic.easeInOut</option>
														<option value="Elastic.easeOut">Elastic.easeOut</option>
														<option value="Expo.easeIn">Expo.easeIn</option>
														<option value="Expo.easeInOut">Expo.easeInOut</option>
														<option value="Expo.easeOut">Expo.easeOut</option>
														<option value="Sine.easeIn">Sine.easeIn</option>
														<option value="Sine.easeInOut">Sine.easeInOut</option>
														<option value="Sine.easeOut">Sine.easeOut</option>
														<option value="SlowMo.ease">SlowMo.ease</option>
													</select>
												</td>
											</tr>
											<tr>
												<td>Animate per:</td>
												<td>
													<select id="caption-split-demo" name="caption-split-demo" class="">
														<option value="full">None</option>
														<option value="chars">Chars</option>
														<option value="words">Words</option>
														<option value="lines">Lines</option>
													</select>
												</td>
												<!-- DELAYS -->
												<td>Delays:</td>
												<td style="vertical-align: middle; line-height: 25px;"><input class="css_edit_novice tpshortinput" style="margin-top:3px;margin-right:5px;" name="captionsplitdelay" value="10" type="text">ms</td>
											</tr>
										</tbody></table>

										<div id="caption-inout-controll" class="caption-inout-controll">
											<i id="revshowmetheinanim" class="revicon-login reviconinaction"></i><i id="revshowmetheoutanim" class="revicon-logout"></i>Transition Direction										</div>



										<div class="clear"></div>

								</div>
							</div>
						</div>

						<div id="dialog-change-layeranimation" title="Save Layer Animation" style="display:none;">
							<p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 50px 0;"></span>Overwrite the current selected Animation "<span id="current-layer-handle"></span>" or save as a new Animation?</p>
						</div>

						<div id="dialog-change-layeranimation-save-as" title="Save as" style="display:none;">
							<p>
								Save as Animation:<br>
								<input class="" name="layeranimation_save_as" value="" type="text">
							</p>
						</div>
						<!-- END OF CUSTOM ANIMATION LAYER EDITOR -->


						<!-- THE ADVANCED LAYER PARAMETERS -->
						<div class="settings_wrapper">
							<div class="postbox unite-postbox">
								<h3 class="no-accordion tp-accordion tpa-closed box_closed"><span class="postbox-arrow2">+</span>
									<span>Layer Links &amp; Advanced Params </span>
								</h3>
								<div style="display: none;" class="toggled-content tp-closedatstart tp-closeifotheropen">

									<ul class="list_settings">
										<li class="custom attributes_title" style="margin-top:-10px;">
											<span class="setting_text_2 text-disabled" original-title="">Links (optional)</span>
											<!--<hr>-->
										</li>
										<div class="layer-links">
															<li id="layer_image_link_row" style="display:none;">
					
											<div original-title="" id="layer_image_link_text" class="setting_text">Image&nbsp;Link</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar-link" id="layer_image_link" name="layer_image_link" value="" type="text">
								</div>
																				<div class="clear"></div>
				</li>
								<li id="layer_link_open_in_row" style="display:none;">
					
											<div original-title="" id="layer_link_open_in_text" class="setting_text">Link&nbsp;Open&nbsp;In</div>
										
										
					<div class="setting_input">
									<select class="" id="layer_link_open_in" name="layer_link_open_in">
								<option value="same" selected="selected">Same Window</option>
									<option value="new">New Window</option>
							</select>
								</div>
																				<div class="clear"></div>
				</li>
								<li id="layer_slide_link_row">
					
											<div original-title="" id="layer_slide_link_text" class="setting_text">Link&nbsp;To&nbsp;Slide</div>
										
										
					<div class="setting_input">
									<select class="" id="layer_slide_link" name="layer_slide_link">
								<option value="nothing" selected="selected">-- Not Chosen --</option>
									<option value="next">-- Next Slide --</option>
									<option value="prev">-- Previous Slide --</option>
									<option value="scroll_under">-- Scroll Below Slider --</option>
									<option value="50">Slide</option>
									<option value="52">Slide</option>
									<option value="57">Slide</option>
									<option value="58">Slide</option>
									<option value="59">Slide</option>
									<option value="60">Slide</option>
									<option value="61">Slide</option>
									<option value="62">Slide</option>
							</select>
								</div>
																				<div class="clear"></div>
				</li>
								<li id="layer_scrolloffset_row" style="display:none;">
					
											<div original-title="" id="layer_scrolloffset_text" class="setting_text">Scroll&nbsp;Under&nbsp;Slider&nbsp;Offset</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_scrolloffset" name="layer_scrolloffset" value="0" type="text">
								</div>
											<div class="setting_unit">px</div>
																				<div class="clear"></div>
				</li>
								<li id="layer_link_id_row" style="display:none;">
					
											<div original-title="" id="layer_link_id_text" class="setting_text">Link&nbsp;ID</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_link_id" name="layer_link_id" value="" type="text">
								</div>
																				<div class="clear"></div>
				</li>
								<li id="layer_link_class_row" style="display:none;">
					
											<div original-title="" id="layer_link_class_text" class="setting_text">Link&nbsp;Classes</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_link_class" name="layer_link_class" value="" type="text">
								</div>
																				<div class="clear"></div>
				</li>
								<li id="layer_link_title_row" style="display:none;">
					
											<div original-title="" id="layer_link_title_text" class="setting_text">Link&nbsp;Title</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_link_title" name="layer_link_title" value="" type="text">
								</div>
																				<div class="clear"></div>
				</li>
								<li id="layer_link_rel_row" style="display:none;">
					
											<div original-title="" id="layer_link_rel_text" class="setting_text">Link&nbsp;Rel</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_link_rel" name="layer_link_rel" value="" type="text">
								</div>
																				<div class="clear"></div>
				</li>
														</div><div style="clear: both;"></div>

										<li id="" class="custom attributes_title" style="">
											<span class="setting_text_2 text-disabled" original-title="">Caption Sharp Corners (optional only with BG color)</span>
											<!--<hr>-->
										</li>
										<div class="layer-links">
															<li id="layer_cornerleft_row">
					
											<div original-title="" id="layer_cornerleft_text" class="setting_text">Left&nbsp;Corner</div>
										
										
					<div class="setting_input">
									<select class="" id="layer_cornerleft" name="layer_cornerleft">
								<option value="nothing" selected="selected">No Corner</option>
									<option value="curved">Sharp</option>
									<option value="reverced">Sharp Reversed</option>
							</select>
								</div>
																				<div class="clear"></div>
				</li>
								<li id="layer_cornerright_row">
					
											<div original-title="" id="layer_cornerright_text" class="setting_text">Right&nbsp;Corner</div>
										
										
					<div class="setting_input">
									<select class="" id="layer_cornerright" name="layer_cornerright">
								<option value="nothing" selected="selected">No Corner</option>
									<option value="curved">Sharp</option>
									<option value="reverced">Sharp Reversed</option>
							</select>
								</div>
																				<div class="clear"></div>
				</li>
														</div>

										<li id="" class="custom attributes_title" style="">
											<span class="setting_text_2 text-disabled" original-title="">Advanced Responsive Settings</span>
											<!--<hr>-->
										</li>
										<div class="layer-links">
															<li id="layer_resizeme_row">
					
											<div original-title="" id="layer_resizeme_text" class="setting_text"><label class="" for="layer_resizeme">Responsive&nbsp;Through&nbsp;All&nbsp;Levels</label></div>
										
										
					<div class="setting_input">
										<input id="layer_resizeme" class="inputCheckbox" name="layer_resizeme" checked="checked" type="checkbox">
								</div>
																				<div class="clear"></div>
				</li>
								<li id="layer_hidden_row">
					
											<div original-title="" id="layer_hidden_text" class="setting_text"><label class="" for="layer_hidden">Hide&nbsp;Under&nbsp;Width</label></div>
										
										
					<div class="setting_input">
										<input id="layer_hidden" class="inputCheckbox" name="layer_hidden" type="checkbox">
								</div>
																				<div class="clear"></div>
				</li>
														</div>


										<li id="custom_attributes" class="custom attributes_title" style="">
											<span class="setting_text_2 text-disabled" original-title="">Attributes (optional)</span>
											<!--<hr>-->
										</li>
														<li id="layer_id_row">
					
											<div original-title="" id="layer_id_text" class="setting_text">ID</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_id" name="layer_id" value="" type="text">
								</div>
																				<div class="clear"></div>
				</li>
								<li id="layer_classes_row">
					
											<div original-title="" id="layer_classes_text" class="setting_text">Classes</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_classes" name="layer_classes" value="" type="text">
								</div>
																				<div class="clear"></div>
				</li>
								<li id="layer_title_row">
					
											<div original-title="" id="layer_title_text" class="setting_text">Title</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_title" name="layer_title" value="" type="text">
								</div>
																				<div class="clear"></div>
				</li>
								<li id="layer_rel_row">
					
											<div original-title="" id="layer_rel_text" class="setting_text">Rel</div>
										
										
					<div class="setting_input">
										<input class="text-sidebar" id="layer_rel" name="layer_rel" value="" type="text">
								</div>
																				<div class="clear"></div>
				</li>
				
									</ul>
									<div class="clear"></div>
								</div>
							</div>
						</div>

					</form>
				</div>

				<!----- End Left Layers Form ------>
				<div class="clear"></div>

			</div>
		</div>


	<div id="dialog_insert_button" class="dialog_insert_button" title="Insert Button" style="display:none;">
		<p>
			</p><ul class="list-buttons">
								<li>
						<a href="javascript:UniteLayersRev.insertButton('red','Red Button')" class="tp-button red small">Red Button</a>
					</li>
								<li>
						<a href="javascript:UniteLayersRev.insertButton('green','Green Button')" class="tp-button green small">Green Button</a>
					</li>
								<li>
						<a href="javascript:UniteLayersRev.insertButton('blue','Blue Button')" class="tp-button blue small">Blue Button</a>
					</li>
								<li>
						<a href="javascript:UniteLayersRev.insertButton('orange','Orange Button')" class="tp-button orange small">Orange Button</a>
					</li>
								<li>
						<a href="javascript:UniteLayersRev.insertButton('darkgrey','Darkgrey Button')" class="tp-button darkgrey small">Darkgrey Button</a>
					</li>
								<li>
						<a href="javascript:UniteLayersRev.insertButton('lightgrey','Lightgrey Button')" class="tp-button lightgrey small">Lightgrey Button</a>
					</li>
						</ul>
		<p></p>
	</div>

	<div id="dialog_template_insert" class="dialog_template_help" title="Template Insertions" style="display:none;">
		<b>Post Replace Placeholders:</b>
		<table class="table_template_help">
			<tbody><tr><td><a href="javascript:UniteLayersRev.insertTemplate('meta:somemegatag')">%meta:somemegatag%</a></td><td>Any custom meta tag</td></tr>
			<tr><td><a href="javascript:UniteLayersRev.insertTemplate('title')">%title%</a></td><td>Post Title</td></tr>
			<tr><td><a href="javascript:UniteLayersRev.insertTemplate('excerpt')">%excerpt%</a></td><td>Post Excerpt</td></tr>
			<tr><td><a href="javascript:UniteLayersRev.insertTemplate('alias')">%alias%</a></td><td>Post Alias</td></tr>
			<tr><td><a href="javascript:UniteLayersRev.insertTemplate('content')">%content%</a></td><td>Post content</td></tr>
			<tr><td><a href="javascript:UniteLayersRev.insertTemplate('link')">%link%</a></td><td>The link to the post</td></tr>
			<tr><td><a href="javascript:UniteLayersRev.insertTemplate('date')">%date%</a></td><td>Date created</td></tr>
			<tr><td><a href="javascript:UniteLayersRev.insertTemplate('date_modified')">%date_modified%</a></td><td>Date modified</td></tr>
			<tr><td><a href="javascript:UniteLayersRev.insertTemplate('author_name')">%author_name%</a></td><td>Author name</td></tr>
			<tr><td><a href="javascript:UniteLayersRev.insertTemplate('num_comments')">%num_comments%</a></td><td>Number of comments</td></tr>
			<tr><td><a href="javascript:UniteLayersRev.insertTemplate('catlist')">%catlist%</a></td><td>List of categories with links</td></tr>
			<tr><td><a href="javascript:UniteLayersRev.insertTemplate('taglist')">%taglist%</a></td><td>List of tags with links</td></tr>
		</tbody></table>
			</div>

	<!-- FIXED POSITIONED TOOLBOX -->
		<div class="" style="position:fixed;right:-10px;top:100px;z-index:100;">
							<a original-title="" href="javascript:void(0)" id="button_preview_slide-tb" class="button-primary button-fixed revbluedark"><div style="font-size:16px; padding:10px 5px;" class="revicon-search-1"></div></a>
						</div>

	<script type="text/javascript">

		jQuery(document).ready(function() {
							//set init layers object
				UniteLayersRev.setInitLayersJson('[{\"text\":\"Caption Text1\",\"type\":\"text\",\"left\":342,\"top\":116,\"loop_animation\":\"none\",\"loop_easing\":\"Power3.easeInOut\",\"loop_speed\":\"2\",\"loop_startdeg\":\"-20\",\"loop_enddeg\":\"20\",\"loop_xorigin\":\"50\",\"loop_yorigin\":\"50\",\"loop_xstart\":\"0\",\"loop_xend\":\"0\",\"loop_ystart\":\"0\",\"loop_yend\":\"0\",\"loop_zoomstart\":\"1\",\"loop_zoomend\":\"1\",\"loop_angle\":\"0\",\"loop_radius\":\"10\",\"animation\":\"tp-fade\",\"easing\":\"Power3.easeInOut\",\"split\":\"none\",\"endsplit\":\"none\",\"splitdelay\":\"10\",\"endsplitdelay\":\"10\",\"max_height\":\"auto\",\"max_width\":\"auto\",\"2d_rotation\":\"0\",\"2d_origin_x\":\"50\",\"2d_origin_y\":\"50\",\"parallax_level\":\"-\",\"whitespace\":\"nowrap\",\"static_start\":\"1\",\"static_end\":\"2\",\"speed\":300,\"align_hor\":\"left\",\"align_vert\":\"top\",\"hiddenunder\":false,\"resizeme\":true,\"link\":\"\",\"link_open_in\":\"same\",\"link_slide\":\"nothing\",\"scrollunder_offset\":\"\",\"style\":\"black\",\"time\":500,\"endtime\":\"4700\",\"endspeed\":300,\"endanimation\":\"auto\",\"endeasing\":\"nothing\",\"corner_left\":\"nothing\",\"corner_right\":\"nothing\",\"width\":84,\"height\":13,\"serial\":0,\"endTimeFinal\":4700,\"endSpeedFinal\":300,\"realEndTime\":5000,\"timeLast\":4500,\"endWithSlide\":true,\"alt\":\"\",\"scaleX\":\"\",\"scaleY\":\"\",\"scaleProportional\":false,\"attrID\":\"\",\"attrClasses\":\"\",\"attrTitle\":\"\",\"attrRel\":\"\",\"link_id\":\"\",\"link_class\":\"\",\"link_title\":\"\",\"link_rel\":\"\"}]');
						
						
						UniteLayersRev.setInitCaptionClasses('[\"black\",\"boxshadow\",\"excerpt\",\"grassfloor\",\"large_bg_black\",\"large_bold_black\",\"large_bold_darkblue\",\"large_bold_grey\",\"large_bold_white\",\"large_text\",\"largeblackbg\",\"largegreenbg\",\"largepinkbg\",\"largewhitebg\",\"lightgrey_divider\",\"medium_bg_asbestos\",\"medium_bg_darkblue\",\"medium_bg_orange\",\"medium_bg_red\",\"medium_bold_orange\",\"medium_bold_red\",\"medium_grey\",\"medium_light_black\",\"medium_light_red\",\"medium_light_white\",\"medium_text\",\"medium_thin_grey\",\"mediumlarge_light_darkblue\",\"mediumlarge_light_white\",\"mediumlarge_light_white_center\",\"mediumwhitebg\",\"modern_big_bluebg\",\"modern_big_redbg\",\"modern_medium_fat\",\"modern_medium_fat_white\",\"modern_medium_light\",\"modern_small_text_dark\",\"noshadow\",\"roundedimage\",\"small_light_white\",\"small_text\",\"small_thin_grey\",\"thinheadline_dark\",\"thintext_dark\",\"very_big_black\",\"very_big_white\",\"very_large_text\"]');
			
						UniteLayersRev.setInitLayerAnim('');
			
						UniteLayersRev.setInitFontTypes('[\"Georgia, serif\",\"\\\"Palatino Linotype\\\", \\\"Book Antiqua\\\", Palatino, serif\",\"\\\"Times New Roman\\\", Times, serif\",\"Arial, Helvetica, sans-serif\",\"\\\"Arial Black\\\", Gadget, sans-serif\",\"\\\"Comic Sans MS\\\", cursive, sans-serif\",\"Impact, Charcoal, sans-serif\",\"\\\"Lucida Sans Unicode\\\", \\\"Lucida Grande\\\", sans-serif\",\"Tahoma, Geneva, sans-serif\",\"\\\"Trebuchet MS\\\", Helvetica, sans-serif\",\"Verdana, Geneva, sans-serif\",\"\\\"Courier New\\\", Courier, monospace\",\"\\\"Lucida Console\\\", Monaco, monospace\"]');
			
						UniteCssEditorRev.setInitCssStyles('[{\"id\":\"1\",\"handle\":\".tp-caption.medium_grey\",\"settings\":null,\"hover\":null,\"params\":{\"position\":\"absolute\",\"color\":\"#fff\",\"text-shadow\":\"0px 2px 5px rgba(0, 0, 0, 0.5)\",\"font-weight\":\"700\",\"font-size\":\"20px\",\"line-height\":\"20px\",\"font-family\":\"Arial\",\"padding\":\"2px 4px\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\",\"background-color\":\"#888\",\"white-space\":\"nowrap\"}},{\"id\":\"2\",\"handle\":\".tp-caption.small_text\",\"settings\":null,\"hover\":null,\"params\":{\"position\":\"absolute\",\"color\":\"#fff\",\"text-shadow\":\"0px 2px 5px rgba(0, 0, 0, 0.5)\",\"font-weight\":\"700\",\"font-size\":\"14px\",\"line-height\":\"20px\",\"font-family\":\"Arial\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\",\"white-space\":\"nowrap\"}},{\"id\":\"3\",\"handle\":\".tp-caption.medium_text\",\"settings\":null,\"hover\":null,\"params\":{\"position\":\"absolute\",\"color\":\"#fff\",\"text-shadow\":\"0px 2px 5px rgba(0, 0, 0, 0.5)\",\"font-weight\":\"700\",\"font-size\":\"20px\",\"line-height\":\"20px\",\"font-family\":\"Arial\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\",\"white-space\":\"nowrap\"}},{\"id\":\"4\",\"handle\":\".tp-caption.large_text\",\"settings\":null,\"hover\":null,\"params\":{\"position\":\"absolute\",\"color\":\"#fff\",\"text-shadow\":\"0px 2px 5px rgba(0, 0, 0, 0.5)\",\"font-weight\":\"700\",\"font-size\":\"40px\",\"line-height\":\"40px\",\"font-family\":\"Arial\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\",\"white-space\":\"nowrap\"}},{\"id\":\"5\",\"handle\":\".tp-caption.very_large_text\",\"settings\":null,\"hover\":null,\"params\":{\"position\":\"absolute\",\"color\":\"#fff\",\"text-shadow\":\"0px 2px 5px rgba(0, 0, 0, 0.5)\",\"font-weight\":\"700\",\"font-size\":\"60px\",\"line-height\":\"60px\",\"font-family\":\"Arial\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\",\"white-space\":\"nowrap\",\"letter-spacing\":\"-2px\"}},{\"id\":\"6\",\"handle\":\".tp-caption.very_big_white\",\"settings\":null,\"hover\":null,\"params\":{\"position\":\"absolute\",\"color\":\"#fff\",\"text-shadow\":\"none\",\"font-weight\":\"800\",\"font-size\":\"60px\",\"line-height\":\"60px\",\"font-family\":\"Arial\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\",\"white-space\":\"nowrap\",\"padding\":\"0px 4px\",\"padding-top\":\"1px\",\"background-color\":\"#000\"}},{\"id\":\"7\",\"handle\":\".tp-caption.very_big_black\",\"settings\":null,\"hover\":null,\"params\":{\"position\":\"absolute\",\"color\":\"#000\",\"text-shadow\":\"none\",\"font-weight\":\"700\",\"font-size\":\"60px\",\"line-height\":\"60px\",\"font-family\":\"Arial\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\",\"white-space\":\"nowrap\",\"padding\":\"0px 4px\",\"padding-top\":\"1px\",\"background-color\":\"#fff\"}},{\"id\":\"8\",\"handle\":\".tp-caption.modern_medium_fat\",\"settings\":null,\"hover\":null,\"params\":{\"position\":\"absolute\",\"color\":\"#000\",\"text-shadow\":\"none\",\"font-weight\":\"800\",\"font-size\":\"24px\",\"line-height\":\"20px\",\"font-family\":\"\\\"Open Sans\\\", sans-serif\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\",\"white-space\":\"nowrap\"}},{\"id\":\"9\",\"handle\":\".tp-caption.modern_medium_fat_white\",\"settings\":null,\"hover\":null,\"params\":{\"position\":\"absolute\",\"color\":\"#fff\",\"text-shadow\":\"none\",\"font-weight\":\"800\",\"font-size\":\"24px\",\"line-height\":\"20px\",\"font-family\":\"\\\"Open Sans\\\", sans-serif\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\",\"white-space\":\"nowrap\"}},{\"id\":\"10\",\"handle\":\".tp-caption.modern_medium_light\",\"settings\":null,\"hover\":null,\"params\":{\"position\":\"absolute\",\"color\":\"#000\",\"text-shadow\":\"none\",\"font-weight\":\"300\",\"font-size\":\"24px\",\"line-height\":\"20px\",\"font-family\":\"\\\"Open Sans\\\", sans-serif\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\",\"white-space\":\"nowrap\"}},{\"id\":\"11\",\"handle\":\".tp-caption.modern_big_bluebg\",\"settings\":null,\"hover\":null,\"params\":{\"position\":\"absolute\",\"color\":\"#fff\",\"text-shadow\":\"none\",\"font-weight\":\"800\",\"font-size\":\"30px\",\"line-height\":\"36px\",\"font-family\":\"\\\"Open Sans\\\", sans-serif\",\"padding\":\"3px 10px\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\",\"background-color\":\"#4e5b6c\",\"letter-spacing\":\"0\"}},{\"id\":\"12\",\"handle\":\".tp-caption.modern_big_redbg\",\"settings\":null,\"hover\":null,\"params\":{\"position\":\"absolute\",\"color\":\"#fff\",\"text-shadow\":\"none\",\"font-weight\":\"300\",\"font-size\":\"30px\",\"line-height\":\"36px\",\"font-family\":\"\\\"Open Sans\\\", sans-serif\",\"padding\":\"3px 10px\",\"padding-top\":\"1px\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\",\"background-color\":\"#de543e\",\"letter-spacing\":\"0\"}},{\"id\":\"13\",\"handle\":\".tp-caption.modern_small_text_dark\",\"settings\":null,\"hover\":null,\"params\":{\"position\":\"absolute\",\"color\":\"#555\",\"text-shadow\":\"none\",\"font-size\":\"14px\",\"line-height\":\"22px\",\"font-family\":\"Arial\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-style\":\"none\",\"white-space\":\"nowrap\"}},{\"id\":\"14\",\"handle\":\".tp-caption.boxshadow\",\"settings\":null,\"hover\":null,\"params\":{\"-moz-box-shadow\":\"0px 0px 20px rgba(0, 0, 0, 0.5)\",\"-webkit-box-shadow\":\"0px 0px 20px rgba(0, 0, 0, 0.5)\",\"box-shadow\":\"0px 0px 20px rgba(0, 0, 0, 0.5)\"}},{\"id\":\"15\",\"handle\":\".tp-caption.black\",\"settings\":null,\"hover\":null,\"params\":{\"color\":\"#000\",\"text-shadow\":\"none\"}},{\"id\":\"16\",\"handle\":\".tp-caption.noshadow\",\"settings\":null,\"hover\":null,\"params\":{\"text-shadow\":\"none\"}},{\"id\":\"17\",\"handle\":\".tp-caption.thinheadline_dark\",\"settings\":null,\"hover\":null,\"params\":{\"position\":\"absolute\",\"color\":\"rgba(0,0,0,0.85)\",\"text-shadow\":\"none\",\"font-weight\":\"300\",\"font-size\":\"30px\",\"line-height\":\"30px\",\"font-family\":\"\\\"Open Sans\\\"\",\"background-color\":\"transparent\"}},{\"id\":\"18\",\"handle\":\".tp-caption.thintext_dark\",\"settings\":null,\"hover\":null,\"params\":{\"position\":\"absolute\",\"color\":\"rgba(0,0,0,0.85)\",\"text-shadow\":\"none\",\"font-weight\":\"300\",\"font-size\":\"16px\",\"line-height\":\"26px\",\"font-family\":\"\\\"Open Sans\\\"\",\"background-color\":\"transparent\"}},{\"id\":\"19\",\"handle\":\".tp-caption.largeblackbg\",\"settings\":null,\"hover\":null,\"params\":{\"position\":\"absolute\",\"color\":\"#fff\",\"text-shadow\":\"none\",\"font-weight\":\"300\",\"font-size\":\"50px\",\"line-height\":\"70px\",\"font-family\":\"\\\"Open Sans\\\"\",\"background-color\":\"#000\",\"padding\":\"0px 20px\",\"-webkit-border-radius\":\"0px\",\"-moz-border-radius\":\"0px\",\"border-radius\":\"0px\"}},{\"id\":\"20\",\"handle\":\".tp-caption.largepinkbg\",\"settings\":null,\"hover\":null,\"params\":{\"position\":\"absolute\",\"color\":\"#fff\",\"text-shadow\":\"none\",\"font-weight\":\"300\",\"font-size\":\"50px\",\"line-height\":\"70px\",\"font-family\":\"\\\"Open Sans\\\"\",\"background-color\":\"#db4360\",\"padding\":\"0px 20px\",\"-webkit-border-radius\":\"0px\",\"-moz-border-radius\":\"0px\",\"border-radius\":\"0px\"}},{\"id\":\"21\",\"handle\":\".tp-caption.largewhitebg\",\"settings\":null,\"hover\":null,\"params\":{\"position\":\"absolute\",\"color\":\"#000\",\"text-shadow\":\"none\",\"font-weight\":\"300\",\"font-size\":\"50px\",\"line-height\":\"70px\",\"font-family\":\"\\\"Open Sans\\\"\",\"background-color\":\"#fff\",\"padding\":\"0px 20px\",\"-webkit-border-radius\":\"0px\",\"-moz-border-radius\":\"0px\",\"border-radius\":\"0px\"}},{\"id\":\"22\",\"handle\":\".tp-caption.largegreenbg\",\"settings\":null,\"hover\":null,\"params\":{\"position\":\"absolute\",\"color\":\"#fff\",\"text-shadow\":\"none\",\"font-weight\":\"300\",\"font-size\":\"50px\",\"line-height\":\"70px\",\"font-family\":\"\\\"Open Sans\\\"\",\"background-color\":\"#67ae73\",\"padding\":\"0px 20px\",\"-webkit-border-radius\":\"0px\",\"-moz-border-radius\":\"0px\",\"border-radius\":\"0px\"}},{\"id\":\"23\",\"handle\":\".tp-caption.excerpt\",\"settings\":null,\"hover\":null,\"params\":{\"font-size\":\"36px\",\"line-height\":\"36px\",\"font-weight\":\"700\",\"font-family\":\"Arial\",\"color\":\"#ffffff\",\"text-decoration\":\"none\",\"background-color\":\"rgba(0, 0, 0, 1)\",\"text-shadow\":\"none\",\"margin\":\"0px\",\"letter-spacing\":\"-1.5px\",\"padding\":\"1px 4px 0px 4px\",\"width\":\"150px\",\"white-space\":\"normal !important\",\"height\":\"auto\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 255, 255)\",\"border-style\":\"none\"}},{\"id\":\"24\",\"handle\":\".tp-caption.large_bold_grey\",\"settings\":null,\"hover\":null,\"params\":{\"font-size\":\"60px\",\"line-height\":\"60px\",\"font-weight\":\"800\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(102, 102, 102)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"text-shadow\":\"none\",\"margin\":\"0px\",\"padding\":\"1px 4px 0px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}},{\"id\":\"25\",\"handle\":\".tp-caption.medium_thin_grey\",\"settings\":null,\"hover\":null,\"params\":{\"font-size\":\"34px\",\"line-height\":\"30px\",\"font-weight\":\"300\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(102, 102, 102)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"padding\":\"1px 4px 0px\",\"text-shadow\":\"none\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}},{\"id\":\"26\",\"handle\":\".tp-caption.small_thin_grey\",\"settings\":null,\"hover\":null,\"params\":{\"font-size\":\"18px\",\"line-height\":\"26px\",\"font-weight\":\"300\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(117, 117, 117)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"padding\":\"1px 4px 0px\",\"text-shadow\":\"none\",\"margin\":\"0px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}},{\"id\":\"27\",\"handle\":\".tp-caption.lightgrey_divider\",\"settings\":null,\"hover\":null,\"params\":{\"text-decoration\":\"none\",\"background-color\":\"rgba(235, 235, 235, 1)\",\"width\":\"370px\",\"height\":\"3px\",\"background-position\":\"initial initial\",\"background-repeat\":\"initial initial\",\"border-width\":\"0px\",\"border-color\":\"rgb(34, 34, 34)\",\"border-style\":\"none\"}},{\"id\":\"28\",\"handle\":\".tp-caption.large_bold_darkblue\",\"settings\":null,\"hover\":null,\"params\":{\"font-size\":\"58px\",\"line-height\":\"60px\",\"font-weight\":\"800\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(52, 73, 94)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}},{\"id\":\"29\",\"handle\":\".tp-caption.medium_bg_darkblue\",\"settings\":null,\"hover\":null,\"params\":{\"font-size\":\"20px\",\"line-height\":\"20px\",\"font-weight\":\"800\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(255, 255, 255)\",\"text-decoration\":\"none\",\"background-color\":\"rgb(52, 73, 94)\",\"padding\":\"10px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}},{\"id\":\"30\",\"handle\":\".tp-caption.medium_bold_red\",\"settings\":null,\"hover\":null,\"params\":{\"font-size\":\"24px\",\"line-height\":\"30px\",\"font-weight\":\"800\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(227, 58, 12)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"padding\":\"0px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}},{\"id\":\"31\",\"handle\":\".tp-caption.medium_light_red\",\"settings\":null,\"hover\":null,\"params\":{\"font-size\":\"21px\",\"line-height\":\"26px\",\"font-weight\":\"300\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(227, 58, 12)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"padding\":\"0px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}},{\"id\":\"32\",\"handle\":\".tp-caption.medium_bg_red\",\"settings\":null,\"hover\":null,\"params\":{\"font-size\":\"20px\",\"line-height\":\"20px\",\"font-weight\":\"800\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(255, 255, 255)\",\"text-decoration\":\"none\",\"background-color\":\"rgb(227, 58, 12)\",\"padding\":\"10px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}},{\"id\":\"33\",\"handle\":\".tp-caption.medium_bold_orange\",\"settings\":null,\"hover\":null,\"params\":{\"font-size\":\"24px\",\"line-height\":\"30px\",\"font-weight\":\"800\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(243, 156, 18)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}},{\"id\":\"34\",\"handle\":\".tp-caption.medium_bg_orange\",\"settings\":null,\"hover\":null,\"params\":{\"font-size\":\"20px\",\"line-height\":\"20px\",\"font-weight\":\"800\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(255, 255, 255)\",\"text-decoration\":\"none\",\"background-color\":\"rgb(243, 156, 18)\",\"padding\":\"10px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}},{\"id\":\"35\",\"handle\":\".tp-caption.grassfloor\",\"settings\":null,\"hover\":null,\"params\":{\"text-decoration\":\"none\",\"background-color\":\"rgba(160, 179, 151, 1)\",\"width\":\"4000px\",\"height\":\"150px\",\"border-width\":\"0px\",\"border-color\":\"rgb(34, 34, 34)\",\"border-style\":\"none\"}},{\"id\":\"36\",\"handle\":\".tp-caption.large_bold_white\",\"settings\":null,\"hover\":null,\"params\":{\"font-size\":\"58px\",\"line-height\":\"60px\",\"font-weight\":\"800\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(255, 255, 255)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}},{\"id\":\"37\",\"handle\":\".tp-caption.medium_light_white\",\"settings\":null,\"hover\":null,\"params\":{\"font-size\":\"30px\",\"line-height\":\"36px\",\"font-weight\":\"300\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(255, 255, 255)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"padding\":\"0px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}},{\"id\":\"38\",\"handle\":\".tp-caption.mediumlarge_light_white\",\"settings\":null,\"hover\":null,\"params\":{\"font-size\":\"34px\",\"line-height\":\"40px\",\"font-weight\":\"300\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(255, 255, 255)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"padding\":\"0px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}},{\"id\":\"39\",\"handle\":\".tp-caption.mediumlarge_light_white_center\",\"settings\":null,\"hover\":null,\"params\":{\"font-size\":\"34px\",\"line-height\":\"40px\",\"font-weight\":\"300\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"#ffffff\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"padding\":\"0px 0px 0px 0px\",\"text-align\":\"center\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}},{\"id\":\"40\",\"handle\":\".tp-caption.medium_bg_asbestos\",\"settings\":null,\"hover\":null,\"params\":{\"font-size\":\"20px\",\"line-height\":\"20px\",\"font-weight\":\"800\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(255, 255, 255)\",\"text-decoration\":\"none\",\"background-color\":\"rgb(127, 140, 141)\",\"padding\":\"10px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}},{\"id\":\"41\",\"handle\":\".tp-caption.medium_light_black\",\"settings\":null,\"hover\":null,\"params\":{\"font-size\":\"30px\",\"line-height\":\"36px\",\"font-weight\":\"300\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(0, 0, 0)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"padding\":\"0px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}},{\"id\":\"42\",\"handle\":\".tp-caption.large_bold_black\",\"settings\":null,\"hover\":null,\"params\":{\"font-size\":\"58px\",\"line-height\":\"60px\",\"font-weight\":\"800\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(0, 0, 0)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}},{\"id\":\"43\",\"handle\":\".tp-caption.mediumlarge_light_darkblue\",\"settings\":null,\"hover\":null,\"params\":{\"font-size\":\"34px\",\"line-height\":\"40px\",\"font-weight\":\"300\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(52, 73, 94)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"padding\":\"0px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}},{\"id\":\"44\",\"handle\":\".tp-caption.small_light_white\",\"settings\":null,\"hover\":null,\"params\":{\"font-size\":\"17px\",\"line-height\":\"28px\",\"font-weight\":\"300\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(255, 255, 255)\",\"text-decoration\":\"none\",\"background-color\":\"transparent\",\"padding\":\"0px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}},{\"id\":\"45\",\"handle\":\".tp-caption.roundedimage\",\"settings\":null,\"hover\":null,\"params\":{\"border-width\":\"0px\",\"border-color\":\"rgb(34, 34, 34)\",\"border-style\":\"none\"}},{\"id\":\"46\",\"handle\":\".tp-caption.large_bg_black\",\"settings\":null,\"hover\":null,\"params\":{\"font-size\":\"40px\",\"line-height\":\"40px\",\"font-weight\":\"800\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(255, 255, 255)\",\"text-decoration\":\"none\",\"background-color\":\"rgb(0, 0, 0)\",\"padding\":\"10px 20px 15px\",\"border-width\":\"0px\",\"border-color\":\"rgb(255, 214, 88)\",\"border-style\":\"none\"}},{\"id\":\"47\",\"handle\":\".tp-caption.mediumwhitebg\",\"settings\":null,\"hover\":null,\"params\":{\"font-size\":\"30px\",\"line-height\":\"30px\",\"font-weight\":\"300\",\"font-family\":\"\\\"Open Sans\\\"\",\"color\":\"rgb(0, 0, 0)\",\"text-decoration\":\"none\",\"background-color\":\"rgb(255, 255, 255)\",\"padding\":\"5px 15px 10px\",\"text-shadow\":\"none\",\"border-width\":\"0px\",\"border-color\":\"rgb(0, 0, 0)\",\"border-style\":\"none\"}}]');
			
			UniteCssEditorRev.setCssCaptionsUrl('http://ddb.toantran.com/wp-content/plugins/revslider/rs-plugin/css/captions.php');

			UniteLayersRev.init("5000");
			UniteCssEditorRev.init();

			RevSliderAdmin.initGlobalStyles();
			
			RevSliderAdmin.initLayerPreview();

			RevSliderAdmin.setStaticCssCaptionsUrl('http://ddb.toantran.com/wp-content/plugins/revslider/rs-plugin/css/static-captions.css');

/*			var reproduce;
			jQuery(window).resize(function() {
				clearTimeout(reproduce);
				reproduce = setTimeout(function() {
					UniteLayersRev.refreshGridSize();
				},100);
			});*/

					});

	</script>

					<a original-title="" href="javascript:void(0)" id="button_save_slide" class="revgreen button-primary"><div class="updateicon"></div>Update Slide</a>
				<span id="loader_update" class="loader_round" style="display:none;">updating...</span>
		<span id="update_slide_success" class="success_message"></span>
		<a original-title="" href="http://ddb.toantran.com/wp-admin/admin.php?page=revslider&amp;view=slider&amp;id=1" class="button-primary revblue">To Slider Settings</a>
		<a original-title="" id="button_close_slide" href="http://ddb.toantran.com/wp-admin/admin.php?page=revslider&amp;view=slides&amp;id=1" class="button-primary revyellow"><div class="closeicon"></div>To Slide List</a>
		
				<a href="javascript:void(0)" id="button_delete_slide" class="button-primary revred" original-title=""><i class="revicon-trash"></i>Delete Slide</a>
			</div>

	<div class="vert_sap"></div>

	
	<div id="dialog_preview" class="dialog_preview" title="Preview Slide" style="display:none;">
		<iframe id="frame_preview" name="frame_preview" style="width:1020px;height:470px;"></iframe>
	</div>
	
	<form id="form_preview_slide" name="form_preview_slide" action="" target="frame_preview" method="post">
		<input name="client_action" value="preview_slide" type="hidden">
		<input name="data" value="" id="preview_slide_data" type="hidden">
		<input id="preview_slide_nonce" name="nonce" value="" type="hidden">
	</form>
	
	<!-- FIXED POSITIONED TOOLBOX -->
		<div class="" style="position:fixed;right:-10px;top:148px;z-index:100;">
						<a original-title="" href="javascript:void(0)" id="button_save_slide-tb" class="revgreen button-primary button-fixed"><div style="font-size:16px; padding:10px 5px;" class="revicon-arrows-ccw"></div></a>
					</div>

	<div class="" style="position:fixed;right:-10px;top:100px;z-index:100;">

	</div>

		<script type="text/javascript">
		var g_messageDeleteSlide = "Delete this slide?";
		jQuery(document).ready(function(){
			RevSliderAdmin.initEditSlideView(50,1);
		});
	</script>
	

	

</div>