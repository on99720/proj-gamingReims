<?php

function PopupMaker($p,$texti) {

    require_once "autoload.php";

    $p->appendContent(<<<HTML
        <br>
        <div class="MyPopup" id="MyPopup">
                $texti  <span onmouseover="this.style.cursor='pointer'" onclick="document.getElementById('MyPopup').style.display='none'"> X </span>
        </div>

    HTML
    );

}

//<div class="MyPopup">
//$texti <span>X</span>
//</div>

