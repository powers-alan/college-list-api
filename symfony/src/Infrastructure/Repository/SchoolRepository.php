<?php
namespace App\Infrastructure\Repository;
use App\Domain\Model\School\School;
use App\Domain\Model\School\SchoolRepositoryInterface;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;
/**
 * Class SchoolRepository
 * @package App\Infrastructure\Repository
 */
final class SchoolRepository implements SchoolRepositoryInterface
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
     * SchoolRepository constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->objectRepository = $this->entityManager->getRepository(School::class);
    }
    /**
     * @param int $schoolId
     * @return School
     */
    public function findById(int $schoolId): ?School
    {
        return $this->objectRepository->find($schoolId);
    }
    /**
     * @param int $schoolId
     * @return School
     */
    public function findByName(string $schoolName): ?School
    {
        return $this->objectRepository->find($schoolName);
    }
    /**
     * @return array
     */
    public function findAll(): array
    {
        return $this->objectRepository->findAll();
    }
    /**
     * @param School $school
     */
    public function save(School $school): void
    {
        $this->entityManager->persist($school);
        $this->entityManager->flush();
    }
    /**
     * @param School $school
     */
    public function delete(School $school): void
    {
        $this->entityManager->remove($school);
        $this->entityManager->flush();
    }
}