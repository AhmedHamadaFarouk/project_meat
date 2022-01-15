<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class WasteLogRequest extends FormRequest
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
                        'Quantity' => 'required|string|min:2',
                        'name_company' => 'required|string|min:2|max:255',
                        'notes' => 'nullable|string|min:2',
                        'type' => 'required|in:organic,non_organic',
                        'product_id' => 'required|exists:products,id',
                    ];
                }
            case 'PATCH':
            case 'PUT': {
                    return [
                        'Quantity' => 'required|string|min:2',
                        'name_company' => 'required|string|min:2|max:255',
                        'notes' => 'nullable|string|min:2',
                        'type' => 'required|in:organic,non_organic',
                        'product_id' => 'required|exists:products,id',
                    ];
                }
            default:
                break;
        }
    }
}
