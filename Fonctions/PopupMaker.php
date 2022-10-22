<?php

function PopupMaker($p,$texti) {

    require_once "autoload.php";

    $p->appendContent(<<<HTML
        <br>
        <div class="MyPopup">
            $texti
        </div>

    HTML
    );

}

