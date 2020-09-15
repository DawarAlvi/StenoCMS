<?php

function get_banner($title="Steno",$caption="Minimal CMS For Bloggers") {
    $banner = '
    <div class="banner">
        <div class="strip">            
            <a href="index" class="logo"></a>
            <p class="title">'.$title.'</p>
            <div class="caption">'.$caption.'</div>
        </div>
    </div>';
    return($banner);
}
	function is_current($value) {
		global $nav_current;
		if($nav_current === $value) print("current");
	}

?>