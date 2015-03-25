<?php echo $this->inlineCss; ?>
<?php $cssClass = $this->cssClass; ?>
<?php $slider_height = 232; ?>
<div class="slider-container" style="height: <?php print $slider_height; ?>px">
    <div class="rs-preview">

    </div>    
</div>            
<div class="wrap">




    <article class="content">


        <section class="container">
            <div>
                <button id="add_layer" class="btn btn-primary">Thêm layer</button>
                <button id="del_layer" class="btn btn-primary">Xóa layer</button>
                <button id="change_image" class="btn btn-primary">Đổi hình ảnh</button>
                <button class="btn-save btn btn-danger pull-right">Lưu</button>
                <a href="<?php print URL.'admincp_banner/editBannerDetail/'.$this->slider_id ?>"><button class="btn btn-info ">Trở về</button></a>
            </div>
            <div id="layer-content">
                <table class="table table-bordered">
                    <tr>
                        <td class="col-xs-2">
                            <span>Position: X</span>				
                        </td>
                        <td class="col-xs-2">
                            <span>Position: Y</span>
                        </td>

                        <td class="col-xs-4">
                            <span>Text:</span>
                        </td>
                        <td class="col-xs-2">
                            <span>Style:</span>
                        </td>
                        <td class="col-xs-2">
                            CSS
                        </td>
                    </tr>
                    <tr>
                        <td class="col-xs-2">
                            <input id="layer_left" size="4" class="form-control" />				
                        </td>
                        <td class="col-xs-2">
                            <input id="layer_top" size="4" class="form-control"/>
                        </td>

                        <td class="col-xs-4">
                            <input id="layer_text" size="80" class="form-control" placeholder='Text'/>
                        </td>
                        <td class="col-xs-2">
                            <select id="layer_style" class="form-control">
                                <?php foreach ($cssClass as $key => $value): ?>
                                    <option value="<?php print($value) ?>"><?php print($value) ?></option>
                                <?php endforeach; ?>					
                            </select>								
                        </td>
                        <td class="col-xs-2">
                            <button id="edit_css" class="btn btn-primary">Edit CSS</button>				
                        </td>					
                    </tr>
                </table>
            </div>

            <div id="layeranimeditor_wrap" title="Layer Animation Editor" >
                <div style="width:100%;float:left;">
                    <section id="inanimation" >
                        <div class="caption-demo-controll">

                            <div id="caption-inout-controll" class="caption-inout-controll">
                                <i id="" class="revicon-login"></i> In Animation Editor<span style="font-size:12px"> (Click to Collapse/Expand)</span>
                            </div>

                        </div>
                        <div class="settings_wrapper">
                            <div class="postbox unite-postbox">
                                <table class="lasttable" style="padding-top:20px;border-spacing:0px">

                                    <!-- TRANSITION -->

                                    <tr class="css-edit-title " ><td colspan="9" >Speed & Easing</td></tr>

                                    <tr class="">
                                        <td>Speed:</td>
                                        <td >
                                            <input class="css_edit_novice tpshortinput" name="captionspeed" type="text" value="600" />ms
                                        </td>

                                        <td>Easing:</td>
                                        <td >
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

                                        <td></td>
                                        <td>Split:</td>
                                        <td >
                                            <select id="caption-splitin-demo" name="caption-splitin-demo" class="">
                                                <option value="none">none</option>
                                                <option value="lines">Lines</option>
                                                <option value="words">Words</option>
                                                <option value="chars">Chars</option>

                                            </select>

                                        </td>


                                        <td>Speed:</td>
                                        <td >
                                            <input class="css_edit_novice tpshortinput" name="splitspeedin" type="text" value="100" />ms
                                        </td>
                                    </tr>

                                    <!-- ROTATION -->
                                </table>

                                <table style="border-spacing:0px">

                                    <!-- TRANSITION -->

                                    <tr class="css-edit-title graybasicbg" ><td colspan="9" >Transition</td></tr>

                                    <tr class="graybasicbg">
                                        <td>X:</td>
                                        <td >
                                            <input class="css_edit_novice tpshortinput" name="movex" type="text" value="0" />px
                                        </td>

                                        <td>Y:</td>
                                        <td >
                                            <input class="css_edit_novice tpshortinput" name="movey" type="text" value="0" />px
                                        </td>

                                        <td>Z:</td>
                                        <td >
                                            <input class="css_edit_novice tpshortinput" name="movez" type="text" value="0" />px
                                        </td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <!-- ROTATION -->
                                </table>
                                <table style="border-spacing:0px">
                                    <tr class="css-edit-title">
                                        <td colspan="9" >Rotation</td>
                                    </tr>
                                    <tr>
                                        <td>X:</td>
                                        <td >
                                            <input class="css_edit_novice tpshortinput" name="rotationx" type="text" value="0" />°
                                        </td>

                                        <td>Y:</td>
                                        <td >
                                            <input class="css_edit_novice tpshortinput" name="rotationy" type="text" value="0" />°
                                        </td>

                                        <td>Z:</td>
                                        <td >
                                            <input class="css_edit_novice tpshortinput" name="rotationz" type="text" value="0" />°
                                        </td>

                                        <td></td>
                                        <td></td>
                                        <td></td>

                                    </tr>

                                </table>
                                <table style="border-spacing:0px">
                                    <!-- SCALE && SKEW-->

                                    <tr class="css-edit-title graybasicbg">
                                        <td colspan="4" >Scale</td>
                                        <td colspan="5" >Skew</td>
                                    </tr>

                                    <tr class="graybasicbg">
                                        <!-- SCALE X -->
                                        <td >X:</td>
                                        <td >
                                            <input class="css_edit_novice tpshortinput" name="scalex" type="text" value="100" />%
                                        </td>
                                        <!-- SCALE Y -->
                                        <td >Y:</td>
                                        <td >
                                            <input class="css_edit_novice tpshortinput" name="scaley" type="text" value="100" />%
                                        </td>
                                        <td >X:</td>
                                        <!-- SKEW X -->
                                        <td >
                                            <input class="css_edit_novice tpshortinput" name="skewx" type="text" value="0" />°
                                        </td>

                                        <td >Y:</td>
                                        <!-- SKEW Y -->
                                        <td >
                                            <input class="css_edit_novice tpshortinput" name="skewy" type="text" value="0" />°
                                        </td>
                                        <td></td>
                                    </tr>

                                </table>

                                <table class="lasttable" style="padding-bottom:20px;border-spacing:0px">
                                    <!-- OPACITY -->

                                    <tr class="css-edit-title">
                                        <td colspan="2">Opacity</td>
                                        <td colspan="2">Perspective</td>
                                        <td colspan="5">Origin</td>
                                    </tr>

                                    <tr class="">
                                        <!-- OPACITY -->
                                        <td >0-100:</td>
                                        <td >
                                            <input class="css_edit_novice tpshortinput" name="captionopacity" type="text" value="0" />%
                                        </td>
                                        <!-- PERSPECTIVE -->
                                        <td >300-1600:</td>
                                        <td >
                                            <input class="css_edit_novice tpshortinput" name="captionperspective" type="text" value="600" />px
                                        </td>
                                        <!-- ORIGINX -->
                                        <td >X:</td>
                                        <td >
                                            <input class="css_edit_novice tpshortinput" name="originx" type="text" value="50" />%
                                        </td>
                                        <!-- ORIGINY -->
                                        <td >Y:</td>
                                        <td >
                                            <input class="css_edit_novice tpshortinput" name="originy" type="text" value="50" />%
                                        </td>
                                        <td></td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </section>




                    <section id="outanimation">
                        <div class="caption-demo-controll">

                            <div id="caption-inout-controll" class="caption-inout-controll">
                                <i id="" class="revicon-logout"></i> Out Animation Editor <span style="font-size:12px"> (Click to Collapse/Expand)</span>
                            </div>

                        </div>
                        <div class="settings_wrapper">
                            <div class="postbox unite-postbox">
                                <table class="lasttable"  style="padding-top:20px;border-spacing:0px">

                                    <!-- TRANSITION -->

                                    <tr class="css-edit-title " ><td colspan="9" >Speed & Easing</td></tr>

                                    <tr class="">
                                        <td>Speed:</td>
                                        <td >
                                            <input class="css_edit_novice tpshortinput" name="captionspeedout" type="text" value="600" />ms
                                        </td>

                                        <td>Easing:</td>
                                        <td >
                                            <select id="caption-easing-demoout" name="caption-easing-demooutout" class="">
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

                                        <td></td>
                                        <td>Split:</td>
                                        <td >
                                            <select id="caption-splitout-demo" name="caption-splitout-demo" class="">
                                                <option value="none">none</option>
                                                <option value="lines">Lines</option>
                                                <option value="words">Words</option>
                                                <option value="chars">Chars</option>

                                            </select>

                                        </td>


                                        <td>Speed:</td>
                                        <td >
                                            <input class="css_edit_novice tpshortinput" name="splitspeedout" type="text" value="100" />ms
                                        </td>
                                    </tr>

                                    <!-- ROTATION -->
                                </table>

                                <table style="border-spacing:0px">

                                    <!-- TRANSITION -->

                                    <tr class="css-edit-title graybasicbg" ><td colspan="9" >Transition</td></tr>

                                    <tr class="graybasicbg">
                                        <td>X:</td>
                                        <td >
                                            <input class="css_edit_novice tpshortinput" name="movexout" type="text" value="0" />px
                                        </td>

                                        <td>Y:</td>
                                        <td >
                                            <input class="css_edit_novice tpshortinput" name="moveyout" type="text" value="0" />px
                                        </td>

                                        <td>Z:</td>
                                        <td >
                                            <input class="css_edit_novice tpshortinput" name="movezout" type="text" value="0" />px
                                        </td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <!-- ROTATION -->
                                </table>
                                <table style="border-spacing:0px">
                                    <tr class="css-edit-title">
                                        <td colspan="9" >Rotation</td>
                                    </tr>
                                    <tr>
                                        <td>X:</td>
                                        <td >
                                            <input class="css_edit_novice tpshortinput" name="rotationxout" type="text" value="0" />°
                                        </td>

                                        <td>Y:</td>
                                        <td >
                                            <input class="css_edit_novice tpshortinput" name="rotationyout" type="text" value="0" />°
                                        </td>

                                        <td>Z:</td>
                                        <td >
                                            <input class="css_edit_novice tpshortinput" name="rotationzout" type="text" value="0" />°
                                        </td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                </table>
                                <table style="border-spacing:0px">
                                    <!-- SCALE && SKEW-->

                                    <tr class="css-edit-title graybasicbg">
                                        <td colspan="4" >Scale</td>
                                        <td colspan="5" >Skew</td>
                                    </tr>

                                    <tr class="graybasicbg">
                                        <!-- SCALE X -->
                                        <td >X:</td>
                                        <td >
                                            <input class="css_edit_novice tpshortinput" name="scalexout" type="text" value="100" />%
                                        </td>
                                        <!-- SCALE Y -->
                                        <td >Y:</td>
                                        <td >
                                            <input class="css_edit_novice tpshortinput" name="scaleyout" type="text" value="100" />%
                                        </td>
                                        <td >X:</td>
                                        <!-- SKEW X -->
                                        <td >
                                            <input class="css_edit_novice tpshortinput" name="skewxout" type="text" value="0" />°
                                        </td>

                                        <td >Y:</td>
                                        <!-- SKEW Y -->
                                        <td >
                                            <input class="css_edit_novice tpshortinput" name="skewyout" type="text" value="0" />°
                                        </td>
                                        <td></td>
                                    </tr>

                                </table>

                                <table class="lasttable" style="padding-bottom:20px;border-spacing:0px">
                                    <!-- OPACITY -->

                                    <tr class="css-edit-title">
                                        <td colspan="2" >Opacity</td>
                                        <td colspan="2" >Perspective</td>
                                        <td colspan="5" >Origin</td>
                                    </tr>

                                    <tr class="">
                                        <!-- OPACITY -->
                                        <td >0-100:</td>
                                        <td >
                                            <input class="css_edit_novice tpshortinput" name="captionopacityout" type="text" value="0" />%
                                        </td>
                                        <!-- PERSPECTIVE -->
                                        <td >300-1200:</td>
                                        <td >
                                            <input class="css_edit_novice tpshortinput" name="captionperspectiveout" type="text" value="600" />px
                                        </td>
                                        <!-- ORIGINX -->
                                        <td >X:</td>
                                        <td >
                                            <input class="css_edit_novice tpshortinput" name="originxout" type="text" value="50" />%
                                        </td>
                                        <!-- ORIGINY -->
                                        <td >Y:</td>
                                        <td >
                                            <input class="css_edit_novice tpshortinput" name="originyout" type="text" value="50" />%
                                        </td>
                                        <td></td>
                                    </tr>

                                </table>
                            </div>
                        </div>

                    </div>
                    <div style="width:50%;float:left;height:100%">			
                        <div class="tp-present-wrapper-parent">
                            <div class="tp-present-wrapper">
                                <div class="tp-present-caption">
                                    <div id="caption_custon_anim_preview" class="">
                                        LAYER EXAMPLE
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="layer_list" style="width:50%;float:left;">
                        <span>Layer List</span>
                        <!--layer list-->
                        <ul id="sort_list">

                        </ul>
                    </div>

                    <div style="clear:both;"></div>
                </div>
                <div class="divide40"></div>
            </section>
        </article>
        <div class="container">
            <button class="btn-save btn btn-danger pull-right">Lưu</button>
        </div>
    </div>


    <!-- imtoantran image manager-->			
    <div id="image_manager" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-max-height="840" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" >
                <div class="modal-body" id="service_detail_modal_body">            
                    <button type="button" class="close btn-close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <div class="row">
                        <table id="slides_list" class="table table-hover" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><b>ID</b></th>
                                    <th><b>Tên</b></th>
                                    <th><b>Hình ảnh</b></th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tfoot>
                                <tr>
                                    <th><b>ID</b></th>
                                    <th><b>Tên</b></th>
                                    <th><b>Hình ảnh</b></th>
                                    <th></th>
                                </tr>
                            </tfoot>

                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="row">	
                        <div class="col-xs-12">
                            <form id="upload_form" class="form-inline" name="upload_image" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input id="fileToUpload" style="" name="fileToUpload" class="btn btn-sm btn-info" value="Upload" type="file" />
                                </div>                                    
                                <div class="form-group">
                                    <input  id="upload_image" class="btn btn-danger btn-sm" value="Upload" name="submit" type="submit" />
                                </div>
                            </form>
                        </div>
                    </div>              
                </div>
                <div class="row">
                    <div class="upload-message"></div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- imtoantran image manager-->			
