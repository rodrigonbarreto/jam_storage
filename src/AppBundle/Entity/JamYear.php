<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * JamYear
 *
 * @ORM\Table(name="jam_year")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\JamYearRepository")
 * @UniqueEntity("year")
 */
class JamYear
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
     * @var int
     *
     * @ORM\Column(name="year", type="integer", unique=true)
     * @Assert\NotBlank()
     */
    private $year;

    /**
     * @ORM\OneToMany(targetEntity="JamJar", mappedBy="JamYear")
     */
    private $jamJars;



    public function __construct()
    {
        $this->jamJars = new ArrayCollection();
    }

    public function __toString()
    {
        return (string) $this->year;
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
     * Set year
     *
     * @param integer $year
     *
     * @return JamYear
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Add jamJar
     *
     * @param \AppBundle\Entity\JamJar $jamJar
     *
     * @return JamYear
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
