<!DOCTYPE html>
<html lang="nl">
<?php 
include('includes/_head.php');
?>
<body class="home-page">
<?php include_once("analyticstracking.php") ?>
<div id="header" class="fullwidth">
  <div class="row">
    <?php
    include('includes/_menubutton.php'); 
    include('includes/_searchform.php'); 
    ?>
  </div>
</div>

<div id="container" class="fullwidth">

<?php include('includes/_menu.php'); ?>
  <div id="main-video">
    <div id="video-close-btn" class="btn btn-icon"><img src="<?php echo $config->urls->templates?>img/closeWhite.png" /></div>
    <div class="row" id="youtube-row"> <?php echo $page->main_video; ?> </div>
  </div>
  <div class="row heading-holder">
    <div class="button-holder">
      <?php if($page->main_video): ?>
      <div class="button-icons btn" id="video"><span class="fa fa-video-camera"></span>
        <p>Video</p>
      </div>
      <?php endif; ?>
    </div>
    <span class="heading">
    <h1><?php echo $page->headline; ?></h1>
    </span> </div>
  
  
  <div class="row">
    <?php if($page->body): ?>
    <div class="main-text">
      <h2><?php echo $page->heading_maintext; ?></h2>
      <div class=""> <?php echo $page->body;  ?> </div>
    </div>
    <?php endif; ?>
    
    <div class="grid-holder">
    <?php foreach($page->children as $child): ?>
    <div class="overview-grid" onClick='document.location.href ="<?php echo $child->url; ?>"'
			<?php if(count($child->image_homepage)): ?>
                style="background-image: url(<?php echo $child->image_homepage->getThumb('detail'); ?>)"        
            <?php endif; ?>
        >
      <div class="hover-box"> <a href="<?php echo $child->url; ?>" class="ghostbutton"><?php echo $child->title; ?><span class="fa fa-chevron-right"></span></a> </div>
    </div>
    <?php endforeach; ?>
  </div>
    
    
    
  </div>
  
</div>
<?php
include('includes/_footer.php');
include('includes/_scripts.php');
?>
</body>
</html>