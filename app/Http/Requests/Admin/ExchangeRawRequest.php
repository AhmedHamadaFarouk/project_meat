<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ExchangeRawRequest extends FormRequest
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
                        'codeJop' => 'required|string|min:2|max:255',
                        'Quantity' => 'required|numeric|min:2',
                        'codeProduct' => 'required|string|min:2',
                        'batchNumber' => 'required|string|min:2',
                        'dataProduction' => 'required|date',
                        'dataFinished' => 'required|date',
                        'notes' => 'nullable|string|min:2',
                        'product_id' => 'required|exists:products,id',
                    ];
                }
            case 'PATCH':
            case 'PUT': {
                    return [
                        'codeJop' => 'nullable|string|min:2|max:255',
                        'Quantity' => 'nullable|numeric|min:2',
                        'codeProduct' => 'nullable|string|min:2',
                        'batchNumber' => 'nullable|string|min:2',
                        'dataProduction' => 'nullable|date',
                        'dataFinished' => 'nullable|date',
                        'notes' => 'nullable|string|min:2',
                        'product_id' => 'nullable|exists:products,id',
                    ];
                }
            default:
                break;
        }
    }
}
