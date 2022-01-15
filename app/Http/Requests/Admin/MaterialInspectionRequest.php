<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MaterialInspectionRequest extends FormRequest
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
                        'product_id' => 'required|exists:products,id',
                        'Quantity' => 'required|numeric|min:2',
                        'codeProduct' => 'required|string|min:2',
                        'batchNumber' => 'required|string|min:2',
                        'dataProduction' => 'required|date',
                        'dataFinished' => 'required|date',
                        'type' => 'required|in:acceptable,unacceptable',
                        'photo' => 'nullable|string|min:2',
                    ];
                }
            case 'PATCH':
            case 'PUT': {
                    return [
                         'product_id' => 'nullable|exists:products,id',
                        'Quantity' => 'nullable|numeric|min:2',
                        'codeProduct' => 'nullable|string|min:2',
                        'batchNumber' => 'nullable|string|min:2',
                        'dataProduction' => 'nullable|date',
                        'dataFinished' => 'nullable|date',
                        'type' => 'nullable|in:acceptable,unacceptable',
                        'photo' => 'nullable|string|min:2',
                    ];
                }
            default:
                break;
        }
    }
}
