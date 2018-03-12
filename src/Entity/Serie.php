<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SerieRepository")
 */
class Serie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ Column(type="integer")
     */
    private $episode;

    /**
     * @ORM\ Column(type="text")
     */
    private $description;

    /**
     * @ORM\ Column(type="integer")
     */
    private $duree;

    /**
     * @ORM\ Column(type="string")
     */
    private $acteur;

    /**
     * @ORM\ Column(type="date")
     */
    private $sortie;

    /**
     * @ORM\ManyToOne( targetEntity="Media" ,inversedBy="serie")
     ∗ @ORM\JoinColumn(name="media_id", referencedColumnName="id")
     */
    private $media;

    /**
     * @ORM\ManyToMany(targetEntity="TypeSerie")
     */
    private $categorie;

    public function __construct ()
    {
        $this->categorie = new ArrayCollection();
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
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * @param mixed $media
     */
    public function setMedia($media): void
    {
        $this->media = $media;
    }

    // add your own fields
}
