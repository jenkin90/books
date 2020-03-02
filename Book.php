<?php


class Book
{
    private $score;
    private $id;

    /**
     * @param int $id
     * @param int $score
     */
    public function __construct(int $id, int $score)
    {
        $this->setId($id);
        $this->setScore($score);
    }

    public function __toString(): string
    {
        return '(id:' . $this->getId() . '-Score:' . $this->getScore() . ')';
    }

    /**
     * @return mixed
     */
    public function getId()
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

    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * @param int $score
     */
    public function setScore(int $score): void
    {
        $this->score = $score;
    }
}