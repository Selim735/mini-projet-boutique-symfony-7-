<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductsRepository::class)]
class Products
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column]
    private ?float $sku = null;

    #[ORM\Column]
    private ?float $stock_quantity = null;

    #[ORM\Column(length: 255)]
    private ?string $image_url = null;

    /**
     * @var Collection<int, CartItems>
     */
    #[ORM\OneToMany(targetEntity: CartItems::class, mappedBy: 'product_id')]
    private Collection $cartItems;

    /**
     * @var Collection<int, categories>
     */
    #[ORM\ManyToMany(targetEntity: categories::class, inversedBy: 'products')]
    private Collection $category_id;

    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?users $seller_id = null;

    /**
     * @var Collection<int, WishlistItems>
     */
    #[ORM\OneToMany(targetEntity: WishlistItems::class, mappedBy: 'product_id')]
    private Collection $wishlistItems;

    /**
     * @var Collection<int, OrderIteam>
     */
    #[ORM\OneToMany(targetEntity: OrderIteam::class, mappedBy: 'product_id')]
    private Collection $orderIteams;

    /**
     * @var Collection<int, Reviews>
     */
    #[ORM\OneToMany(targetEntity: Reviews::class, mappedBy: 'product_id')]
    private Collection $reviews;

    public function __construct()
    {
        $this->cartItems = new ArrayCollection();
        $this->category_id = new ArrayCollection();
        $this->wishlistItems = new ArrayCollection();
        $this->orderIteams = new ArrayCollection();
        $this->reviews = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getSku(): ?float
    {
        return $this->sku;
    }

    public function setSku(float $sku): static
    {
        $this->sku = $sku;

        return $this;
    }

    public function getStockQuantity(): ?float
    {
        return $this->stock_quantity;
    }

    public function setStockQuantity(float $stock_quantity): static
    {
        $this->stock_quantity = $stock_quantity;

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->image_url;
    }

    public function setImageUrl(string $image_url): static
    {
        $this->image_url = $image_url;

        return $this;
    }

    /**
     * @return Collection<int, CartItems>
     */
    public function getCartItems(): Collection
    {
        return $this->cartItems;
    }

    public function addCartItem(CartItems $cartItem): static
    {
        if (!$this->cartItems->contains($cartItem)) {
            $this->cartItems->add($cartItem);
            $cartItem->setProductId($this);
        }

        return $this;
    }

    public function removeCartItem(CartItems $cartItem): static
    {
        if ($this->cartItems->removeElement($cartItem)) {
            // set the owning side to null (unless already changed)
            if ($cartItem->getProductId() === $this) {
                $cartItem->setProductId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, categories>
     */
    public function getCategoryId(): Collection
    {
        return $this->category_id;
    }

    public function addCategoryId(categories $categoryId): static
    {
        if (!$this->category_id->contains($categoryId)) {
            $this->category_id->add($categoryId);
        }

        return $this;
    }

    public function removeCategoryId(categories $categoryId): static
    {
        $this->category_id->removeElement($categoryId);

        return $this;
    }

    public function getSellerId(): ?users
    {
        return $this->seller_id;
    }

    public function setSellerId(?users $seller_id): static
    {
        $this->seller_id = $seller_id;

        return $this;
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
            $wishlistItem->setProductId($this);
        }

        return $this;
    }

    public function removeWishlistItem(WishlistItems $wishlistItem): static
    {
        if ($this->wishlistItems->removeElement($wishlistItem)) {
            // set the owning side to null (unless already changed)
            if ($wishlistItem->getProductId() === $this) {
                $wishlistItem->setProductId(null);
            }
        }

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
            $orderIteam->setProductId($this);
        }

        return $this;
    }

    public function removeOrderIteam(OrderIteam $orderIteam): static
    {
        if ($this->orderIteams->removeElement($orderIteam)) {
            // set the owning side to null (unless already changed)
            if ($orderIteam->getProductId() === $this) {
                $orderIteam->setProductId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Reviews>
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Reviews $review): static
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews->add($review);
            $review->setProductId($this);
        }

        return $this;
    }

    public function removeReview(Reviews $review): static
    {
        if ($this->reviews->removeElement($review)) {
            // set the owning side to null (unless already changed)
            if ($review->getProductId() === $this) {
                $review->setProductId(null);
            }
        }

        return $this;
    }
}
