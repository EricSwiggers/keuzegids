<div id="menu"> 
<div id="menu-close-btn" class="btn btn-icon fa fa-chevron-left"></div>
<?php //echo renderNavTree($homepage, 3); ?> 


<?php $treeMenu = $modules->get("MarkupSimpleNavigation"); // load the module
$options = array(
    'parent_class' => 'parent',
    'current_class' => 'current',
    'has_children_class' => 'has_children',
    'levels' => true,
    'levels_prefix' => 'level-',
    'max_levels' => 3,
	'show_root' => true,
	);
echo $treeMenu->render($options); ?>


</div>