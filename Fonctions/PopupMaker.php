<?php

function PopupMaker($p,$texti) {

    require_once "autoload.php";

    $p->appendContent(<<<HTML
        <br>
        <div class="MyPopup" id="MyPopup">
                <div class="c1">
                    $texti 
                </div> 
                <div class="croix">
                    <span onmouseover="this.style.cursor='pointer'" onclick="document.getElementById('MyPopup').style.display='none'"> X </span>
                </div>
        </div>

    HTML
    );

}

//<div class="MyPopup">
//$texti <span>X</span>
//</div>

