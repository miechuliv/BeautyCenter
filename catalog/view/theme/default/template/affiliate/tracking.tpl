<?php echo $header; ?><?php echo $column_left; ?><?php echo $column_right; ?>
<div id="content"><?php echo $content_top; ?>
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <h1><?php echo $heading_title; ?></h1>
  <p><?php echo $text_description; ?></p>
  <p><?php echo $text_code; ?><br />
    <textarea cols="40" rows="5"><?php echo $code; ?></textarea>
  </p>
  <p><?php echo $text_generator; ?><br />
    <input type="text" name="product" value="" /> or <a id="all_products">All products</a>
  </p>
  <p><?php echo $text_link; ?><br />
    <textarea id="link" cols="40" rows="5"></textarea>
  </p>
  <div id="tableWrapper">
	<div class="tableBody">
		
		<p>Banners for your website</p>
		

						
<form name="test">
			<p class="bannerSize">[468x60]<br />
			<img src="<?php echo $base; ?>admin/uploader/server/php/files/banner468_60.gif" width="468" height="60" />
			<div class="dhtmlgoodies_question">
				                              <span>Get HTML code</span></div>
				<div class="dhtmlgoodies_answer"><div><a href="javascript:selectAll('test.select1')">Select All</a>
					<textarea name="select1" id="link1"></textarea>
				</div>
				</div></p>
			
            <p class="bannerSize">[300x250]<br />
			<img src="<?php echo $base; ?>admin/uploader/server/php/files/banner300_250.gif" width="300" height="250" />
			<div class="dhtmlgoodies_question">
				                              <span>Get HTML code</span></div>
				<div class="dhtmlgoodies_answer"><div><a href="javascript:selectAll('test.select2')">Select All</a>

					<textarea name="select2" id="link2"></textarea></div>
				</div></p>
			<p class="bannerSize">[728x90]<br />
			<img src="<?php echo $base; ?>admin/uploader/server/php/files/banner728_90.gif" width="728" height="90" />
			<div class="dhtmlgoodies_question">
				                              <span>Get HTML code</span></div>
				<div class="dhtmlgoodies_answer"><div><a href="javascript:selectAll('test.select3')">Select All</a>

					<textarea name="select3" id="link3"></textarea></div>
				</div></p>
			<p class="bannerSize">[120x600]<br />
			<img src="<?php echo $base; ?>admin/uploader/server/php/files/banner120_600.gif" width="120" height="600" />
			<div class="dhtmlgoodies_question">
				                              <span>Get HTML code</span></div>
				<div class="dhtmlgoodies_answer"><div><a href="javascript:selectAll('test.select4')">Select All</a>

					<textarea name="select4" id="link4"></textarea></div>
				</div></p>
			<p class="bannerSize">[120x240]<br />
			<img src="<?php echo $base; ?>admin/uploader/server/php/files/banner120_240.gif" width="120" height="240" />
			<div class="dhtmlgoodies_question">
				                              <span>Get HTML code</span></div>
				<div class="dhtmlgoodies_answer"><div><a href="javascript:selectAll('test.select5')">Select All</a>

					<textarea name="select5" id="link5"></textarea></div>
				</div></p>
			<p class="bannerSize">[120x90]<br />
			<img src="<?php echo $base; ?>admin/uploader/server/php/files/banner120_90.gif" width="120" height="90" />
			<div class="dhtmlgoodies_question">
				                              <span>Get HTML code</span></div>
				<div class="dhtmlgoodies_answer"><div><a href="javascript:selectAll('test.select6')">Select All</a>

					<textarea name="select6" id="link6"></textarea></div>
				</div></p>
			<p class="bannerSize">[125x125]<br />
			<img src="<?php echo $base; ?>admin/uploader/server/php/files/banner125_125.gif" width="125" height="125" />
			<div class="dhtmlgoodies_question">
				                              <span>Get HTML code</span></div>
				<div class="dhtmlgoodies_answer"><div><a href="javascript:selectAll('test.select7')">Select All</a>

					<textarea name="select7" id="link7"></textarea></div>
				</div></p>
				
			<p class="bannerSize">[250x250]<br />
			<img src="<?php echo $base; ?>admin/uploader/server/php/files/banner250_250.gif" width="250" height="250" />
			<div class="dhtmlgoodies_question">
				                              <span>Get HTML code</span></div>
				<div class="dhtmlgoodies_answer"><div><a href="javascript:selectAll('test.select8')">Select All</a>

					<textarea name="select8" id="link8"></textarea></div>
				</div></p>	
				
				<p class="bannerSize">[110x80]<br />
			<img src="<?php echo $base; ?>admin/uploader/server/php/files/banner110_80.gif" width="110" height="80" />
			<div class="dhtmlgoodies_question">
				                              <span>Get HTML code</span></div>
				<div class="dhtmlgoodies_answer"><div><a href="javascript:selectAll('test.select9')">Select All</a>

					<textarea name="select9" id="link9"></textarea></div>
				</div></p>
				</form>
			</div>
