<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class bankRequest extends FormRequest
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
                        'name' => 'required|string|min:2|max:255',
                        'price' => 'required|numeric',
                        'number_bank' => 'required',
                        'notes' => 'nullable|string',
                    ];
                }
            case 'PATCH':
            case 'PUT': {
                    return [
                        'name' => 'nullable|string|max:255',
                        'price' => 'nullable|numeric',
                        'number_bank' => 'nullable',
                        'notes' => 'nullable|string',
                    ];
                }
            default:
                break;
        }
    }
}
