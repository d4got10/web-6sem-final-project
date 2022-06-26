<?php

namespace App\Entity;

use App\Repository\ProductCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductCategoryRepository::class)
 */
class ProductCategory
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
    private $ProductCategoryName;

    /**
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="ProductCategory")
     */
    private $Products;

    public function __construct()
    {
        $this->Products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductCategoryName(): ?string
    {
        return $this->ProductCategoryName;
    }

    public function setProductCategoryName(string $ProductCategoryName): self
    {
        $this->ProductCategoryName = $ProductCategoryName;

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProducts(): Collection
    {
        return $this->Products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->Products->contains($product)) {
            $this->Products[] = $product;
            $product->setProductCategoryID($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->Products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getProductCategoryID() === $this) {
                $product->setProductCategoryID(null);
            }
        }

        return $this;
    }

    public function __toString() : string
    {
        return $this->getProductCategoryName();
    }
}
