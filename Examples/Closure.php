<?php

$g = 'test';

$c = function($a, $b) use($g){
    echo $a . $b .  $g;
};

$g = 'test2';

$c('a', 'b');
