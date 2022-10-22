<?php

function EffectNeige($p) {

    require_once "autoload.php";


    $p->appendCssUrl("css/EffetDeNeige.css");
    $p->appendContent(<<<HTML

    <div class="illustration">
        <div class="i-large">
        <div class="i-small">
        <div class="i-medium">
        

    HTML
    );

}

