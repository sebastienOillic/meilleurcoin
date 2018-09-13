<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Ad
 *
 * @ORM\Table(name="ad")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AdRepository")
 */
class Ad
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     * 
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @Assert\Length(max="255")
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     * 
     * @Assert\NotBlank()
     * @Assert\Type("string")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     * 
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @Assert\Length(max="255")
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="zip_code", type="string", length=6)
     * 
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @Assert\Length(max="6")
     */
    private $zipCode;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     * 
     * @Assert\NotBlank()
     * @Assert\Type("float")
     */
    private $price;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime")
     */
    private $dateCreated;

    /**
     * @var Category
     * 
     * @ORM\ManyToOne(targetEntity="Category")
     * @Assert\Type("\AppBundle\Entity\Category")
     * @Assert\NotBlank()
     */
    private $category;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() : ? int
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Ad
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
    public function getTitle() : ?string
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Ad
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription() : ?string
    {
        return $this->description;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Ad
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity() : ?string
    {
        return $this->city;
    }

    /**
     * Set zipCode
     *
     * @param string $zipCode
     *
     * @return Ad
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string
     */
    public function getZipCode() : ?string
    {
        return $this->zipCode;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Ad
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice() : ? float
    {
        return $this->price;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     *
     * @return Ad
     */
    public function setDateCreated($dateCreated) : self
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime
     */
    public function getDateCreated() : ?\DateTime
    {
        return $this->dateCreated;
    }

    /**
     * Set category
     *
     * @param \DateTime $category
     *
     * @return Ad
     */
    public function setCategory($category) : self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \DateTime
     */
    public function getCategory() : ?Category
    {
        return $this->category;
    }
}

