<?php

namespace App\Http\Controllers;

use App\Services\Master\MasterService;

/**
 * Class MasterController
 *
 * @package App\Http\Controllers
 */
class MasterController extends Controller
{
    /** @var MasterService */
    private $masterService;
    
    /**
     * MasterController constructor.
     *
     * @param MasterService $masterService
     */
    public function __construct(MasterService $masterService)
    {
        $this->masterService = $masterService;
    }
    
    /**
     * [GET] Master
     *
     * @return mixed Array
     */
    public function index()
    {
        return $this->masterService->get();
    }
}
