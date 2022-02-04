<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class meatReceiptRequest extends FormRequest
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
                        'before_receiving' => 'required|numeric',
                        'after_receiving' => 'required|numeric',
                        'jolly' => 'required|numeric|between:1,20',
                        'start_date_slaughter' => 'required|date',
                        'end_date_slaughter' => 'required|date',
                        'name_slaughterhouse' => 'required|string|min:2',
                        'permit_number' => 'required|numeric|min:2',
                        'operative_number' => 'required|numeric|min:2',
                        'meat_temp' => 'required|numeric|min:2',
                        'type' => 'required|in:identical,Not_matching',
                        'meat_color' => 'required|in:acceptable,acceptable',
                        'meat_smell' => 'required|in:acceptable,acceptable',
                        'meat_texture' => 'required|in:acceptable,acceptable',
                        'notes' => 'required_if:type,Not_matching|nullable',
                        'photo' => 'nullable|image|mimes:jpeg,jfif,bmp,png,jpg,PNG|max:4096',
                    ];
                }
            case 'PATCH':
            case 'PUT': {
                    return [
                        'start_date_slaughter' => 'nullable|date',
                        'end_date_slaughter' => 'nullable|date',
                        'name_slaughterhouse' => 'nullable|string|min:2',
                        'permit_number' => 'nullable|numeric|min:2',
                        'operative_number' => 'nullable|numeric|min:2',
                        'meat_temp' => 'nullable|numeric|min:2',
                        'type' => 'nullable|in:identical,Not_matching',
                        'meat_color' => 'nullable|in:acceptable,acceptable',
                        'meat_smell' => 'nullable|in:acceptable,acceptable',
                        'meat_texture' => 'nullable|in:acceptable,acceptable',
                        'notes' => 'required_if:type,Not_matching|nullable',
                        'photo' => 'nullable|image|mimes:jpeg,jfif,bmp,png,jpg,PNG|max:4096',
                        'before_receiving' => 'nullable|numeric',
                        'after_receiving' => 'nullable|numeric',
                        'jolly' => 'nullable|numeric|between:1,20',
                    ];
                }
            default:
                break;
        }
    }


    public function messages()
    {
        return[
             "jolly.between" => 'لا يمكن الاستلام لان الوزن زائد الحد الطبيعي',
        ];
    }
}
