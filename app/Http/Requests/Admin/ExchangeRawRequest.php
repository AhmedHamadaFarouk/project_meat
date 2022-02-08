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
                        'Quantity' => 'required|numeric',
                        'codeProduct' => 'required|string',
                        'batchNumber' => 'required|string',
                        'dataProduction' => 'required|date',
                        'dataFinished' => 'required|date',
                        'notes' => 'nullable|string',
                        'product_id' => 'required|exists:products,id',
                    ];
                }
            case 'PATCH':
            case 'PUT': {
                    return [
                        'codeJop' => 'nullable|string|max:255',
                        'Quantity' => 'nullable|numeric',
                        'codeProduct' => 'nullable|string',
                        'batchNumber' => 'nullable|string',
                        'dataProduction' => 'nullable|date',
                        'dataFinished' => 'nullable|date',
                        'notes' => 'nullable|string',
                        'product_id' => 'nullable|exists:products,id',
                    ];
                }
            default:
                break;
        }
    }
}
