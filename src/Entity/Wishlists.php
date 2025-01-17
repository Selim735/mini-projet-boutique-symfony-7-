<?php

namespace App\Entity;

use App\Repository\WishlistsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WishlistsRepository::class)]
class Wishlists
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, WishlistItems>
     */
    #[ORM\OneToMany(targetEntity: WishlistItems::class, mappedBy: 'wishlist_id')]
    private Collection $wishlistItems;

    #[ORM\ManyToOne(inversedBy: 'wishlists')]
    private ?users $user_id = null;

    public function __construct()
    {
        $this->wishlistItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, WishlistItems>
     */
    public function getWishlistItems(): Collection
    {
        return $this->wishlistItems;
    }

    public function addWishlistItem(WishlistItems $wishlistItem): static
    {
        if (!$this->wishlistItems->contains($wishlistItem)) {
            $this->wishlistItems->add($wishlistItem);
            $wishlistItem->setWishlistId($this);
        }

        return $this;
    }

    public function removeWishlistItem(WishlistItems $wishlistItem): static
    {
        if ($this->wishlistItems->removeElement($wishlistItem)) {
            // set the owning side to null (unless already changed)
            if ($wishlistItem->getWishlistId() === $this) {
                $wishlistItem->setWishlistId(null);
            }
        }

        return $this;
    }

    public function getUserId(): ?users
    {
        return $this->user_id;
    }

    public function setUserId(?users $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }
}
