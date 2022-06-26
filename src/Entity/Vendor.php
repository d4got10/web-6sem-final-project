<?php

namespace App\Entity;

use App\Repository\VendorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VendorRepository::class)
 */
class Vendor
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
    private $VendorName;

    /**
     * @ORM\ManyToOne(targetEntity=City::class, inversedBy="Vendors")
     * @ORM\JoinColumn(nullable=false)
     */
    private $City;

    /**
     * @ORM\OneToMany(targetEntity=Supply::class, mappedBy="Vendor")
     */
    private $Supplies;

    /**
     * @ORM\ManyToMany(targetEntity=Product::class, inversedBy="Vendors")
     */
    private $SupplyList;

    public function __construct()
    {
        $this->Supplies = new ArrayCollection();
        $this->SupplyList = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVendorName(): ?string
    {
        return $this->VendorName;
    }

    public function setVendorName(string $VendorName): self
    {
        $this->VendorName = $VendorName;

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->City;
    }

    public function setCity(?City $City): self
    {
        $this->City = $City;

        return $this;
    }

    /**
     * @return Collection<int, Supply>
     */
    public function getSupplies(): Collection
    {
        return $this->Supplies;
    }

    public function addSupply(Supply $supply): self
    {
        if (!$this->Supplies->contains($supply)) {
            $this->Supplies[] = $supply;
            $supply->setVendorID($this);
        }

        return $this;
    }

    public function removeSupply(Supply $supply): self
    {
        if ($this->Supplies->removeElement($supply)) {
            // set the owning side to null (unless already changed)
            if ($supply->getVendorID() === $this) {
                $supply->setVendorID(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getSupplyList(): Collection
    {
        return $this->SupplyList;
    }

    public function addSupplyList(Product $supplyList): self
    {
        if (!$this->SupplyList->contains($supplyList)) {
            $this->SupplyList[] = $supplyList;
        }

        return $this;
    }

    public function removeSupplyList(Product $supplyList): self
    {
        $this->SupplyList->removeElement($supplyList);

        return $this;
    }

    public function __toString() : string
    {
        return $this->getVendorName();
    }
}
