<?php


/**
 * Class Library
 */
class Library
{
    /**
     * @var
     */
    private $days_to_register;
    /**
     * @var
     */
    private $books_can_scan;
    /**
     * @var
     */
    private $id;
    /**
     * @var array
     */
    private $books = array();

    /**
     * Library constructor.
     * @param int $id
     * @param int $days_to_register
     * @param int $books_can_scan
     */
    public function __construct(int $id, int $days_to_register, int $books_can_scan)
    {
        $this->setId($id);
        $this->setBooksCanScan($books_can_scan);
        $this->setDaysToRegister($days_to_register);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getDaysToRegister(): int
    {
        return $this->days_to_register;
    }

    /**
     * @param int $days_to_register
     */
    public function setDaysToRegister(int $days_to_register): void
    {
        $this->days_to_register = $days_to_register;
    }

    /**
     * @return integer
     */
    public function getBooksCanScan(): int
    {
        return $this->books_can_scan;
    }

    /**
     * @param integer $books_can_scan
     */
    public function setBooksCanScan(int $books_can_scan): void
    {
        $this->books_can_scan = $books_can_scan;
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
    public function setBooks(array $books): void
    {
        $this->books = $books;
    }

    /**
     * @param Book $book
     */
    public function addBook(Book $book): void
    {
        $this->books[] = $book;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $result = '(id:' . $this->getId() . ' - Register ' .
            $this->getDaysToRegister() . ' days - ' .
            $this->getBooksCanScan() . ' slots)' .
            '<br />';
        foreach ($this->getBooks() as $book) {
            $result .= $book . '<br />';
        }
        return $result;
    }

}