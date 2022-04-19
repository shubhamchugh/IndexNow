<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDomainRequest extends FormRequest
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
        return [
            'domain'      => 'max:191|required|unique:domains,domain',
            'google_json' => 'required|mimes:json|max:2048',
            'bing_api'    => 'max:191|required|unique:domains,bing_api',
        ];
    }
}
