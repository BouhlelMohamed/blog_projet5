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

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }
    
    public function getMdp(): string
    {
        return $this->mdp;
    }

    public function setRole(int $role): self
    {
        $this->role = $role;

        return $this;
    }
    
    public function getRole(): int
    {
        return $this->role;
    }
    public function setState(int $state): self
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
    public function setCreatedAt(string $createdAt): self
    {
        $this->createdAt = $createdAt;
 
        return $this;
    }
 
}