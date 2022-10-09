<?php
spl_autoload_register(function ($class_name) {
    if (file_exists("src/$class_name.php")) {
        include 'src/' . $class_name . '.php';
    }
});
