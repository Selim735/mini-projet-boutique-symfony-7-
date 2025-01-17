<?php

namespace App\Entity;

use App\Repository\WishlistItemsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WishlistItemsRepository::class)]
class WishlistItems
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'wishlistItems')]
    private ?Wishlists $wishlist_id = null;

    #[ORM\ManyToOne(inversedBy: 'wishlistItems')]
    private ?products $product_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWishlistId(): ?Wishlists
    {
        return $this->wishlist_id;
    }

    public function setWishlistId(?Wishlists $wishlist_id): static
    {
        $this->wishlist_id = $wishlist_id;

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
