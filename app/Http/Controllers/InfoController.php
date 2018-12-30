<?php

namespace App\Http\Controllers;

use App\Services\User\InfoService;

/**
 * Class UserController
 *
 * @package App\Http\Controllers
 */
class InfoController extends Controller
{
    /** @var InfoService */
    private $infoService;
    
    /**
     * UserController constructor.
     *
     * @param InfoService $infoService
     */
    public function __construct(InfoService $infoService)
    {
        $this->infoService = $infoService;
    }
    
    /**
     * [GET] Users List
     *
     * @return mixed Array
     */
    public function index()
    {
        return $this->infoService->get();
    }
}
