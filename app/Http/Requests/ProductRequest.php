<?php
//
//namespace App\Http\Requests;
//
//use App\Models\Product;
//use Illuminate\Foundation\Http\FormRequest;
//use Illuminate\Validation\Rule;
//
//class ProductRequest extends FormRequest implements ProductRequestInterface
//{
//    /**
//     * Determine if the user is authorized to make this request.
//     *
//     * @return bool
//     */
//    public function authorize(): bool
//    {
//        return true;
//    }
//
//    /**
//     * Get the validation rules that apply to the request.
//     *
//     * @return array<string, mixed>
//     */
//    public function rules(): array
//    {
//        return [
//
//            'category_id' => ['required', 'integer', 'exists:categories,id'],
//            'name'        => ['required', 'string', 'min:4', 'max:255'],
//            'code'        => ['required', 'integer', 'exists:statuses,id'],
//            'description' => ['nullable', 'string', 'min:3'],
//            'image'       => ['nullable', 'file', 'max:1024'],
//            'price'       => ['required', 'integer', 'min:0'],
//        ];
//    }
//
//    /**
//     * Get the error messages for the defined validation rules.
//     *
//     * @return array
//     */
//    public function messages(): array
//    {
//        return [
//            'name.required' => 'Privalomas produkto pavadinimas',
//            'name.string'   => 'Pavadinima turi sudaryti lotyniški simboliai',
//            'name.min'      => 'Minimalus pavadinimo ilgis privalo būti :min simboliai',
//            'name.max'      => 'Maximalus pavadinimo ilgis privalo būti :max simboliai',
//            // ....
//        ];
//    }
//}
