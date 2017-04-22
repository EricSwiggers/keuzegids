<!DOCTYPE html>
<html lang="nl">
<?php 
include('includes/_head.php');
?>
<body class="overview-page"> 

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
<?php include('includes/_breadcrumbs.php'); ?>

	<div id="main-video">
    	<div id="video-close-btn" class="btn btn-icon"><img src="<?php echo $config->urls->templates?>img/closeWhite.png" /></div>
    	<div class="row" id="youtube-row">
    		<?php echo $page->main_video; ?>
        </div>
    </div>
	
    <div class="row heading-holder">
        <div class="button-holder">
            <?php if($page->main_video): ?>
            	<div class="button-icons btn" id="video"><span class="fa fa-video-camera"></span><p>Video</p></div>
            <?php endif; ?>
        </div>    
        <span class="heading"><h1><?php echo $page->title; ?></h1></span>     
    </div> 
    
    <?php if($page->body): ?>
    <div class="row">
        <div class="main-text">
        <?php if($page->heading_maintext): ?>
        <h2><?php echo $page->heading_maintext; ?></h2>
        <?php endif; ?>
        <div class="text-columns2">
        <?php echo $page->body; ?>
        </div>
        </div>
    </div>
	<?php endif; ?>
    
    <div class="row grid-holder">
    	<?php foreach($page->children as $child): ?>
	
    
    	<div class="overview-grid" onClick='document.location.href ="<?php echo $child->url; ?>"'
			<?php  ?>
                style="background-image: url(<?php 
				if(count($child->background_image)): echo $child->background_image->getThumb('detail'); 
				elseif(count($child->image_homepage)):  echo $child->image_homepage->getThumb('detail');
           		endif;
            ?>)" 
        >
        
        <div class="hover-box">
    	<a href="<?php echo $child->url; ?>" class="ghostbutton"><?php echo $child->title; ?><span class="fa fa-chevron-right"></span></a>
        </div>
    </div>
    
   
    
<?php endforeach; ?>

</div>
</div>

<?php
include('includes/_footer.php');
include('includes/_scripts.php');
?>
</body>
</html>