<?php

namespace Tupi\SecurityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Setting
 *
 * @ORM\Table(name="security_setting")
 * @ORM\Entity(repositoryClass="Tupi\SecurityBundle\Entity\SettingRepository")
 */
class Setting
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=200)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=1024)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="keywords", type="string", length=1024)
     */
    private $metaKeywords;

    /**
     * @var text
     *
     * @ORM\Column(name="ga", type="text", nullable=true)
     */
    private $ga;
    
    /**
     * @var string
     *
     * @ORM\Column(name="fb_description", type="string", length=1024, nullable=true)
     */
    private $fbDescription;
    
    /**
     * @var string
     *
     * @ORM\Column(name="fb_link", type="string", length=1024, nullable=true)
     */
    private $fbLink;
    
    /**
     * @var string
     *
     * @ORM\Column(name="fb_title", type="string", length=1024, nullable=true)
     */
    private $fbTitle;
    
    /**
     * @var string
     *
     * @ORM\Column(name="fb_image", type="string", length=1024, nullable=true)
     */
    private $fbImage;
    
    /**
     * @var string
     *
     * @ORM\Column(name="fb_site_name", type="string", length=1024, nullable=true)
     */
    private $fbSiteName;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="fb_id", type="integer", nullable=true)
     */
    private $fbId;


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
     * Set id
     *
     * @param string $id
     */
    public function setId($id)
    {
    	$this->id = $id;
    
    	return $this;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Function
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
     * Get Description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     *
     * @param $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get MetaKeywords
     *
     * @return string
     */
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
    }

    /**
     * Set MetaKeywords
     *
     * @param $metaKeywords
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->metaKeywords = $metaKeywords;
        return $this;
    }

    /**
     * Get Ga
     *
     * @return string
     */
    public function getGa()
    {
        return $this->ga;
    }

    /**
     * Set Ga
     *
     * @param $ga
     */
    public function setGa($ga)
    {
        $this->ga = $ga;
        return $this;
    }

    /**
     * Get FbDescription
     *
     * @return string
     */
    public function getFbDescription()
    {
        return $this->fbDescription;
    }

    /**
     * Set FbDescription
     *
     * @param $fbDescription
     */
    public function setFbDescription($fbDescription)
    {
        $this->fbDescription = $fbDescription;
        return $this;
    }

    /**
     * Get FbLink
     *
     * @return string
     */
    public function getFbLink()
    {
        return $this->fbLink;
    }

    /**
     * Set FbLink
     *
     * @param $fbLink
     */
    public function setFbLink($fbLink)
    {
        $this->fbLink = $fbLink;
        return $this;
    }

    /**
     * Get FbTitle
     * 
     * @return string
     */
    public function getFbTitle()
    {
        return $this->fbTitle;
    }

    /**
     * Set FbTitle
     *
     * @param $fbTitle
     */
    public function setFbTitle($fbTitle)
    {
        $this->fbTitle = $fbTitle;
        return $this;
    }
    
    /**
     * Get FbImage
     *
     * @return string
     */
	public function getFbImage() 
	{
		return $this->fbImage;
	}
	
	/**
	 * Set FbImage
	 *
	 * @param $fbImage
	 */
	public function setFbImage($fbImage) 
	{
		$this->fbImage = $fbImage;
		return $this;
	}
	
	/**
	 * Get FbSiteName
	 *
	 * @return string
	 */
	public function getFbSiteName() 
	{
		return $this->fbSiteName;
	}
	
	/**
	 * Set setFbSiteName
	 *
	 * @param $fbSiteName
	 */
	public function setFbSiteName($fbSiteName)
	{
		$this->fbSiteName = $fbSiteName;
		return $this;
	}
	
	/**
	 * Get FbId
	 *
	 * @return integer
	 */
	public function getFbId()
	{
		return $this->fbId;
	}
	
	/**
	 * Set setFbId
	 *
	 * @param $fbId
	 */
	public function setFbId($fbId)
	{
		$this->fbId = $fbId;
		return $this;
	}
	
}