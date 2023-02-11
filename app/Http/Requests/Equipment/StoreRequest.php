<?php

namespace App\Http\Requests\Equipment;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'equipment_type_id'=>'required|integer',
            'serial_number'=>Rule::unique('App\Models\Equipment')->where(
                fn ($query) => $query->where('equipment_type_id', $this->equipment_type_id)),
                'note' => 'string',
        ];
    }
}
