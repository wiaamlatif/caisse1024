<?php

$tab= array(
            "A"=>"Lundi",
            "B"=>"Mardi",
            "C"=>"Mercredi",
            "D"=>"Jeudi"
            );

var_dump($tab);

unset($tab["C"]);

echo "<br>";

var_dump($tab);

echo "<br>";

echo $_SERVER['PHP_SELF'];

