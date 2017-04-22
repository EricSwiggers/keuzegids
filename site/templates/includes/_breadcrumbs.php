<div class="row">

	<!-- breadcrumbs -->
	<div class='breadcrumbs'><?php 
		// breadcrumbs are the current page's parents
		foreach($page->parents() as $item) {
			echo "<span><a href='$item->url'>$item->title</a></span> "; 
		}
		// optionally output the current page as the last item
		echo "<span>$page->title</span> "; 
	?></div>

	</div>