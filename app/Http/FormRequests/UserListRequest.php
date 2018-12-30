<?php
/**
 * Created by PhpStorm.
 * User: eguchi
 * Date: 2018/12/03
 * Time: 18:56
 */

namespace App\Http\FormRequests;

/**
 * Class UserStoreRequest
 *
 * @package App\Http\FormRequests
 */
class UserListRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'sub' => 'required|unique:users',
          'page' => 'required|integer|min:0',
          'limit' => 'required|in:20,40,50'
        ];
    }
}