<!-- imtoantran css edit -->
<div id="css_edit" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-max-height="840" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" >
            <div class="modal-body" id="service_detail_modal_body">
                <button type="button" class="close btn-close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <div class="row">

                    <label class="label">Tùy chỉnh CSS</label>
                    <div class="input-group">
                        <span class="input-group-addon">Tên class</span>
                        <input name="class-name" class="form-control"/>

                    </div>
                </div>
                <div class="row">						
                    <div class="input-group">
                        <span class="input-group-addon">CSS</span>
                        <textarea name="css-content" class="form-control"></textarea>
                    </div>
                    <button id="save-css" class="btn btn-primary pull-right">Lưu</button>							
                </div>
            </div>
        </div>
    </div>
</div>	
<!-- error modal -->
<div class="modal fade" id="error-modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" >
            <div class="modal-body" id="service_detail_modal_body">            
                <button type="button" class="close btn-close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <div class="row">
                    <div class="col-xs-12" id="error-message"></div>
                </div>
            </div>
        </div>
    </div>    
</div>
<!-- error modal -->

<!-- imtoantran css edit -->
<div id="loading" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-max-height="840" data-backdrop="static">
    <div class="text-center"><i style="color: #FDBD0E" class="fa fa-3x fa-refresh fa-spin text-center"></i></div>
</div>
<script>
    var IS_ADD = 0;
    var IS_EDIT = 1;
    var slide_id = "<?php echo $this->slide_id; ?>";
    var layers = [];
    var baseURL = "<?php echo ASSETS . 'revslider/images/'; ?>"
    var layerindex;
    var params ={};
    var slider_id ="<?php print $this->slider_id; ?>";
</script>