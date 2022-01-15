<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\PseudoTypes\True_;

class branchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                    return [];
                }
            case 'POST': {
                    return [
                        'name' => 'required|min:2|max:255|string',
                        'address' => 'required|min:2|max:255|string',


                    ];
                }
            case 'PATCH':
            case 'PUT': {
                    return [
                        'name' => 'nullable|min:2|max:255|string',
                        'address' => 'nullable|min:2|max:255|string',
                        
                    ];
                }
            default:
                break;
        }
    }
}
