<?php


class SolutionLibrary
{
    private $library;
    private $booksToScan = array();

    /**
     * SolutionLibrary constructor.
     * @param Library $library
     * @param array|null $booksToScan
     */
    public function __construct(Library $library, array $booksToScan = null)
    {
        $this->library = $library;
        if ($booksToScan !== null) {
            $this->booksToScan = $booksToScan;
        }
    }

    /**
     * @return mixed
     */
    public function getLibrary(): Library
    {
        return $this->library;
    }

    /**
     * @param Library $library
     */
    public function setLibrary(Library $library): void
    {
        $this->library = $library;
    }

    /**
     * @return array
     */
    public function getBooksToScan(): array
    {
        return $this->booksToScan;
    }

    /**
     * @param array $booksToScan
     */
    public function setBooksToScan(array $booksToScan): void
    {
        $this->booksToScan = $booksToScan;
    }

    public function __toString()
    {
        //TODO: Implementar 
        return ' ';
    }


}