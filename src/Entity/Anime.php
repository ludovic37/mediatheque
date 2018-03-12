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
     * @ORM\ManyToOne( targetEntity="Media" ,inversedBy="anime")
     ∗ @ORM\JoinColumn(name="media_id", referencedColumnName="id")
     */
    private $media;

    /**
     * @ORM\ManyToMany(targetEntity="TypeAnime")
     */
    private $categorie;

    public function __construct ()
    {
        $this->categorie = new ArrayCollection();
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

    // add your own fields
}
