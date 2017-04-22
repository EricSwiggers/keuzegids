<!DOCTYPE html>
<html lang="nl">
<?php 
include('includes/_head.php');

?>
<body class="detail-page">
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
  <div class="row heading-holder">
    <h1 class="heading"><?php echo $page->title; ?></h1>
  </div>
  <div class="row">
    <div class="main-text">
      <div class="blog text-columns2"> <?php echo $page->body; ?> </div>
      
      <?php if($user->language->name == 'default'): ?>
		  
		  <?php if(count($page->person_select_nl) > 0): ?>
          <div class="persons-holder">
            <?php foreach($page->person_select_nl as $person): ?>
            <div class="person"> 
            <img src="<?php echo $person->persons_image->getThumb('person'); ?>" alt="<?php echo $person->persons_image->description; ?>"/> 
            <div class="person-inner">
                <span class="persons-subjects">
                    <?php if(count($person->subject_select) > 0) {
                        foreach($person->subject_select as $subject){ echo '<a href="'.$subject->url.'">'.$subject->get('headline|title').'</a>'; }
                    } ?>
                </span>
                <span class="persons-name"><?php echo $person->get('persons_name|title'); ?></span>
                <span class="persons-mail"><a href="mailto:<?php echo $person->persons_email; ?>"><?php echo $person->persons_email; ?></a></span>
                </div>
            </div>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>
          
         <?php else: ?>
         
         <?php if(count($page->person_select_en) > 0): ?>
          <div class="persons-holder">
            <?php foreach($page->person_select_en as $person): ?>
            <div class="person"> 
            <img src="<?php echo $person->persons_image->getThumb('person'); ?>" alt="<?php echo $person->persons_image->description; ?>"/> 
            <div class="person-inner">
                <span class="persons-subjects">
                    <?php if(count($person->subject_select) > 0) {
                        foreach($person->subject_select as $subject){ echo '<a href="'.$subject->url.'">'.$subject->get('headline|title').'</a>'; }
                    } ?>
                </span>
                <span class="persons-name"><?php echo $person->get('persons_name|title'); ?></span>
                <span class="persons-mail"><a href="mailto:<?php echo $person->persons_email; ?>"><?php echo $person->persons_email; ?></a></span>
                </div>
            </div>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>
         
         <?php endif; ?>
      
      
      
    </div>
  </div>
  <div class="row">
    <?php if($page->prev->url): ?>
    <a href="<?php echo $page->prev->url; ?>" class="goto prev"><span class="fa fa-chevron-left"></span> <?php echo $page->prev->title; ?></a>
    <?php endif; ?>
    <?php if($page->next->url): ?>
    <a href="<?php echo $page->next->url; ?>" class="goto next"><?php echo $page->next->title; ?><span class="fa fa-chevron-right"></span></a>
    <?php endif; ?>
  </div>
</div>
<!-- End Container -->
<?php
include('includes/_footer.php');
include('includes/_scripts.php');
?>
</body>
</html>
