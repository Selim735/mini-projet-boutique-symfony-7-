<?php

namespace App\Entity;

use App\Repository\ShoppingCartsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ShoppingCartsRepository::class)]
class ShoppingCarts
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, users>
     */
    #[ORM\OneToMany(targetEntity: users::class, mappedBy: 'shoppingCarts')]
    private Collection $user_id;

    /**
     * @var Collection<int, CartItems>
     */
    #[ORM\OneToMany(targetEntity: CartItems::class, mappedBy: 'cart_id')]
    private Collection $product_id;

    public function __construct()
    {
        $this->user_id = new ArrayCollection();
        $this->product_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, users>
     */
    public function getUserId(): Collection
    {
        return $this->user_id;
    }

    public function addUserId(users $userId): static
    {
        if (!$this->user_id->contains($userId)) {
            $this->user_id->add($userId);
            $userId->setShoppingCarts($this);
        }

        return $this;
    }

    public function removeUserId(users $userId): static
    {
        if ($this->user_id->removeElement($userId)) {
            // set the owning side to null (unless already changed)
            if ($userId->getShoppingCarts() === $this) {
                $userId->setShoppingCarts(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CartItems>
     */
    public function getProductId(): Collection
    {
        return $this->product_id;
    }

    public function addProductId(CartItems $productId): static
    {
        if (!$this->product_id->contains($productId)) {
            $this->product_id->add($productId);
            $productId->setCartId($this);
        }

        return $this;
    }

    public function removeProductId(CartItems $productId): static
    {
        if ($this->product_id->removeElement($productId)) {
            // set the owning side to null (unless already changed)
            if ($productId->getCartId() === $this) {
                $productId->setCartId(null);
            }
        }

        return $this;
    }
}
