<?php declare(strict_types=1);

require_once ('autoload.php');
try {
    Session::start();
} catch (SessionException $e) {
}

$title = 'C\'est la fin';

$p = new WebPage($title);

$p->appendContent(<<<HTML
<h1>Merci d'avoir participé</h1>
    <div>
        <a href="THE_VOID.php">[WIP] Go to THE VOID</a>
    </div>

HTML
);
try {
    echo $p->toHTML();
} catch (Exception $e) {
}