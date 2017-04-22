<!DOCTYPE html>
<html lang="nl">
<?php 
include('includes/_head.php');

?>
<body class="detailplus-page">

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
    <?php include('includes/_breadcrumbs.php');  ?>


    <div id="main-video">
    	<div id="video-close-btn" class="btn btn-icon"><img src="<?php echo $config->urls->templates?>img/closeWhite.png" /></div>
    	<div class="row" id="youtube-row">
    		<?php echo $page->main_video; ?>
        </div>
    </div>

   	<div class="row heading-holder">
      
        
        <div class="button-holder">
            
            <?php if($page->bar_content): ?>
            	<div class="button-icons btn bar-buttons" id="inhoud"><span class="fa fa-file-text-o"></span>
                	<p><?php if($page->english) { echo 'Content';} else { echo __('Inhoud');} ?></p>
                </div>
            <?php endif; ?>
            <?php if($page->bar_workfield): ?>
            	<div class="button-icons btn bar-buttons" id="werkveld"><span class="fa fa-globe"></span>
               <p><?php if($page->english) { echo 'Field';} else { echo __('Werkveld');} ?></p>
                </div>
            <?php endif; ?>
            
            
			<?php if(count($page->bar_projects)): ?>
				<?php if($page->id == 1024): ?>
                    <div class="button-icons btn bar-buttons" id="projecten"><span class="fa fa-newspaper-o"></span>
                        <p><?php if($page->english) { echo 'Blog';} else { echo __('Blog');} ?></p>
                    </div>
                    <?php else: ?>
                    <div class="button-icons btn bar-buttons" id="projecten"><span class="fa fa-check"></span>
                        <p><?php if($page->english) { echo 'Projects';} else { echo __('Projecten');} ?></p>
                    </div>
                    <?php endif; ?>
            <?php endif; ?>
            
            
            <?php if($page->bar_info): ?>
            	<div class="button-icons btn bar-buttons" id="info"><span class="fa fa-info"></span>
               <p><?php if($page->english) { echo 'More info';} else { echo __('Meer info');} ?></p>
                </div>
            <?php endif; ?>
            <?php if($page->main_video): ?>
            	<div class="button-icons btn" id="video"><span class="fa fa-video-camera"></span><p>Video</p></div>
            <?php endif; ?>
        </div>
        
        <h1 class="heading"><?php echo $page->title; ?></h1>
        
    </div> 
    
    
        
       <div class="bar-holder">
		   <?php if($page->body): ?>
                 <div class="bar-main">
                    <div class="row">
                        <?php echo $page->body; ?>
                        
                        <?php if($page->quote_text): ?>
                         <div class="quote-holder">
                         	<?php if($page->quote_img): ?>
                             	<div class="quote-img"><img src="<?php echo $page->quote_img->getThumb('thumbnail'); ?>"/></div>
                          	<?php endif; ?>
                            
                             <p class="quote-text"><?php echo $page->quote_text; ?></p>
                             <p class="quote-name"><?php echo $page->quote_name; ?></p>
                             
                         </div>
                         <?php endif; ?>
                         
                         
                    </div>
                 </div>
                 <div class="main-image" <?php if($page->background_image): ?>
                		style="background-image: url(<?php echo $page->background_image->getThumb('detail'); ?>)"        
            <?php endif; ?>
        ></div>
            <?php endif; ?> <!-- end bar-main-->
         
         <!-- Sliding Bars -->
         <?php if($page->bar_content): ?>
             <div class="bar-extra" id="bar-inhoud">
                <div class="row">
                <h2><?php if($page->english) { echo 'Content';} else { echo __('Inhoud');} ?></h2>
                <span class="arrow-right fa fa-chevron-right"></span></div>
                 <div class="row text-columns2">       
                    <?php echo $page->bar_content; ?>
                 </div>
             </div>
         <?php endif; ?>
         
         <?php if($page->bar_workfield): ?>
             <div class="bar-extra" id="bar-werkveld">
             	<div class="row">
                <h2><?php if($page->english) { echo 'Field';} else { echo __('Werkveld');} ?></h2>
                <span class="arrow-right fa fa-chevron-right"></span></div>
                 <div class="row text-columns2">
                    <?php echo $page->bar_workfield; ?>
                 </div>
             </div>
         <?php endif; ?>
         
         <?php if(count($page->bar_projects)): ?>
             <div class="bar-extra" id="bar-projecten">
             
              <div class="row">
              
              <?php if($page->id == 1024): ?>
              <h2><?php if($page->english) { echo 'Blogs';} else { echo __('Blogs');} ?></h2>
              <?php else: ?>
              <h2><?php if($page->english) { echo 'Projects';} else { echo __('Projecten');} ?></h2>
              <?php endif; ?>
              
              
              
              <span class="arrow-right fa fa-chevron-right"></span></div>
              
                <div class="row">
                <?php foreach($page->bar_projects as $project): ?>
                
                    <?php if($project->single_image): ?>           
                        
                        <div class="project project-image">
                        <?php if($project->project_url): ?>
                            <a href="<?php echo $project->project_url; ?>" target="_blank">
                                <img src="<?php echo $project->single_image->getThumb('detail'); ?>"/>
                            </a>
                        <?php else: ?>
                        		<img src="<?php echo $project->single_image->getThumb('detail'); ?>"/>
						<?php endif; ?>
                            <span class="project-label js_equalize"><?php echo $project->project_label; ?></span>
                        </div>
                
                    <?php elseif($project->project_video): ?>
                        <div class="project project-video">
                            <?php echo $project->project_video; ?>
                             <span class="project-label js_equalize"><?php echo $project->project_label; ?></span>
                        </div>
                
                    <?php endif; ?>
                
                <?php endforeach; ?>
                </div>
             </div>
         <?php endif; ?>
         
         <?php if($page->bar_info): ?>
             <div class="bar-extra" id="bar-info">
                <div class="row">
                <h2><?php if($page->english) { echo 'More info';} else { echo __('Meer info');} ?></h2>
                <span class="arrow-right fa fa-chevron-right"></span></div>
                 <div class="row text-columns2">
                        <?php echo $page->bar_info; ?>
                    </div>
             </div>
         <?php endif; ?>
         
    </div> <!-- End Barholder --> 
    <div class="row">
    <?php if($page->prev->url): ?>
			<a href="<?php echo $page->prev->url; ?>" class="goto prev"><span class="fa fa-chevron-left"></span> <?php echo $page->prev->title; ?></a>
    <?php endif; ?>    
    
    <?php if($page->next->url): ?>    
        	<a href="<?php echo $page->next->url; ?>" class="goto next"><?php echo $page->next->title; ?><span class="fa fa-chevron-right"></span></a>
     <?php endif; ?>    
    </div>
</div><!-- End Container -->
<?php
include('includes/_footer.php');
include('includes/_scripts.php');
?>
</body>
</html>
