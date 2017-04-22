<?php

// search.php template file
// See README.txt for more information. 

// look for a GET variable named 'q' and sanitize it
$q = $sanitizer->text($input->get->q); 

// did $q have anything in it?
if($q) { 
	// Send our sanitized query 'q' variable to the whitelist where it will be
	// picked up and echoed in the search box by _main.php file. Now we could just use
	// another variable initialized in _init.php for this, but it's a best practice
	// to use this whitelist since it can be read by other modules. That becomes 
	// valuable when it comes to things like pagination. 
	$input->whitelist('q', $q); 

	// Sanitize for placement within a selector string. This is important for any 
	// values that you plan to bundle in a selector string like we are doing here.
	$q = $sanitizer->selectorValue($q); 

	// Search the title and body fields for our query text.
	// Limit the results to 50 pages. 
	$selector = "title|body|heading_maintext|bar_content|bar_projects|bar_workfield|bar_info|quote_name|quote_text%=$q, limit=50"; 

	// If user has access to admin pages, lets exclude them from the search results.
	// Note that 2 is the ID of the admin page, so this excludes all results that have
	// that page as one of the parents/ancestors. This isn't necessary if the user 
	// doesn't have access to view admin pages. So it's not technically necessary to
	// have this here, but we thought it might be a good way to introduce has_parent.
	if($user->isLoggedin()) $selector .= ", has_parent!=2"; 

	// Find pages that match the selector
	$matches = $pages->find($selector); 
	
	$count = $matches->count;
	$ajaxMaxLength = 5;

	// did we find any matches?
	if($count == 1) {
		// yes we did
		
		$content .= "<h3>$matches->count resultaat gevonden:</h3>";
		$content2 .= "<h3>$matches->count result found:</h3>";
		
		// we'll use our renderNav function (in _func.php) to render the navigation
		$content .= renderNav($matches); 
		$content2 .= renderNav($matches); 
		
		if($config->ajax) {
			$resultText = __('result found for');
			$header = "$count $resultText \"$q\"";
			$out = "<p class='header'>$count $resultText \"$q\"</p>";
			$out .= "<ul class='nav'>";
			
			foreach($matches as $m) {
					$out .= "</a></li>";
					$out .= "<li><a href='{$m->url}'>{$m->get('headline|title')}<br />";
				}
				$out .= "</ul>";
			}
		
	} elseif($count > 1) {
		
		$content = "<h3>$matches->count resultaten gevonden:</h3>";
		$content2 = "<h3>$matches->count results found:</h3>";
		
		// we'll use our renderNav function (in _func.php) to render the navigation
		$content .= renderNav($matches); 
		$content2 .= renderNav($matches); 
		
		$ajaxCount = 0;
		if($config->ajax) {
			$resultText = __('results found for');
			$header = "$count $resultText \"$q\"";
			$out = "<p class='header'>$count $resultText \"$q\"</p>";
			$out .= "<ul class='nav'>";
			
			foreach($matches as $m) {
	
				$out .= "</a></li>";
				if ($ajaxMaxLength > $ajaxCount){
					$out .= "<li><a href='{$m->url}'>{$m->get('headline|title')}<br />";
				}
				if ($ajaxMaxLength == $ajaxCount){
					$out .= '<li><a href="'.$page->path.'?q='.$q.'" class="showall">'. __('Show all results').'</a></li>';
				}
				$ajaxCount++;
			}
			$out .= "</ul>";
		}
		
	
	} else {
		// we didn't find any
		
		$content = "<h3>Helaas, niets gevonden.</h3>";
		$content2 = "<h3>Sorry, no results.</h3>";
		
		if($config->ajax) {
			$resultText = __('Sorry, no results.');
			$out = "<p>$resultText</p>";
		}
		
	}

} else {
	// no search terms provided
	
	$content = "<h3>Voer een zoekterm in.</h3>";
	$content2 = "<h3>Enter a searchword.</h3>";
	
}


