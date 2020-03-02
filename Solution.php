<?php


class Solution
{
    private $librariesToSend = array();

    /**
     * @return array
     */
    public function getLibrariesToSend(): array
    {
        return $this->librariesToSend;
    }

    /**
     * @param array $librariesToSend
     */
    public function setLibrariesToSend(array $librariesToSend): void
    {
        $this->librariesToSend = $librariesToSend;
    }

    public function __toString()
    {
        $resultado = '';
        foreach ($this->getLibrariesToSend() as $i => $library) {
            $resultado .= "Biblioteca $i: Enviará " .
                count($library->getBooksToScan()) .
                ' libros:<br />';
            foreach ($library->getBooksToScan() as $book) {
                $resultado.= $book.'<br />';
            }
            $resultado.='<br />';
        }
        return $resultado;
    }


}