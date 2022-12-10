<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFile extends FormRequest
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
            'bl_file' => 'mimes:pdf',
            'invoice_file' => 'mimes:pdf',
            'packing_file' => 'mimes:pdf',
            'cert_of_origin_file' => 'mimes:pdf',
            'cert_of_origin_prefensial_file' => 'mimes:pdf',
            'cert_of_weight_file' => 'mimes:pdf',
            'insurance_file' => 'mimes:pdf',
            'fumigation_file' => 'mimes:pdf',
            'letter_of_credit_file' => 'mimes:pdf',
            'doc_budget_of_available_file' => 'mimes:pdf',
            'spi_besi_baja' => 'mimes:pdf',
            'quota_kartu_kendali' => 'mimes:pdf',
            'npik' => 'mimes:pdf',
            'surat_pengecualian_import' => 'mimes:pdf',
        ];
    }
}