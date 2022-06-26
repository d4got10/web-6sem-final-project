<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
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
    private $ProductName;

    /**
     * @ORM\ManyToOne(targetEntity=ProductCategory::class, inversedBy="Products")
     */
    private $ProductCategory;

    /**
     * @ORM\OneToMany(targetEntity=Supply::class, mappedBy="Product")
     */
    private $Supplies;

    /**
     * @ORM\ManyToMany(targetEntity=Vendor::class, mappedBy="SupplyList")
     */
    private $Vendors;

    public function __construct()
    {
        $this->Supplies = new ArrayCollection();
        $this->Vendors = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductName(): ?string
    {
        return $this->ProductName;
    }

    public function setProductName(string $ProductName): self
    {
        $this->ProductName = $ProductName;

        return $this;
    }

    public function getProductCategory(): ?ProductCategory
    {
        return $this->ProductCategory;
    }

    public function setProductCategory(?ProductCategory $ProductCategory): self
    {
        $this->ProductCategory = $ProductCategory;

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
            $supply->setProductID($this);
        }

        return $this;
    }

    public function removeSupply(Supply $supply): self
    {
        if ($this->Supplies->removeElement($supply)) {
            // set the owning side to null (unless already changed)
            if ($supply->getProductID() === $this) {
                $supply->setProductID(null);
            }
        }

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
            $vendor->addSupplyList($this);
        }

        return $this;
    }

    public function removeVendor(Vendor $vendor): self
    {
        if ($this->Vendors->removeElement($vendor)) {
            $vendor->removeSupplyList($this);
        }

        return $this;
    }

    public function __toString() : string
    {
        return $this->getProductName();
    }
}
