<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedRequest extends FormRequest
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

        if(count(FormRequest::file('images'))==0)
            {
                $has = 'required';
            }
        else
            {
                 $has = '';
            }
        return [

                 'text' => $has,
        ];
    }

    public function messages()
    {
        return [
            'text.required' => 'Un texto o imagen debe ser ingrasado',           

        ];
    }
}
