<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SkillsRepository")
 */
class Skills
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $skillName;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SkillCategories", inversedBy="skills")
     * @ORM\JoinColumn(nullable=false)
     */
    private $SkillCategory;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSkillName(): ?string
    {
        return $this->skillName;
    }

    public function setSkillName(string $skillName): self
    {
        $this->skillName = $skillName;

        return $this;
    }

    public function getSkillCategory(): ?SkillCategories
    {
        return $this->SkillCategory;
    }

    public function setSkillCategory(?SkillCategories $SkillCategory): self
    {
        $this->SkillCategory = $SkillCategory;

        return $this;
    }
}
