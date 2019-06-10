<?php

//require 'classes/form.php';
spl_autoload_register(function ($className) {
    $fileName = __DIR__ . '/classes/' . $className . '.php';
    require $fileName;
});

$form = new form();
$form ->add(new InputElement('first_name', 'Имя'));
$form ->add(new InputElement('last_name', 'Фамилия'));

//var_dump($form->getElements());
require 'form.tpl.php';
