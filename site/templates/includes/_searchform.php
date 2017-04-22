<div class="searchlang-wrapper">
<?php if($user->language->name == 'default'): ?>
	<form class='search' action='<?php echo $pages->get('template=search')->url; ?>' method='get'>
  	<input type='text' name='q' placeholder='Zoeken' class='searchfield' value='<?php echo $sanitizer->entities($input->whitelist('q')); ?>' />
  	<button type='submit' name='submit' title="Zoeken" class="fa fa-search"></button>
	</form>

<?php else: ?> 
	<form class='search' action='<?php echo $pages->get('template=search')->url; ?>' method='get'>
  	<input type='text' name='q' placeholder='Search' class='searchfield' value='<?php echo $sanitizer->entities($input->whitelist('q')); ?>' />
  	<button type='submit' name='submit' title="Search" class="fa fa-search"></button>
	</form>
<?php endif; ?>

<div class="languagebuttons">


  <?php
	foreach($languages as $language) {
	  $selected = '';
	
	  // if this page isn't viewable (active) for the language, skip it
	  if(!$page->viewable($language)) continue;
	
	  // if language is current user's language, make it selected
	  if($user->language->id == $language->id) $selected = "selected";
	
	  // determine the "local" URL for this language
	  $url = $page->localUrl($language);
	
	  // output the option tag
	  echo "<a class='$selected languagebutton' href='$url'>$language->title</a>";
	}
?>


</div>

</div>



