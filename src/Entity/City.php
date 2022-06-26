<?php

namespace App\Entity;

use App\Repository\CityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CityRepository::class)
 */
class City
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
    private $CityName;

    /**
     * @ORM\OneToMany(targetEntity=Vendor::class, mappedBy="City")
     */
    private $Vendors;

    public function __construct()
    {
        $this->Vendors = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCityName(): ?string
    {
        return $this->CityName;
    }

    public function setCityName(string $CityName): self
    {
        $this->CityName = $CityName;

        return $this;
    }

    /**
     * @return Collection<int, Vendor>
     */
    public function getVendors(): Collection
    {
        return $this->Vendors;
    }

    public function addVendor(Vendor $vendor): self
    {
        if (!$this->Vendors->contains($vendor)) {
            $this->Vendors[] = $vendor;
            $vendor->setCityID($this);
        }

        return $this;
    }

    public function removeVendor(Vendor $vendor): self
    {
        if ($this->Vendors->removeElement($vendor)) {
            // set the owning side to null (unless already changed)
            if ($vendor->getCityID() === $this) {
                $vendor->setCityID(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getCityName();
    }
}
