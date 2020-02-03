<?php


class Post
{
   private $id;
   private $title;
   private $chapo;
   private $content;
   private $createdAt;
   private $updateAt;
   private $idAuthor;

   public function getId(): int
   {
       return $this->id;
   }
   public function setId(int $id): self
   {
       $this->id = $id;

       return $this;
   }

   public function getTitle(): string
   {
       return $this->title;
   }
   public function setTitle(string $title): self
   {
       $this->title = $title;

       return $this;
   }

   public function getChapo(): string
   {
       return $this->chapo;
   }
   public function setChapo(string $chapo): self
   {
       $this->chapo = $chapo;

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

   public function getCreatedAt(): string
   {
       return $this->createdAt;
   }
   public function setCreatedAt(string $createdAt): self
   {
       $this->createdAt = $createdAt;

       return $this;
   }

   public function getUpdateAt(): string
   {
       return $this->updateAt;
   }
   public function setUpdateAt(string $updateAt): self
   {
       $this->updateAt = $updateAt;

       return $this;
   }

   public function getIdAuthor(): string
   {
       return $this->idAuthor;
   }
   public function setIdAuthor(string $idAuthor): self
   {
       $this->idAuthor = $idAuthor;

       return $this;
   }



}