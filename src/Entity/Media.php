<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MediaRepository")
 */
class Media
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
    private $name;

    /**
     * @ORM\ Column(type="string")
     */
    private $img;

    /**
     * @ORM\ Column(type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany( targetEntity="UserMedia" ,mappedBy="media");
     */
    private $user_media;

    /**
     * One Media has Film.
     * @ORM\OneToOne(targetEntity="Film", mappedBy="media")
     */
    private $film;

    /**
     * @ORM\OneToMany( targetEntity="Serie" ,mappedBy="media");
     */
    private $serie;

    /**
     * @ORM\OneToMany( targetEntity="Anime" ,mappedBy="media");
     */
    private $anime;

    public function __construct ()
    {

        $this->user_media = new ArrayCollection();
        $this->serie = new ArrayCollection();
        $this->anime = new ArrayCollection();
    }










    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     */
    public function setImg($img): void
    {
        $this->img = $img;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getFilm()
    {
        return $this->film;
    }

    /**
     * @param mixed $film
     */
    public function setFilm($film): void
    {
        $this->film = $film;
    }

    // add your own fields
}
