<?php

namespace App\Entity;

use App\Repository\OrdersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrdersRepository::class)]
class Orders
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $total_price = null;

    #[ORM\Column]
    private ?float $tax = null;

    #[ORM\Column(length: 255)]
    private ?string $shipping_cost = null;

    #[ORM\Column]
    private ?int $status = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $placed_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    /**
     * @var Collection<int, OrderIteam>
     */
    #[ORM\OneToMany(targetEntity: OrderIteam::class, mappedBy: 'order_id')]
    private Collection $orderIteams;

    /**
     * @var Collection<int, Payments>
     */
    #[ORM\OneToMany(targetEntity: Payments::class, mappedBy: 'order_id')]
    private Collection $payments;

    /**
     * @var Collection<int, OrderItems>
     */
    #[ORM\OneToMany(targetEntity: OrderItems::class, mappedBy: 'order_id')]
    private Collection $orderItems;

    public function __construct()
    {
        $this->orderIteams = new ArrayCollection();
        $this->payments = new ArrayCollection();
        $this->orderItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTotalPrice(): ?float
    {
        return $this->total_price;
    }

    public function setTotalPrice(float $total_price): static
    {
        $this->total_price = $total_price;

        return $this;
    }

    public function getTax(): ?float
    {
        return $this->tax;
    }

    public function setTax(float $tax): static
    {
        $this->tax = $tax;

        return $this;
    }

    public function getShippingCost(): ?string
    {
        return $this->shipping_cost;
    }

    public function setShippingCost(string $shipping_cost): static
    {
        $this->shipping_cost = $shipping_cost;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getPlacedAt(): ?\DateTimeImmutable
    {
        return $this->placed_at;
    }

    public function setPlacedAt(\DateTimeImmutable $placed_at): static
    {
        $this->placed_at = $placed_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @return Collection<int, OrderIteam>
     */
    public function getOrderIteams(): Collection
    {
        return $this->orderIteams;
    }

    public function addOrderIteam(OrderIteam $orderIteam): static
    {
        if (!$this->orderIteams->contains($orderIteam)) {
            $this->orderIteams->add($orderIteam);
            $orderIteam->setOrderId($this);
        }

        return $this;
    }

    public function removeOrderIteam(OrderIteam $orderIteam): static
    {
        if ($this->orderIteams->removeElement($orderIteam)) {
            // set the owning side to null (unless already changed)
            if ($orderIteam->getOrderId() === $this) {
                $orderIteam->setOrderId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Payments>
     */
    public function getPayments(): Collection
    {
        return $this->payments;
    }

    public function addPayment(Payments $payment): static
    {
        if (!$this->payments->contains($payment)) {
            $this->payments->add($payment);
            $payment->setOrderId($this);
        }

        return $this;
    }

    public function removePayment(Payments $payment): static
    {
        if ($this->payments->removeElement($payment)) {
            // set the owning side to null (unless already changed)
            if ($payment->getOrderId() === $this) {
                $payment->setOrderId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, OrderItems>
     */
    public function getOrderItems(): Collection
    {
        return $this->orderItems;
    }

    public function addOrderItem(OrderItems $orderItem): static
    {
        if (!$this->orderItems->contains($orderItem)) {
            $this->orderItems->add($orderItem);
            $orderItem->setOrderId($this);
        }

        return $this;
    }

    public function removeOrderItem(OrderItems $orderItem): static
    {
        if ($this->orderItems->removeElement($orderItem)) {
            // set the owning side to null (unless already changed)
            if ($orderItem->getOrderId() === $this) {
                $orderItem->setOrderId(null);
            }
        }

        return $this;
    }
}
