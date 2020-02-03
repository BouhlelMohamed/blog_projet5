<?php


class Comment
{
    private $id;
    private $content;
    private $state;

    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }
    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getState()
    {
        return $this->state;
    }
    public function setState(int $state): self
    {
        $this->state = $state;

        return $this;
    }
}