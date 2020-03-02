<?php
error_reporting(E_ALL);
require('Problem.php');
require('AlgoritmoTalCual.php');
$testCase = filter_var($_GET['problem'], FILTER_SANITIZE_STRING);
$filenames = [
    'a' => 'a_example.txt',
    'b' => 'b_read_on.txt',
    'c' => 'c_incunabula.txt',
    'd' => 'd_tough_choices.txt',
    'e' => 'e_so_many_books.txt',
    'f' => 'f_libraries_of_the_world.txt'
];
$filename = $filenames[$testCase];
$problem = new Problem($filename);
//echo $problem;
$algoritmo = new AlgoritmoTalCual($problem,$filename. '.out');
$algoritmo->solve();
echo $algoritmo->getSolution();

$end = microtime(true);
$time = $end - $_SERVER['REQUEST_TIME_FLOAT'];;
echo '<br />Se ha tardado ' . number_format($time, 6) . ' segundos<br />';
echo '<br />Se ha usado ' . number_format(memory_get_usage() / 1024, 0) . ' Kb de memoria<br />';