</div>
<span style="font-size:10px">Powered by "<a style="font-size:10px" href="http://www.profound-english.com">Learn English</a>"</span>
<script type="text/javascript" src="<?php echo $base; ?>catalog/view/javascript/banners.js"></script>
<link rel="stylesheet" href="<?php echo $base; ?>catalog/view/theme/default/stylesheet/banners.css" type="text/css" />
  <div class="buttons">
    <div class="right"><a href="<?php echo $continue; ?>" class="button"><span><?php echo $button_continue; ?></span></a></div>
  </div>
  <?php echo $content_bottom; ?></div>
<script type="text/javascript"><!--
$('input[name=\'product\']').autocomplete({
	delay: 0,
	source: function(request, response) {
		$.ajax({
			url: 'index.php?route=affiliate/tracking/autocomplete&filter_name=' +  encodeURIComponent(request.term),
			dataType: 'json',
			success: function(json) {		
				response($.map(json, function(item) {
					return {
						label: item.name,
						label1: item.link1,
						label2: item.link2,
						label3: item.link3,
						label4: item.link4,
						label5: item.link5,
						label6: item.link6,
						label7: item.link7,
						label8: item.link8,
						label9: item.link9,
						value: item.link, 			
						
					}
				}));
			}
		});
		
	},
	select: function(event, ui) {
		$('input[name=\'product\']').attr('value', ui.item.label);
		$('textarea[id=\'link\']').attr('value', ui.item.value);
		$('textarea[id=\'link1\']').attr('value', ui.item.label1);
        $('textarea[id=\'link2\']').attr('value', ui.item.label2);	
        $('textarea[id=\'link3\']').attr('value', ui.item.label3);	
        $('textarea[id=\'link4\']').attr('value', ui.item.label4);
        $('textarea[id=\'link5\']').attr('value', ui.item.label5);
        $('textarea[id=\'link6\']').attr('value', ui.item.label6);
        $('textarea[id=\'link7\']').attr('value', ui.item.label7);
        $('textarea[id=\'link8\']').attr('value', ui.item.label8);
        $('textarea[id=\'link9\']').attr('value', ui.item.label9);		
		return false;
	}
});
var $url = "<?php echo $base; ?>";
var $codes = "<?php echo $code;?>";
var $home = "index.php?route=common/home&tracking=";
var $front = "&quot;&gt;&lt;img src=&quot;";
var $start = "&lt;a target=&quot;_blank&quot; href=&quot;"
var $end = "&lt;/a&gt;"
var $link = $start + $url + $home + $codes + $front + $url;

var $img1 = "admin/uploader/server/php/files/banner468_60.gif&quot;&gt;&lt;/a&gt;";
var $img2 = "admin/uploader/server/php/files/banner300_250.gif&quot;&gt;&lt;/a&gt;";
var $img3 = "admin/uploader/server/php/files/banner728_90.gif&quot;&gt;&lt;/a&gt;";
var $img4 = "admin/uploader/server/php/files/banner120_600.gif&quot;&gt;&lt;/a&gt;";
var $img5 = "admin/uploader/server/php/files/banner120_240.gif&quot;&gt;&lt;/a&gt;";
var $img6 = "admin/uploader/server/php/files/banner120_90.gif&quot;&gt;&lt;/a&gt;";
var $img7 = "admin/uploader/server/php/files/banner125_125.gif&quot;&gt;&lt;/a&gt;";
var $img8 = "admin/uploader/server/php/files/banner250_250.gif&quot;&gt;&lt;/a&gt;";
var $img9 = "admin/uploader/server/php/files/banner110_80.gif&quot;&gt;&lt;/a&gt;";
$("#all_products").one('click',function() {
  $("#link").append($url).append($home).append($codes);
  $("#link1").append($link).append($img1);
  $("#link2").append($link).append($img2);
  $("#link3").append($link).append($img3);
  $("#link4").append($link).append($img4);
  $("#link5").append($link).append($img5);
  $("#link6").append($link).append($img6);
  $("#link7").append($link).append($img7);
  $("#link8").append($link).append($img8);
  $("#link9").append($link).append($img9);
  return false;
});
//--></script> 

<?php echo $footer; ?>