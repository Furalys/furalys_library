<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostRepository::class)]
class Post
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private Category $category;

    #[ORM\Column]
    private \DateTimeImmutable $addedAt;

    #[ORM\OneToMany(mappedBy: 'post', targetEntity: Illustration::class, orphanRemoval: true)]
    private Collection $illustrations;

    #[ORM\OneToMany(mappedBy: 'post', targetEntity: Video::class, orphanRemoval: true)]
    private Collection $videos;

    #[ORM\OneToMany(mappedBy: 'post', targetEntity: Illustrator::class, orphanRemoval: true)]
    private Collection $illustrators;

    #[ORM\OneToMany(mappedBy: 'post', targetEntity: Animator::class, orphanRemoval: true)]
    private Collection $animators;

    public function __construct()
    {
        $this->illustrations = new ArrayCollection();
        $this->videos = new ArrayCollection();
        $this->illustrators = new ArrayCollection();
        $this->animators = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function setCategory(Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getAddedAt(): \DateTimeImmutable
    {
        return $this->addedAt;
    }

    public function setAddedAt(\DateTimeImmutable $addedAt): self
    {
        $this->addedAt = $addedAt;

        return $this;
    }

    /**
     * @return Collection<int, Illustration>
     */
    public function getIllustrations(): Collection
    {
        return $this->illustrations;
    }

    public function addIllustration(Illustration $illustration): self
    {
        if (!$this->illustrations->contains($illustration)) {
            $this->illustrations->add($illustration);
            $illustration->setPost($this);
        }

        return $this;
    }

    public function removeIllustration(Illustration $illustration): self
    {
        if ($this->illustrations->removeElement($illustration)) {
            // set the owning side to null (unless already changed)
            if ($illustration->getPost() === $this) {
                $illustration->setPost(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Video>
     */
    public function getVideos(): Collection
    {
        return $this->videos;
    }

    public function addVideo(Video $video): self
    {
        if (!$this->videos->contains($video)) {
            $this->videos->add($video);
            $video->setPost($this);
        }

        return $this;
    }

    public function removeVideo(Video $video): self
    {
        if ($this->videos->removeElement($video)) {
            // set the owning side to null (unless already changed)
            if ($video->getPost() === $this) {
                $video->setPost(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Illustrator>
     */
    public function getIllustrators(): Collection
    {
        return $this->illustrators;
    }

    public function addIllustrator(Illustrator $illustrator): self
    {
        if (!$this->illustrators->contains($illustrator)) {
            $this->illustrators->add($illustrator);
            $illustrator->setPost($this);
        }

        return $this;
    }

    public function removeIllustrator(Illustrator $illustrator): self
    {
        if ($this->illustrators->removeElement($illustrator)) {
            // set the owning side to null (unless already changed)
            if ($illustrator->getPost() === $this) {
                $illustrator->setPost(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Animator>
     */
    public function getAnimators(): Collection
    {
        return $this->animators;
    }

    public function addAnimator(Animator $animator): self
    {
        if (!$this->animators->contains($animator)) {
            $this->animators->add($animator);
            $animator->setPost($this);
        }

        return $this;
    }

    public function removeAnimator(Animator $animator): self
    {
        if ($this->animators->removeElement($animator)) {
            // set the owning side to null (unless already changed)
            if ($animator->getPost() === $this) {
                $animator->setPost(null);
            }
        }

        return $this;
    }
}
