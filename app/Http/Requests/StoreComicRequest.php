<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "title" => "required|max:255",
            "thumb" => "required",
            "description" => "required",
            "price" => "required|max:20",
            "series" => "required|max:100",
            "sale_date" => "required|date_format:Y-m-d"
        ];
    }

    public function messages(){
        
        return [
            "title.required" => "Il titolo è obbligatorio",
            "title.max" => "Il titolo può contenere al massimo 255 caratteri",

            "thumb.required" => "Il percorso dell'immagine è obbligatorio",

            "description.required" => "La descrizione è obbligatoria",

            "price.required" => "Il prezzo è obbligatorio",
            "price.max" => "Il prezzo può contenere al massimo 100 caratteri",

            "series.required" => "La serie è obbligatoria",
            "series.max" => "La serie può contenere al massimo 100 caratteri",

            "sale_date.required" => "La data di uscita è obbligatoria",
            "sale_date.date_format" => "La data inserita deve rispettare il formato AAAA-MM-GG"
        ];
    }
}
