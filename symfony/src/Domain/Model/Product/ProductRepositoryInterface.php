<?php
namespace App\Domain\Model\Product;
/**
 * Interface ProductRepositoryInterface
 * @package App\Domain\Model\Product
 */
interface ProductRepositoryInterface
{
    /**
     * @param int $productId
     * @return Product
     */
    public function findById(int $productId): ?Product;

    /**
     * @param int $productId
     * @return Product
     */
    public function findByName(string $productName): ?Product;

    /**
     * @return array
     */
    public function findAll(): array;

    /**
     * @param Product $product
     */
    public function save(Product $product): void;

    /**
     * @param Product $product
     */
    public function delete(Product $product): void;
}