<?php

    require "Training.php";
    $training = new Training();
    $training->cat = 2;
    echo "<pre>";
    var_dump($training);
    $s = serialize($training);
    var_dump($s);
    $d = unserialize($s);
    var_dump($d);
    $clone = clone $training;
    var_dump($clone);