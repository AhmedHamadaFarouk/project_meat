<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DispensePackingMaterialsRequest extends FormRequest
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
                        'supplydate' => 'required|date',
                        'workordernumber' => 'required|string',
                        'type' => 'required|in:acceptable,unacceptable',
                        'product_id' => 'required|exists:products,id',
                        'Quantity' => 'required|numeric',
                        'codeProduct' => 'required|string',
                        'batchNumber' => 'required|string',
                        'notes' => 'nullable|string',
                    ];
                }
            case 'PATCH':
            case 'PUT': {
                    return [
                        'supplydate' => 'nullable|date',
                        'workordernumber' => 'nullable|string',
                        'type' => 'nullable|in:acceptable,unacceptable',
                        'product_id' => 'nullable|exists:products,id',
                        'Quantity' => 'nullable|numeric',
                        'codeProduct' => 'nullable|string',
                        'batchNumber' => 'nullable|string',
                        'notes' => 'nullable|string',
                    ];
                }
            default:
                break;
        }
    }
}
