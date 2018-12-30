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
class UserStoreRequest extends BaseFormRequest
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
          'email' => 'required|unique:users'
        ];
    }
}