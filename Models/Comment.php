<?php


class Comment
{
    private $id;
    private $content;
    private $state;
    private $idAuthor;
    private $idPost;
    private $author;

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

    public function getIdAuthor()
    {
        return $this->idAuthor;
    }
    public function setIdAuthor(int $idAuthor): self
    {
        $this->idAuthor = $idAuthor;

        return $this;
    }

    public function getIdPost()
    {
        return $this->idPost;
    }
    public function setIdPost(int $idPost): self
    {
        $this->idPost = $idPost;

        return $this;
    }

    public function getAuthor()
    {
        return $this->author;
    }
    public function setAuthor(?string $author): self
    {
        $this->author = $author;

        return $this;
    }
}