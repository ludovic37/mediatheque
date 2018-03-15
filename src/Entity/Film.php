<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FilmRepository")
 */
class Film
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
     * @ORM\ Column(type="integer")
     */
    private $duree; // en minute

    /**
     * @ORM\ Column(type="string")
     */
    private $acteur;

    /**
     * @ORM\ Column(type="date")
     */
    private $sortie;


    /**
     * @ORM\ManyToMany(targetEntity="TypeFilm")
     */
    private $categorie;

    public function __construct ()
    {
        $this->categorie = new ArrayCollection();
    }

    /**
     * @ORM\OneToMany( targetEntity="UserFilm" ,mappedBy="film");
     */
    private $userFilm;

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
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * @param mixed $duree
     */
    public function setDuree($duree): void
    {
        $this->duree = $duree;
    }

    /**
     * @return mixed
     */
    public function getActeur()
    {
        return $this->acteur;
    }

    /**
     * @param mixed $acteur
     */
    public function setActeur($acteur): void
    {
        $this->acteur = $acteur;
    }

    /**
     * @return mixed
     */
    public function getSortie()
    {
        return $this->sortie;
    }

    /**
     * @param mixed $sortie
     */
    public function setSortie($sortie): void
    {
        $this->sortie = $sortie;
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
    public function getUserFilm()
    {
        return $this->userFilm;
    }

    /**
     * @param mixed $user_film
     */
    public function setUserFilm($user_film): void
    {
        $this->userFilm = $user_film;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie): void
    {
        $this->categorie = $categorie;
    } //id_medie

    // add your own fields
}
