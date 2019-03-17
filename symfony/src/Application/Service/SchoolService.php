<?php
namespace App\Application\Service;
use App\Domain\Model\School\School;
use App\Domain\Model\School\SchoolRepositoryInterface;
use Doctrine\ORM\EntityNotFoundException;
/**
 * Class SchoolService
 * @package App\Application\Service
 */
final class SchoolService
{
    /**
     * @var SchoolRepositoryInterface
     */
    private $schoolRepository;
    /**
     * SchoolService constructor.
     * @param SchoolRepositoryInterface $schoolRepository
     */
    public function __construct(SchoolRepositoryInterface $schoolRepository){
        $this->schoolRepository = $schoolRepository;
    }
    /**
     * @param string $schoolName
     * @return School
     * @throws EntityNotFoundException
     */
    public function getSchoolByName(string $schoolName): School
    {
        $school = $this->schoolRepository->findByName($schoolName);
        if (!$school) {
            throw new EntityNotFoundException('School with name '.$schoolName.' does not exist!');
        }
    }

    /**
     * @param int $schoolId
     * @return School
     * @throws EntityNotFoundException
     */
    public function getSchool(int $schoolId): School
    {
        $school = $this->schoolRepository->findById($schoolId);
        if (!$school) {
            throw new EntityNotFoundException('School with id '.$schoolId.' does not exist!');
        }
    }

    /**
     * @return array|null
     */
    public function getAllSchools(): ?array
    {
        return $this->schoolRepository->findAll();
    }
    /**
     * @param string $title
     * @param string $content
     * @return School
     */
    public function addSchool(string $title, string $content): School
    {
        $school = new School();
        $school->setTitle($title);
        $school->setContent($content);
        $this->schoolRepository->save($school);
        return $school;
    }
    /**
     * @param int $schoolId
     * @param string $title
     * @param string $content
     * @return School
     * @throws EntityNotFoundException
     */
    public function updateSchool(int $schoolId, string $title, string $content): School
    {
        $school = $this->schoolRepository->findById($schoolId);
        if (!$school) {
            throw new EntityNotFoundException('School with id '.$schoolId.' does not exist!');
        }
        $school->setTitle($title);
        $school->setContent($content);
        $this->schoolRepository->save($school);
        return $school;
    }
    /**
     * @param int $schoolId
     * @throws EntityNotFoundException
     */
    public function deleteSchool(int $schoolId): void
    {
        $school = $this->schoolRepository->findById($schoolId);
        if (!$school) {
            throw new EntityNotFoundException('School with id '.$schoolId.' does not exist!');
        }
        $this->schoolRepository->delete($school);
    }
}