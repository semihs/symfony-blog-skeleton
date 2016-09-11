<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table(name="post", indexes={@ORM\Index(name="slug", columns={"slug"}), @ORM\Index(name="date_of_creation", columns={"date_of_creation"}), @ORM\Index(name="date_of_modification", columns={"date_of_modification"})})
 * @ORM\Entity
 */
class Post
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=1024, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=1024, nullable=false)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", length=65535, nullable=false)
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_of_creation", type="datetime", nullable=false)
     */
    private $dateOfCreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_of_modification", type="datetime", nullable=true)
     */
    private $dateOfModification;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Post
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Post
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set dateOfCreation
     *
     * @param \DateTime $dateOfCreation
     *
     * @return Post
     */
    public function setDateOfCreation($dateOfCreation)
    {
        $this->dateOfCreation = $dateOfCreation;

        return $this;
    }

    /**
     * Get dateOfCreation
     *
     * @return \DateTime
     */
    public function getDateOfCreation()
    {
        return $this->dateOfCreation;
    }

    /**
     * Set dateOfModification
     *
     * @param \DateTime $dateOfModification
     *
     * @return Post
     */
    public function setDateOfModification($dateOfModification)
    {
        $this->dateOfModification = $dateOfModification;

        return $this;
    }

    /**
     * Get dateOfModification
     *
     * @return \DateTime
     */
    public function getDateOfModification()
    {
        return $this->dateOfModification;
    }
}
