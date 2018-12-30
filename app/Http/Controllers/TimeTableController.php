<?php

namespace App\Http\Controllers;

use App\Services\TimeTable\TimeTableService;

/**
 * Class UserController
 *
 * @package App\Http\Controllers
 */
class TimeTableController extends Controller
{
    /** @var InfoService */
    private $timeTableService;
    
    /**
     * UserController constructor.
     *
     * @param TimeTableService $timeTableService
     */
    public function __construct(TimeTableService $timeTableService)
    {
        $this->timeTableService = $timeTableService;
    }
    
    /**
     * [GET] Users List
     *
     * @return mixed Array
     */
    public function index()
    {
        return $this->timeTableService->get();
    }
}
