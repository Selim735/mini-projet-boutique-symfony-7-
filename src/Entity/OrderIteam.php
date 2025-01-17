<?php

namespace App\Entity;

use App\Repository\OrderIteamRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderIteamRepository::class)]
class OrderIteam
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'orderIteams')]
    private ?orders $order_id = null;

    #[ORM\ManyToOne(inversedBy: 'orderIteams')]
    private ?products $product_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrderId(): ?orders
    {
        return $this->order_id;
    }

    public function setOrderId(?orders $order_id): static
    {
        $this->order_id = $order_id;

        return $this;
    }

    public function getProductId(): ?products
    {
        return $this->product_id;
    }

    public function setProductId(?products $product_id): static
    {
        $this->product_id = $product_id;

        return $this;
    }
}
