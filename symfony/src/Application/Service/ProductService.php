<?php
namespace App\Application\Service;
use App\Domain\Model\Product\Product;
use App\Domain\Model\Product\ProductRepositoryInterface;
use Doctrine\ORM\EntityNotFoundException;
/**
 * Class ProductService
 * @package App\Application\Service
 */
final class ProductService
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;
    /**
     * ProductService constructor.
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository){
        $this->productRepository = $productRepository;
    }
    /**
     * @param string $productName
     * @return Product
     * @throws EntityNotFoundException
     */
    public function getProductByName(string $productName): Product
    {
        $product = $this->productRepository->findByName($productName);
        if (!$product) {
            throw new EntityNotFoundException('Product with name '.$productName.' does not exist!');
        }
    }

    /**
     * @param int $productId
     * @return Product
     * @throws EntityNotFoundException
     */
    public function getProduct(int $productId): Product
    {
        $product = $this->productRepository->findById($productId);
        if (!$product) {
            throw new EntityNotFoundException('Product with id '.$productId.' does not exist!');
        }
    }

    /**
     * @return array|null
     */
    public function getAllProducts(): ?array
    {
        return $this->productRepository->findAll();
    }
    /**
     * @param string $title
     * @param string $content
     * @return Product
     */
    public function addProduct(string $title, string $content): Product
    {
        $product = new Product();
        $product->setTitle($title);
        $product->setContent($content);
        $this->productRepository->save($product);
        return $product;
    }
    /**
     * @param int $productId
     * @param string $title
     * @param string $content
     * @return Product
     * @throws EntityNotFoundException
     */
    public function updateProduct(int $productId, string $title, string $content): Product
    {
        $product = $this->productRepository->findById($productId);
        if (!$product) {
            throw new EntityNotFoundException('Product with id '.$productId.' does not exist!');
        }
        $product->setTitle($title);
        $product->setContent($content);
        $this->productRepository->save($product);
        return $product;
    }
    /**
     * @param int $productId
     * @throws EntityNotFoundException
     */
    public function deleteProduct(int $productId): void
    {
        $product = $this->productRepository->findById($productId);
        if (!$product) {
            throw new EntityNotFoundException('Product with id '.$productId.' does not exist!');
        }
        $this->productRepository->delete($product);
    }
}