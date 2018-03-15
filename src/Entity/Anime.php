<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnimeRepository")
 */
class Anime
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
     * @ORM\ManyToMany(targetEntity="TypeAnime")
     */
    private $categorie;

    /**
     * @ORM\OneToMany( targetEntity="UserAnime" ,mappedBy="anime");
     */
    private $userAnime;

    /**
     * @ORM\OneToMany( targetEntity="AnimeEpisode" ,mappedBy="anime", cascade={"persist", "remove"});
     */
    private $episode;

    public function __construct ()
    {
        $this->categorie = new ArrayCollection();
        $this->episode = new ArrayCollection();
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
    public function getEpisode()
    {
        return $this->episode;
    }

    /**
     * @param mixed $episode
     */
    public function setEpisode($episode): void
    {
        $this->episode = $episode;
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
    public function getUserAnime()
    {
        return $this->userAnime;
    }

    /**
     * @param mixed $user_anime
     */
    public function setUserAnime($userAnime): void
    {
        $this->userAnime = $userAnime;
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
    }

    public  function getLastDate(){

        $last_date = [];

        foreach ($this->getEpisode() as $episode){
            array_push($last_date, $episode->sortie);
        }

        return max($last_date);
    }
    // add your own fields
}
