<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable
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
     * @ORM\ Column(type="string", nullable=true)
     */
    private $token;

    /**
     * @ORM\OneToMany( targetEntity="UserFilm" ,mappedBy="user");
     */
    private $userFilm;

    /**
     * @ORM\OneToMany( targetEntity="UserSerie" ,mappedBy="user");
     */
    private $userSerie;

    /**
     * @ORM\OneToMany( targetEntity="UserAnime" ,mappedBy="user");
     */
    private $userAnime;

    public function __construct ()
    {
        $this->userFilm = new ArrayCollection();
        $this->userSerie = new ArrayCollection();
        $this->userAnime = new ArrayCollection();
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

    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->firstname,
            $this->lastname,
            $this->email,
            $this->password,
            $this->role,
        ));
    }

    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->firstname,
            $this->lastname,
            $this->email,
            $this->password,
            $this->role,
            ) = unserialize($serialized);
    }

    public function getRoles()
    {
        return array($this->role);
    }

    public function getUsername()
    {
        return $this->email;
    }

    public function eraseCredentials()
    {

    }

    public function getSalt()
    {

    }
}
