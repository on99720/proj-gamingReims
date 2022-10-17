<?php

function PopupMaker($p,$texti) {

    require_once "autoload.php";

    $p->appendContent(<<<HTML

        <div class="MyPopup">
            $texti
        </div>

    HTML
    );

}

