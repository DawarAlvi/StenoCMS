<?php

function get_banner($title="Steno",$caption="Minimal CMS For Bloggers") {
    $banner = '
    <div class="banner">
        <div class="strip">            
            <div class="logo"></div>
            <p class="title">'.$title.'</p>
            <div class="caption">'.$caption.'</div>
        </div>
    </div>';
    return($banner);
}

?>