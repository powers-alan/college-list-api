<?php
namespace App\Infrastructure\Repository;
use App\Domain\Model\Product\Product;
use App\Domain\Model\Product\ProductRepositoryInterface;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;
/**
 * Class ProductRepository
 * @package App\Infrastructure\Repository
 */
final class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var ObjectRepository
     */
    private $objectRepository;
    /**
     * ProductRepository constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->objectRepository = $this->entityManager->getRepository(Product::class);
    }
    /**
     * @param int $productId
     * @return Product
     */
    public function findById(int $productId): ?Product
    {
        return $this->objectRepository->find($productId);
    }
    /**
     * @param int $productId
     * @return Product
     */
    public function findByName(string $productName): ?Product
    {
        return $this->objectRepository->find($productName);
    }
    /**
     * @return array
     */
    public function findAll(): array
    {
        return $this->objectRepository->findAll();
    }
    /**
     * @param Product $product
     */
    public function save(Product $product): void
    {
        $this->entityManager->persist($product);
        $this->entityManager->flush();
    }
    /**
     * @param Product $product
     */
    public function delete(Product $product): void
    {
        $this->entityManager->remove($product);
        $this->entityManager->flush();
    }
}