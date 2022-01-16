<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                        'quantity' => 'required|numeric|min:2',
                        'order_number' => 'required|string|min:2',
                        'date_supply' => 'required|date',
                        'type' => 'required|in:identical,Not_matching',
                        'code' => 'required|string|min:2',
                        'notes' => 'nullable|string|min:2',
                    ];
                }
            case 'PATCH':
            case 'PUT': {
                    return [
                        'name' => 'nullable|string|min:2|max:255',
                        'quantity' => 'nullable|numeric|min:2',
                        'order_number' => 'nullable|string|min:2',
                        'date_supply' => 'nullable|date',
                        'type' => 'nullable|in:identical,Not_matching',
                        'code' => 'nullable|string|min:2',
                        'notes' => 'nullable|string|min:2',
                    ];
                }
            default:
                break;
        }
    }
}
