<?php

require_once('Algoritmo.php');

abstract class AlgoritmoAbstracto implements Algoritmo
{
    /**
     * @var Problem
     */
    protected $problem;
    protected $solution;
    protected $outputFile;

    public function __construct(Problem $problem, String $outputFile)
    {
        $this->setProblem($problem);
        $this->solution = new Solution();
        $this->setOutputFile($outputFile);
    }

    /**
     * @return string
     */
    public function getOutputFile(): string
    {
        return $this->outputFile;
    }

    /**
     * @param String $outputFile
     */
    public function setOutputFile(String $outputFile): void
    {
        $this->outputFile = $outputFile;
    }

    /**
     * @return Problem
     */
    public function getProblem(): Problem
    {
        return $this->problem;
    }

    /**
     * @param Problem $problem
     */
    public function setProblem(Problem $problem): void
    {
        $this->problem = $problem;
    }

    /**
     * @return Solution
     */
    public function getSolution(): Solution
    {
        return $this->solution;
    }

    /**
     * @param Solution $solution
     */
    public function setSolution(Solution $solution): void
    {
        $this->solution = $solution;
    }

    protected function save(): void
    {
        $data = count($this->getSolution()->getLibrariesToSend());
        $data .= "\n";
        foreach ($this->getSolution()->getLibrariesToSend() as $library) {
            $data .= $library->getLibrary()->getId();
            $data .= ' ';
            $data .= count($library->getBooksToScan());
            $data.="\n";
            foreach ($library->getBooksToScan() as $book){
                $data.=$book->getId().' ';
            }
            $data.="\n";
        }
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . Problem::DIRECTORY_OUT . $this->getOutputFile(), $data);
    }
}