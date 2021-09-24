<?php

namespace App\Entity\Portfolio;

use App\Repository\Portfolio\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 * @ORM\Table(name="portfolio_projects")
 */
class Project
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
     * @ORM\Column(type="string", length=255)
     */
    private $version;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $githubRepository;

    /**
     * @ORM\Column(type="text", length=500)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $client_name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $start_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $end_date;

    /**
     * @ORM\ManyToOne(targetEntity=State::class, inversedBy="projects")
     * @ORM\JoinColumn(nullable=false)
     */
    private $State;

    /**
     * @ORM\ManyToMany(targetEntity=Skill::class, inversedBy="projects")
     * @ORM\JoinTable(name="portfolio_project_skill")
     */
    private $Skills;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $secondary_picture;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class, inversedBy="projects")
     * @ORM\JoinTable(name="portfolio_project_category")
     */
    private $categories;

    /**
     * @ORM\ManyToMany(targetEntity=Feature::class, inversedBy="projects")
     * @ORM\JoinTable(name="portfolio_project_feature")
     * @ORM\JoinTable
     */
    private $features;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPublished;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $projectLink;

    public function __construct()
    {
        $this->Skills = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->features = new ArrayCollection();
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

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getGithubRepository(): ?string
    {
        return $this->githubRepository;
    }

    public function setGithubRepository(?string $githubRepository): self
    {
        $this->githubRepository = $githubRepository;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getClientName(): ?string
    {
        return $this->client_name;
    }

    public function setClientName(?string $client_name): self
    {
        $this->client_name = $client_name;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    public function setStartDate(\DateTimeInterface $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->end_date;
    }

    public function setEndDate(?\DateTimeInterface $end_date): self
    {
        $this->end_date = $end_date;

        return $this;
    }

    public function getState(): ?State
    {
        return $this->State;
    }

    public function setState(?State $State): self
    {
        $this->State = $State;

        return $this;
    }

    /**
     * @return Collection|Skill[]
     */
    public function getSkills(): Collection
    {
        return $this->Skills;
    }

    public function addSkill(Skill $skill): self
    {
        if (!$this->Skills->contains($skill)) {
            $this->Skills[] = $skill;
        }

        return $this;
    }

    public function removeSkill(Skill $skill): self
    {
        $this->Skills->removeElement($skill);

        return $this;
    }

    public function showSkills() {

        $string = null;
        $separator = " / ";

        foreach ($this->Skills as $skill) {
            $string .= $skill->getTitle();
            $string .= $separator;
        }

        return rtrim($string, $separator);
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getSecondaryPicture(): ?string
    {
        return $this->secondary_picture;
    }

    public function setSecondaryPicture(?string $secondary_picture): self
    {
        $this->secondary_picture = $secondary_picture;

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        $this->categories->removeElement($category);

        return $this;
    }

    public function showCategories() {
        $string = null;
        $separator = " / ";

        foreach ($this->categories as $category) {
            $string .= $category->getTitle();
            $string .= $separator;
        }

        return rtrim($string, $separator);
    }

    /**
     * @return Collection|Feature[]
     */
    public function getFeatures(): Collection
    {
        return $this->features;
    }

    public function addFeature(Feature $feature): self
    {
        if (!$this->features->contains($feature)) {
            $this->features[] = $feature;
        }

        return $this;
    }

    public function removeFeature(Feature $feature): self
    {
        $this->features->removeElement($feature);

        return $this;
    }

    public function getIsPublished(): ?bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(bool $isPublished): self
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    public function getProjectLink(): ?string
    {
        return $this->projectLink;
    }

    public function setProjectLink(?string $projectLink): self
    {
        $this->projectLink = $projectLink;

        return $this;
    }
}
