<?php
require_once('AlgoritmoAbstracto.php');

class AlgoritmoTalCual extends AlgoritmoAbstracto
{

    public function solve()
    {
        $libraries = array();
        foreach ($this->getProblem()->getLibraries() as $library) {
            $libraries[] = new SolutionLibrary($library, $library->getBooks());
        }
        $this->getSolution()->setLibrariesToSend($libraries);

        $this->save();
    }

}