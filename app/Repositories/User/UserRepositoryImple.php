<?php
/**
 * Created by PhpStorm.
 * User: eguchi
 * Date: 2018/11/25
 * Time: 17:54
 */

namespace App\Repositories\User;

use App\Models\User;

/**
 * Class UserRepositoryImpl
 *
 * @package App\Repositories\User
 */
class UserRepositoryImple implements UserRepository
{
    /**
     * 取得
     *
     * @param  array $conditions 検索条件
     * @return array
     */
    public function find(array $conditions)
    {
        $users = User::where('sub', '!=', $conditions['sub'])->offset($conditions['page'])->limit($conditions['limit']);
        return [
            'results' => $users->get()->toArray(),
            'count' => $users->count(),
            'total' => User::where('sub', '!=', $conditions['sub'])->count()
        ];
    }
    
    /**
     * 登録
     *
     * @param  array $fillables 登録可能カラム
     * @return mixed
     */
    public function insert(array $fillables)
    {
        return User::create($fillables);
    }
}