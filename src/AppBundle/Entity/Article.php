<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use JsonSerializable;

/**
 * Article
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Article implements JsonSerializable
{
    /**
     * @var integer
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=1023)
     */
    private $title;

    /**
     * @var integer
     * @ORM\Column(type="bigint")
     */
    private $pageId;

    /**
     * @var string
     * @ORM\Column(type="string", length=31)
     */
    private $language;
    
    /**
     * @Gedmo\SortablePosition
     * @ORM\Column(type="integer")
     */
    private $position;
    
    /**
     * @var Museum
     * @ORM\ManyToOne(targetEntity="Museum", inversedBy="articles")
     */
    private $museum;
    
    /**
     * @var string
     * @ORM\Column(type="string", length=1023, nullable=true)
     */
    private $imageTitle;
    
    /**
     * @var string
     * @ORM\Column(type="string", length=2047, nullable=true)
     */
    private $smallImage;
    
    /**
     * @var string
     * @ORM\Column(type="string", length=2047, nullable=true)
     */
    private $largeImage;
    
    /**
     * @var string
     * @ORM\Column(type="text")
     */
    private $plainContent;
    
    /* ============== Utility ============== */
    
    public function __construct() {
    }
    
    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'pageId' => $this->pageId,
            'language' => $this->language,
            'position' => $this->position,
            'imageTitle' => $this->imageTitle,
            'smallImage' => $this->smallImage,
            'largeImage' => $this->largeImage,
        ];
    }
    
    /* ============== Accessors ============== */

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
     * @return Article
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
     * Set pageId
     *
     * @param integer $pageId
     * @return Article
     */
    public function setPageId($pageId)
    {
        $this->pageId = $pageId;

        return $this;
    }

    /**
     * Get pageId
     *
     * @return integer 
     */
    public function getPageId()
    {
        return $this->pageId;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return Article
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Article
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set museum
     *
     * @param \AppBundle\Entity\Museum $museum
     * @return Article
     */
    public function setMuseum(\AppBundle\Entity\Museum $museum = null)
    {
        $this->museum = $museum;

        return $this;
    }

    /**
     * Get museum
     *
     * @return \AppBundle\Entity\Museum 
     */
    public function getMuseum()
    {
        return $this->museum;
    }

    /**
     * Set smallImage
     *
     * @param string $smallImage
     * @return Article
     */
    public function setSmallImage($smallImage)
    {
        $this->smallImage = $smallImage;

        return $this;
    }

    /**
     * Get smallImage
     *
     * @return string 
     */
    public function getSmallImage()
    {
        return $this->smallImage;
    }

    /**
     * Set largeImage
     *
     * @param string $largeImage
     * @return Article
     */
    public function setLargeImage($largeImage)
    {
        $this->largeImage = $largeImage;

        return $this;
    }

    /**
     * Get largeImage
     *
     * @return string 
     */
    public function getLargeImage()
    {
        return $this->largeImage;
    }

    /**
     * Set plainContent
     *
     * @param string $plainContent
     * @return Article
     */
    public function setPlainContent($plainContent)
    {
        $this->plainContent = $plainContent;

        return $this;
    }

    /**
     * Get plainContent
     *
     * @return string 
     */
    public function getPlainContent()
    {
        return $this->plainContent;
    }

    /**
     * Set imageTitle
     *
     * @param string $imageTitle
     * @return Article
     */
    public function setImageTitle($imageTitle)
    {
        $this->imageTitle = $imageTitle;

        return $this;
    }

    /**
     * Get imageTitle
     *
     * @return string 
     */
    public function getImageTitle()
    {
        return $this->imageTitle;
    }
}
