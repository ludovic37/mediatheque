<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnimeEpisodeRepository")
 */
class AnimeEpisode
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $episode;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $duree; //en minute

    /**
     * @ORM\Column(type="date")
     */
    private $sortie;

    /**
     * @ORM\ManyToOne( targetEntity="Anime" ,inversedBy="episode")
    ∗ @ORM\JoinColumn(name="anime_id", referencedColumnName="id")
     */
    private $anime;

    /**
     * @return mixed
     */
    public function getAnime()
    {
        return $this->anime;
    }

    /**
     * @param mixed $anime
     */
    public function setAnime($anime): void
    {
        $this->anime = $anime;
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
    public function getId()
    {
        return $this->id;
    }

    // add your own fields
}
