	<!-- top navigation -->
	<ul class='topnav'><?php 
		// top navigation consists of homepage and its visible children
		foreach($homepage->and($homepage->children) as $item) {
			if($item->id == $page->rootParent->id) {
				echo "<li class='current'>";
			} else {
				echo "<li>";
			}
			echo "<a href='$item->url'>$item->title</a></li>";
		}

		// output an "Edit" link if this page happens to be editable by the current user
		if($page->editable()) echo "<li class='edit'><a href='$page->editUrl'>Edit</a></li>";
	?></ul>

	