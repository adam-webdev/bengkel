<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
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
            'bl_file' => 'required|mimes:pdf',
            'invoice_file' => 'required|mimes:pdf',
            'packing_file' => 'required|mimes:pdf',
            'cert_of_origin_file' => 'required|mimes:pdf',
            'cert_of_origin_prefensial_file' => 'required|mimes:pdf',
            'cert_of_weight_file' => 'required|mimes:pdf',
            'insurance_file' => 'required|mimes:pdf',
            'fumigation_file' => 'required|mimes:pdf',
            'letter_of_credit_file' => 'required|mimes:pdf',
            'doc_budget_of_available_file' => 'required|mimes:pdf',
            'spi_besi_baja' => 'mimes:pdf',
            'quota_kartu_kendali' => 'mimes:pdf',
            'npik' => 'mimes:pdf',
            'surat_pengecualian_import' => 'mimes:pdf',
        ];
    }
}