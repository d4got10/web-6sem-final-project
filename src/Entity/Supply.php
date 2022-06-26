<?php

namespace App\Entity;

use App\Repository\SupplyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SupplyRepository::class)
 */
class Supply
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="Supplies")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Product;

    /**
     * @ORM\ManyToOne(targetEntity=Vendor::class, inversedBy="Supplies")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Vendor;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $SupplyDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $SupplyAmount;

    /**
     * @ORM\Column(type="integer")
     */
    private $SupplyPrice;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduct(): ?Product
    {
        return $this->Product;
    }

    public function setProduct(?Product $Product): self
    {
        $this->Product = $Product;

        return $this;
    }

    public function getVendor(): ?Vendor
    {
        return $this->Vendor;
    }

    public function setVendor(?Vendor $Vendor): self
    {
        $this->Vendor = $Vendor;

        return $this;
    }

    public function getSupplyDate(): ?\DateTimeInterface
    {
        return $this->SupplyDate;
    }

    public function setSupplyDate(?\DateTimeInterface $SupplyDate): self
    {
        $this->SupplyDate = $SupplyDate;

        return $this;
    }

    public function getSupplyAmount(): ?int
    {
        return $this->SupplyAmount;
    }

    public function setSupplyAmount(int $SupplyAmount): self
    {
        $this->SupplyAmount = $SupplyAmount;

        return $this;
    }

    public function getSupplyPrice(): ?int
    {
        return $this->SupplyPrice;
    }

    public function setSupplyPrice(int $SupplyPrice): self
    {
        $this->SupplyPrice = $SupplyPrice;

        return $this;
    }
}
