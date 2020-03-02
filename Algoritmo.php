<?php

require_once ('Solution.php');
require_once('SolutionLibrary.php');
/**
 * Interface Algoritmo
 */
interface Algoritmo
{

    public function __construct(Problem $problem,String $outputFile);

    public function solve();
}