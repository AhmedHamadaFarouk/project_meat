<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ExaminationRequest extends FormRequest
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
                        'slaughter_date' => 'required|date',
                        'Virtual_scan' => 'required|string|min:2|max:255',
                        'type' => 'required|in:acceptable,Unacceptable',
                        'number_ear' => 'required|string|min:2|max:255',
                        'notes' => 'nullable|string|min:2',
                        'quantity' => 'required|numeric|min:2',
                        'slaughterhouse' => 'required|string|min:2',
                        'product_id' => 'required|exists:products,id',
                    ];
                }
            case 'PATCH':
            case 'PUT': {
                    return [
                        'slaughter_date' => 'required|date',
                        'Virtual_scan' => 'required|string|min:2|max:255',
                        'type' => 'required|in:acceptable,Unacceptable',
                        'number_ear' => 'required|string|min:2|max:255',
                        'notes' => 'nullable|string|min:2',
                        'quantity' => 'required|numeric|min:2',
                        'slaughterhouse' => 'required|string|min:2',
                        'product_id' => 'required|exists:products,id',
                    ];
                }
            default:
                break;
        }
    }
}
