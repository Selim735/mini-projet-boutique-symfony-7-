<?php

namespace App\Entity;

use App\Repository\CartItemsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CartItemsRepository::class)]
class CartItems
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'product_id')]
    private ?ShoppingCarts $cart_id = null;

    #[ORM\ManyToOne(inversedBy: 'cartItems')]
    private ?Products $product_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCartId(): ?ShoppingCarts
    {
        return $this->cart_id;
    }

    public function setCartId(?ShoppingCarts $cart_id): static
    {
        $this->cart_id = $cart_id;

        return $this;
    }

    public function getProductId(): ?Products
    {
        return $this->product_id;
    }

    public function setProductId(?Products $product_id): static
    {
        $this->product_id = $product_id;

        return $this;
    }
}
