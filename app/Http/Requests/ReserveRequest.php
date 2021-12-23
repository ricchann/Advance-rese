<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReserveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id',
            'store_id',
            'date' => 'required',
            'time' => 'required',
            'num_of_users' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'date.required' => '日付とを入力してください。',
            'time.required' => '時間を入力してください',
            'num_of_users.required' =>'人数を入力してください。'
        ];
    }
}
