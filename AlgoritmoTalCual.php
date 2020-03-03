<?php
require_once('AlgoritmoAbstracto.php');

class AlgoritmoTalCual extends AlgoritmoAbstracto
{

    public function solve():void
    {
        $this->prepareProblem();
        $this->generateSolution();
    }

    public function prepareProblem():void{

    }

    public function generateSolution(): void
    {
        $libraries = array();
        foreach ($this->getProblem()->getLibraries() as $library) {
            $libraries[] = new SolutionLibrary($library, $library->getBooks());
        }
        $this->getSolution()->setLibrariesToSend($libraries);

        $this->save();
    }

}