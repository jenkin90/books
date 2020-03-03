<?php


class AlgoritmoOrdenado extends AlgoritmoTalCual
{

    private function sortLibraries(): void
    {
        $libraries = $this->getProblem()->getLibraries();
        usort($libraries, array($this, 'libraryComparator'));
        $this->getProblem()->setLibraries($libraries);
    }

    public function prepareProblem(): void
    {
        $this->sortLibraries();
        $this->sortBooks();
    }

    private function libraryComparator(Library $left, Library $right): int
    {
        $leftValue = ($this->getProblem()->getDays() - $left->getDaysToRegister()) * $left->getBooksCanScan();

        $rightValue = ($this->getProblem()->getDays() - $right->getDaysToRegister()) * $right->getBooksCanScan();
        return -($leftValue - $rightValue);
    }

    private function bookComparator(Book $left, Book $right): int
    {
        return -($left->getScore() - $right->getScore());
    }

    private function sortBooks(): void
    {
        foreach ($this->getProblem()->getLibraries() as $library) {
            $listOfBooks = $library->getBooks();
            usort($listOfBooks, array($this, 'bookComparator'));
            $library->setBooks($listOfBooks);
        }

    }
}