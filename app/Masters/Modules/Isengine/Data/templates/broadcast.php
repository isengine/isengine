<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Parser;
use is\Model\Components\Display;
use is\Model\Components\Log;
use is\Model\Components\State;
use is\Model\Masters\View;
use is\Model\Masters\Database;

$view = View::getInstance();
$db = Database::getInstance();

$db->collection('content');
$db->driver->filter->addFilter('name', 'slider');
$db->driver->filter->addFilter('parents', '+slider');
$db->driver->filter->addFilter('type', '-settings');
$db->launch();

$data = $db->data->getFirstData();

$db->clear();

if (!System::typeIterable($data)) {
	return;
}
?>
<div class="prs_main_slider_wrapper">
    <div class="bvi-hide hidden-xs">
		<div id="rev_slider_41_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="food-carousel26" data-source="gallery" style="margin:0px auto;padding:0px;margin-top:0px;margin-bottom:0px;">
			<div class="prs_slider_overlay"></div>
			<div id="rev_slider_41_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.1">
				<ul>
<?php
foreach ($data as $item) {
?>
					<!-- SLIDE  -->
					<li
						class="linkimage"
						data-index="rs-145"
						data-transition="fade"
						data-slotamount="7"
						data-hideafterloop="0"
						data-hideslideonmobile="off"
						data-easein="default"
						data-easeout="default"
						data-masterspeed="300"
						data-rotate="0"
						data-saveperformance="off"
						data-link2="<?= $item['link']; ?>"
					>
						<!-- MAIN IMAGE -->
						<img src="<?= $item['img']; ?>" alt=""
						data-bgposition="center center"
						data-bgfit="contain"
						data-bgrepeat="no-repeat" class="rev-slidebg"
						data-no-retina>
						<div class="prs_upcom_movie_img_overlay"></div>
						<div class="prs_upcom_movie_img_btn_wrapper"><ul><li><a href="<?= $item['link']; ?>"<?= $item['ext'] ? ' target="_blank"' : null; ?>>Подробнее</a></li></ul></div>
						<!-- LAYERS -->
						<div
							id="slide-145-layer-5"
							class="tp-caption FoodCarousel-CloseButton rev-btn tp-resizeme"
							style="z-index: 7; white-space: nowrap;border-color:transparent;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"
							data-x="441"
							data-y="110"
							data-width="['auto']"
							data-height="['auto']"
							data-type="button"
							data-actions='[{"event":"click","action":"stoplayer","layer":"slide-145-layer-3","delay":""},{"event":"click","action":"stoplayer","layer":"slide-145-layer-5","delay":""},{"event":"click","action":"startlayer","layer":"slide-145-layer-1","delay":""}]' data-responsive_offset="on"
							data-frames='[{"from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","speed":800,"to":"o:1;","delay":"bytrigger","ease":"Power3.easeInOut"},{"delay":"bytrigger","speed":500,"to":"auto:auto;","ease":"nothing"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255,255,255,1);bg:rgba(41,46,49,1);bw:1px 1px 1px 1px;"}]' data-textAlign="['left','left','left','left']"
							data-paddingtop="[14,14,14,14]"
							data-paddingright="[14,14,14,14]"
							data-paddingbottom="[14,14,14,14]"
							data-paddingleft="[16,16,16,16]"
							data-lasttriggerstate="reset"
						>
							<i class="fa-icon-remove"></i>
						</div>
					</li>
<?php
}
unset($item);
?>
				</ul>
				<div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
			</div>
		</div>
    </div>
    
	<div class="main_owl_slider hidden-md hidden-lg hidden-xs bvi-show-block">
<?php
foreach ($data as $item) {
?>
		<a href="<?= $item['link']; ?>"><img src="<?= $item['mob']; ?>" alt=""></a>
<?php
}
unset($item);
?>
	</div>
    
	<div class="main_owl_slider hidden-xs bvi-show-block">
<?php
foreach ($data as $item) {
?>
		<a href="<?= $item['link']; ?>"><img src="<?= $item['img']; ?>" alt=""></a>
<?php
}
unset($item);
?>
	</div>
    
	<!-- END REVOLUTION SLIDER -->
	
</div>