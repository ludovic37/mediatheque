<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ Column(type="string")
     */
    private $firstname;

    /**
     * @ORM\ Column(type="string")
     */
    private $lastname;

    /**
     * @ORM\ Column(type="string")
     */
    private $email;

    /**
     * @ORM\ Column(type="string")
     */
    private $password;

    /**
     * @ORM\ Column(type="string")
     */
    private $role;

    /**
     * @ORM\ Column(type="string")
     */
    private $token;

    /**
     * @ORM\OneToMany( targetEntity="UserFilm" ,mappedBy="user");
     */
    private $user_film;

    /**
     * @ORM\OneToMany( targetEntity="UserSerie" ,mappedBy="user");
     */
    private $user_serie;

    /**
     * @ORM\OneToMany( targetEntity="UserAnime" ,mappedBy="user");
     */
    private $user_anime;

    public function __construct ()
    {
        $this->user_film = new ArrayCollection();
        $this->user_serie = new ArrayCollection();
        $this->user_anime = new ArrayCollection();
    }


    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token): void
    {
        $this->token = $token;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role): void
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

}
