<?php

class Post extends AbstractEntity
{
   private $id;
   private $title;
   private $chapo;
   private $content;
   private $createdAt;
   private $updateAt;
   private $idAuthor;

   public function __construct(array $donnees = NULL)
   {
       if($donnees != NULL)
       {
           $this->hydrate($donnees);
       }
   }

   public function getId()
   {
       return $this->id;
   }
   public function setId(int $id)
   {
       $this->id = $id;

       return $this;
   }

   public function getTitle(): string
   {
       return $this->title;
   }
   public function setTitle(string $title)
   {
       $this->title = $title;

       return $this;
   }

   public function getChapo(): string
   {
       return $this->chapo;
   }
   public function setChapo(string $chapo)
   {
       $this->chapo = $chapo;

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

   public function getCreatedAt(): string
   {
       return $this->createdAt;
   }
   public function setCreatedAt(string $createdAt)
   {
       $this->createdAt = $createdAt;

       return $this;
   }

   public function getUpdateAt(): string
   {
       return $this->updateAt;
   }
   public function setUpdateAt(string $updateAt)
   {
       $this->updateAt = $updateAt;

       return $this;
   }

   public function getIdAuthor(): ?string
   {
       return $this->idAuthor;
   }
   public function setIdAuthor(?string $idAuthor)
   {
       $this->idAuthor = $idAuthor;

       return $this;
   }



}