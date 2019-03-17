<?php
namespace App\Domain\Model\School;
/**
 * Interface SchoolRepositoryInterface
 * @package App\Domain\Model\School
 */
interface SchoolRepositoryInterface
{
    /**
     * @param int $schoolId
     * @return School
     */
    public function findById(int $schoolId): ?School;

    /**
     * @param string $schoolName
     * @return School
     */
    public function findByName(string $schoolName): ?School;
    
    /**
     * @return array
     */
    public function findAll(): array;

    /**
     * @param School $school
     */
    public function save(School $school): void;

    /**
     * @param School $school
     */
    public function delete(School $school): void;
}