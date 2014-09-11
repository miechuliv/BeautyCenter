<?php echo $header; ?>
<style>
.margin-form {
  color: #7F7F7F;
}
  td {
    padding-right: 20px;
  }
#content * {
  overflow: hidden;
}  
</style>
<div id="content" style="width:0px;">
<div class="breadcrumb">
  <?php foreach ($breadcrumbs as $breadcrumb) { ?>
  <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
  <?php } ?>
</div>
<?php if ($error_warning) { ?>
  <div class="warning"><?php echo $error_warning; ?></div>
<?php } ?>

<div class="box">
  <div class="heading">
    <h1><img src="view/image/module/personalbar/logo.png" /><?php echo $heading_title; ?></h1>
  </div>
  <div class="content" style="min-height: auto;">
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
      <table>
        <tr>
          <td>
            <?php echo $email; ?>
          </td>
          <td>
            <input type="text" name="cs_email_field" value="<?php echo $email_value; ?>" style="width:200px;">
          </td>
        </tr>
        <tr>
          <td>Store Front URL:</td>
          <td><input type="text" name="cs_storeurl_field" value="<?php echo $storeurl_value; ?>" style="width:200px;"></td>
        </tr>
        <tr>
          <td></td>
          <td style="text-align:center;">
            <a onclick="$('#form').submit();" class="button"><span>Create My Account</span></a>
          </td>
        </tr>

      </table>
      <div class="margin-form" style="width:200px;">
            The Personal Bar will be hidden from your shoppers until you click "Go Live" from your Config Panel.
            </div>
    </form>
  </div>
</div>
<style>
          .cs-spacer {
            margin-top: 15px;
          }
          .cs-spacer2 {
            margin-top: 25px;
          }
        </style>
      <div class="box">
      <div class="heading">
        <h1><img src="view/image/module/personalbar/logo.png" /><?php echo $about_title; ?></h1>
      </div>
      <div class="content" style="min-height: auto;">
      <div>
        <div style="text-align: center;">
          <h2>Personal Bar - Personalized Shopping & Coupons</h2>
        </div>
        <h3>
          <strong>Want more buying customers? Reduced shopping cart abandonment?<br />Get It Now - The Free Personal Bar for OpenCart!
          </strong>
        </h3>
        <div class="cs-spacer"></div>
        <p><strong>A floating footer (toolbar), placed at the bottom of your website pages, which boosts your OpenCart store.</strong></p>
        <div class="cs-spacer"></div>
        <p><strong>Be There For Your Shoppers. </strong>Have all your store's key assets in one place, always-on, including: In-site search, Checkout, Live chat, Social buttons, Coupons and more (supports all of your existing technology vendors for search, chat, etc.)</p>
        <div class="cs-spacer"></div>
        <p><strong>Give a Personal Experience. </strong>Automatically trigger the right experience for each shopper. Target specific shoppers with real-time coupons, free shipping, trigger a personal offer, marketing message or live chat support.</p>
        <div class="cs-spacer"></div>
        <p>Usage is simple and genius: 2-min setup, no IT required. Easy customization to fully match your shop's design and theme using an intuitive Config Panel.</p>
        <div class="cs-spacer2"></div>
      </div>
      <div class="cs-spacer2"></div>
      <div style="text-align: center;">
        <a href="http://bit.ly/Zdl9TT" onclick="window.open(this.href, 'mywin','left=20,top=20,width=640,height=360,toolbar=1,resizable=0'); return false;">
          <img src="http://commercesciences.com/static/images/personalbar_video_thumbnail.png?<?php echo $this->plugin_id; ?>"/>
        </a>
      </div>
      <div class="cs-spacer2"></div>
      <div style="text-align: center;">
        <h2>How does it look?</h2>
        <img src="http://commercesciences.com/public/images/plugin/intro-img.png?<?php echo $this->plugin_id; ?>" />
      </div>
      <div class="cs-spacer2"></div>
      <div style="text-align: center;">
        <h2>Learn How It Works</h2>
        <img src="http://commercesciences.com/public/images/plugin/how-it-works.png?<?php echo $this->plugin_id; ?>" alt="How it works" />
        </div>
      <div class="cs-spacer2"></div>

      <div style="text-align: center;">
        <h2>Personalization Use Cases</h2>
        <img src="http://commercesciences.com/public/images/plugin/experiences.png?<?php echo $this->plugin_id; ?>" />
      </div>
      <div class="cs-spacer2"></div>
      <div style="text-align: center;">
        <h2></h2>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
      <table>
        <tr>
          <td>
            <?php echo $email; ?>
          </td>
          <td>
            <input type="text" name="cs_email_field" value="<?php echo $email_value; ?>" style="width:200px;">
          </td>
        </tr>
        <tr>
          <td>Store Front URL:</td>
          <td><input type="text" name="cs_storeurl_field" value="<?php echo $storeurl_value; ?>" style="width:200px;"></td>
        </tr>
        <tr>
          <td></td>
          <td style="text-align:center;">
            <a onclick="$('#form').submit();" class="button"><span>Create My Account</span></a>
          </td>
        </tr>

      </table>
    </form>
      </div>
    </div>
