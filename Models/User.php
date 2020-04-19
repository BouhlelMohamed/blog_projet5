<?php

class User extends AbstractEntity
{
    private $id;
    private $lastName;
    private $firstName;
    private $email;
    private $username;
    private $mdp;
    private $role;
    private $state;
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
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setUsername(string $username)
    {
        $this->username = $username;

        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setMdp(string $mdp)
    {
        $this->mdp = $mdp;

        return $this;
    }
    
    public function getMdp()
    {
        return $this->mdp;
    }

    public function setRole(int $role)
    {
        $this->role = $role;

        return $this;
    }
    
    public function getRole(): int
    {
        return $this->role;
    }
    public function setState(int $state)
    {
        $this->state = $state;

        return $this;
    }
    
    public function getState(): int
    {
        return $this->state;
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
 
}