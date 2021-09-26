<?php

namespace App\Entity\ReportYourBug;

use App\Entity\User;
use App\Repository\ReportYourBug\ReportRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReportRepository::class)
 * @ORM\Table(name="ryb_report")
 */
class Report
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text", length=500)
     */
    private $cause;

    /**
     * @ORM\Column(type="text", length=500, nullable=true)
     */
    private $solution;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isResolved;

    /**
     * @ORM\Column(type="datetime")
     */
    private $open_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $claused_at;

    /**
     * @ORM\ManyToOne(targetEntity=Technology::class, inversedBy="reports")
     */
    private $technology;

    /**
     * @ORM\ManyToMany(targetEntity=Type::class, inversedBy="reports")
     * @ORM\JoinTable(name="ryb_report_type")
     */
    private $types;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reports")
     * @ORM\JoinColumn(nullable=true)
     */
    private $author;

    public function __construct()
    {
        $this->types = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCause(): ?string
    {
        return $this->cause;
    }

    public function setCause(string $cause): self
    {
        $this->cause = $cause;

        return $this;
    }

    public function getSolution(): ?string
    {
        return $this->solution;
    }

    public function setSolution(?string $solution): self
    {
        $this->solution = $solution;

        return $this;
    }

    public function getIsResolved(): ?bool
    {
        return $this->isResolved;
    }

    public function setIsResolved(bool $isResolved): self
    {
        $this->isResolved = $isResolved;

        return $this;
    }

    public function getOpenAt(): ?\DateTimeInterface
    {
        return $this->open_at;
    }

    public function setOpenAt(\DateTimeInterface $open_at): self
    {
        $this->open_at = $open_at;

        return $this;
    }

    public function getClausedAt(): ?\DateTimeInterface
    {
        return $this->claused_at;
    }

    public function setClausedAt(?\DateTimeInterface $claused_at): self
    {
        $this->claused_at = $claused_at;

        return $this;
    }

    public function getTechnology(): ?Technology
    {
        return $this->technology;
    }

    public function setTechnology(?Technology $technology): self
    {
        $this->technology = $technology;

        return $this;
    }

    /**
     * @return Collection|Type[]
     */
    public function getTypes(): Collection
    {
        return $this->types;
    }

    public function addType(Type $type): self
    {
        if (!$this->types->contains($type)) {
            $this->types[] = $type;
        }

        return $this;
    }

    public function removeType(Type $type): self
    {
        $this->types->removeElement($type);

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }
}
