<?php
/**
 * Created by PhpStorm.
 * User: eguchi
 * Date: 2018/12/05
 * Time: 18:55
 */

namespace App\Repositories\User;

/**
 * User interface
 *
 * Interface UserRepository
 * @package App\Repositories\User
 */
interface UserRepository
{
    public function find(array $conditions);
    
    public function insert(array $fillables);
}