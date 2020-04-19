<?php


class Comment extends AbstractEntity
{
    private $id;
    private $content;
    private $state;
    private $idAuthor;
    private $idPost;
    private $author;
    private $createdAt;


    public function __construct(array $donnees = NULL)
    {
        if($donnees != NULL)
        {
            $this->hydrate($donnees);
        }
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }
    public function setContent(string $content)
    {
        $this->content = $content;

        return $this;
    }

    public function getState()
    {
        return $this->state;
    }
    public function setState(int $state)
    {
        $this->state = $state;

        return $this;
    }

    public function getIdAuthor()
    {
        return $this->idAuthor;
    }
    public function setIdAuthor(int $idAuthor)
    {
        $this->idAuthor = $idAuthor;

        return $this;
    }

    public function getIdPost()
    {
        return $this->idPost;
    }
    public function setIdPost(int $idPost)
    {
        $this->idPost = $idPost;

        return $this;
    }

    public function getAuthor()
    {
        return $this->author;
    }
    public function setAuthor(?string $author)
    {
        $this->author = $author;

        return $this;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}