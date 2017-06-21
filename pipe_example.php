<?php

require_once 'Pipe.php';

$pipeline = (new Pipeline([1, 2, 3]))
        ->pipe(
                function ($number) {
            return $number + 1;
        }
        )
        ->pipe(
                function ($number) {
            return $number * 10;
        }
        )
        ->pipe(
                function ($number) {
            return $number / 2;
        }
        )
        ->tap()
;



//$pipeline = (new Pipeline(['c', 'v', 'c', 'r']))
//        ->pipe('str_rot13')
//        ->pipe('mb_strtoupper')
//        ->tap()
//;

foreach ($pipeline as $item) {
    print $item . PHP_EOL;
}
//exit;