<?php
/**
 * Created by PhpStorm.
 * User: eguchi
 * Date: 2018/12/03
 * Time: 17:38
 */

namespace App\Services\User;

use App\Repositories\User\UserRepository;

class UserService
{
    /** @var UserRepository  */
    protected $repository;
    
    /**
     * UserService constructor.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
    
    /**
     * userList
     * @param array $conditions
     * @return mixed
     */
    public function get(array $conditions = [])
    {
        return $this->repository->find($conditions);
    }
    
    /**
     * Store User
     * @param array $fillables
     * @return mixed
     */
    public function insert(array $fillables)
    {
        return $this->repository->insert($fillables);
    }
}
