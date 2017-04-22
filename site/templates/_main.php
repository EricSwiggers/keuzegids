<?php if(!$config->ajax): ?>
<!DOCTYPE html>
<html lang="nl">
<?php 
include('includes/_head.php');

?>
<body class="search-page">


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
   <div class="row">
	
			<h1><?php echo $title; ?></h1>
			<?php if($user->language->name == 'default'): ?>
            <?php echo $content; ?>
            <?php else: ?>
            <?php echo $content2; ?>
            <?php endif; ?>
    </div>
</div>

	<?php
include('includes/_footer.php');
include('includes/_scripts.php');
?>

</body>
</html>
<?php else: ?>
<div class="searchresults">
<?php if($user->language->name == 'default'): ?>
     <?php echo $out; ?>
     <?php else: ?>
     <?php echo $out; ?>
     <?php endif; ?>
</div>            
<?php endif; ?>
