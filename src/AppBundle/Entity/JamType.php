<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * JamType
 *
 * @ORM\Table(name="jam_type")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\JamTypeRepository")
 * @UniqueEntity("name")
 */
class JamType
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="JamJar", mappedBy="JamType")
     */
    private $jamJars;

    public function __construct()
    {
        $this->jamJars = new ArrayCollection();
    }

    public function __toString()
    {
        return (string) $this->name;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return JamType
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add jamJar
     *
     * @param \AppBundle\Entity\JamJar $jamJar
     *
     * @return JamType
     */
    public function addJamJar(\AppBundle\Entity\JamJar $jamJar)
    {
        $this->jamJars[] = $jamJar;

        return $this;
    }

    /**
     * Remove jamJar
     *
     * @param \AppBundle\Entity\JamJar $jamJar
     */
    public function removeJamJar(\AppBundle\Entity\JamJar $jamJar)
    {
        $this->jamJars->removeElement($jamJar);
    }

    /**
     * Get jamJars
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJamJars()
    {
        return $this->jamJars;
    }
}
