<?php
require 'Book.php';
require 'Library.php';

class Problem
{
    private const DIRECTORY_IN = '/datasets/';
    public const DIRECTORY_OUT = '/results/';

    private $books = array();
    private $libraries = array();
    private $days;
    private $booksNumber;
    private $librariesNumber;

    public function __construct(String $filename)
    {
        $this->load($filename);
    }

    private function load(String $filename): void
    {
        try {
            $dataset = file_get_contents($_SERVER['DOCUMENT_ROOT'] . self::DIRECTORY_IN .$filename);
            $this->processFile($dataset);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    private function processFile(String $dataset): void
    {
        $fileLines = explode("\n", $dataset);
        $this->processGeneralData($fileLines[0]);
        $this->processBooks($fileLines[1]);
        $this->processLibraries(array_slice($fileLines, 2));
    }

    private function processGeneralData(String $line): void
    {
        $datos = explode(' ', $line);
        if (count($datos) !== 3) {
            $mensaje = 'Los datos generales tienen un número de parametros inesperado';
            $mensaje .= 'Esperados 3, recibidos ' . count($datos);
            throw new RuntimeException ($mensaje);
        }
        [$this->booksNumber, $this->librariesNumber, $this->days] = $datos;
    }

    private function processLibraries(array $lines): void
    {
        $counter = 0;

        for ($i = 0, $iMax = count($lines) - 2; $i < $iMax; $i += 2) {
            $datos = explode(' ', $lines[$i]);
            if (count($datos) !== 3) {
                $mensaje = "El número de parametros de inicialización de la librería $counter no es adecuado";
                $mensaje .= ' Encontrados ' . count($datos) . ' esperados 3';
                throw new RuntimeException($mensaje);
            }
            $bookNumber = (int)$datos[0];
            $daysToRegister = (int)$datos[1];
            $booksPerDay = (int)$datos[2];

            $books = explode(' ', $lines [$i + 1]);
            if (count($books) !== $bookNumber) {
                var_dump(count($books));
                var_dump($bookNumber);
                $mensaje = "El número de libros encontrado la biblioteca $counter no coincide con el esperado. ";
                $mensaje .= 'Encontrados ' . count($books) . " Esperados $bookNumber";
                throw new RuntimeException($mensaje);
            }
            $this->libraries[$counter] = new Library($counter, (int)$daysToRegister, (int)$booksPerDay);
            foreach ($books as $book) {
                if (array_key_exists($book, $this->getBooks())) {
                    $this->libraries[$counter]->addBook($this->getBooks()[$book]);
                } else {
                    $mensaje = "El libro $book no está en la relación de libros del sistema";
                    throw new RuntimeException($mensaje);
                }
            }
            $counter++;
        }
    }

    private function processBooks(String $line): void
    {
        $books = explode(' ', $line);
        for ($i = 0, $iMax = count($books); $i < $iMax; $i++) {
            $this->books[$i] = new Book($i, $books[$i]);
        }
        if (count($this->books) != $this->getBooksNumber()) {
            throw new RuntimeException('El número de libros encontrados es distinto del esperado');
        }
    }

    /**
     * @return mixed
     */
    public function getBooksNumber()
    {
        return $this->booksNumber;
    }

    /**
     * @param mixed $booksNumber
     */
    public function setBooksNumber($booksNumber): void
    {
        $this->booksNumber = $booksNumber;
    }

    /**
     * @return array
     */
    public function getBooks(): array
    {
        return $this->books;
    }

    /**
     * @param array $books
     */
    public function setBooks($books): void
    {
        $this->books = $books;
    }

    /**
     * @return array
     */
    public function getLibraries(): array
    {
        return $this->libraries;
    }

    /**
     * @param array $libraries
     */
    public function setLibraries($libraries): void
    {
        $this->libraries = $libraries;
    }

    public function __toString()
    {
        $result[] = '<br />El problema consta de ' . $this->getBooksNumber() .
            ' libros en ' . $this->getLibrariesNumber() .
            ' bibliotecas y hay ' . $this->getDays() .
            ' días para realizar el proyecto';
        $result[] = '<br />----------------- Libros en el sistema';
        foreach ($this->books as $idBook => $book) {
            $result[] = "<br />Libro $idBook " . $book;
        }
        foreach ($this->libraries as $idLibrary => $library) {
            $result[] = "<br /> -- Biblioteca $idLibrary: $library";
        }
        return implode($result);
    }

    /**
     * @return mixed
     */
    public function getLibrariesNumber()
    {
        return $this->librariesNumber;
    }

    /**
     * @param mixed $librariesNumber
     */
    public function setLibrariesNumber($librariesNumber): void
    {
        $this->librariesNumber = $librariesNumber;
    }

    /**
     * @return integer
     */
    public function getDays(): int
    {
        return $this->days;
    }

    /**
     * @param mixed $days
     */
    public function setDays($days): void
    {
        $this->days = $days;
    }
}