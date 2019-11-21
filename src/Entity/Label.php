<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LabelRepository")
 */
class Label
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Record", mappedBy="label", orphanRemoval=true)
     */
    private $record;

    public function __construct()
    {
        $this->record = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Record[]
     */
    public function getRecord(): Collection
    {
        return $this->record;
    }

    public function addRecord(Record $record): self
    {
        if (!$this->record->contains($record)) {
            $this->record[] = $record;
            $record->setLabel($this);
        }

        return $this;
    }

    public function removeRecord(Record $record): self
    {
        if ($this->record->contains($record)) {
            $this->record->removeElement($record);
            // set the owning side to null (unless already changed)
            if ($record->getLabel() === $this) {
                $record->setLabel(null);
            }
        }

        return $this;
    }
}
