<?php
namespace App\Infrastructure\Http\Rest\Controller;
use App\Application\Service\SchoolService;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
/**
 * Class SchoolsController
 * @package App\Infrastructure\Http\Rest\Controller
 */
final class SchoolsController extends FOSRestController
{
    /**
     * @var SchoolService
     */
    private $schoolService;
    /**
     * SchoolsController constructor.
     * @param SchoolsService $schoolService
     */
    public function __construct(SchoolService $schoolService)
    {
        $this->schoolService = $schoolService;
    }
    /**
     * Creates an School resource
     * @Rest\Post("/school")
     * @param Request $request
     * @return View
     */
    public function postSchools(Request $request): View
    {
        $school = $this->schoolService->addSchools($request->get('title'), $request->get('content'));
        // In case our POST was a success we need to return a 201 HTTP CREATED response with the created object
        return View::create($school, Response::HTTP_CREATED);
    }
    /**
     * Retrieves an School resource
     * @Rest\Get("/schools/{schoolId}")
     * @param int $schoolId
     * @return View
     */
    public function getSchool(int $schoolId): View
    {
        $school = $this->schoolService->getSchool($schoolId);
        // In case our GET was a success we need to return a 200 HTTP OK response with the request object
        return View::create($school, Response::HTTP_OK);
    }
    /**
     * Retrieves a collection of Schools resource
     * @Rest\Get("/schools")
     * @return View
     */
    public function getSchools(): View
    {
        $schools = $this->schoolService->getAllSchools();
        // In case our GET was a success we need to return a 200 HTTP OK response with the collection of school object
        return View::create($schools, Response::HTTP_OK);
    }
    /**
     * Replaces School resource
     * @Rest\Put("/schools/{schoolId}")
     * @param int $schoolId
     * @param Request $request
     * @return View
     */
    public function putSchools(int $schoolId, Request $request): View
    {
        $school = $this->schoolService->updateSchools($schoolId, $request->get('title'), $request->get('content'));
        // In case our PUT was a success we need to return a 200 HTTP OK response with the object as a result of PUT
        return View::create($school, Response::HTTP_OK);
    }
    /**
     * Removes the School resource
     * @Rest\Delete("/schools/{schoolId}")
     * @param int $schoolId
     * @return View
     */
    public function deleteSchools(int $schoolId): View
    {
        $this->schoolService->deleteSchools($schoolId);
        // In case our DELETE was a success we need to return a 204 HTTP NO CONTENT response. The object is deleted.
        return View::create([], Response::HTTP_NO_CONTENT);
    }
}