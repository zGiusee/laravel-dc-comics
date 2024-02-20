<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComicRequest extends FormRequest
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
            'title' => 'required|max:50|min:5',
            'description' => 'required|max:700|min:5',
            'thumb' => 'required|min:20',
            'price' => 'required|max:20',
            'series' => 'required|max:50',
            'sale_date' => 'required',
            'type' => 'required|max:30',
            'artists' => 'required',
            'writers' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio!',
            'title.max' => 'Il titolo deve essere al massimo di 50 caratteri!',
            'title.min' => 'Il titolo deve essere lungo almeno 5 caratteri!',
            'description.required' => 'La descrizione è obbligatoria!',
            'description.max' => 'La descrizione deve essere al massimo di 400 caratteri!',
            'description.min' => 'La descrizione deve essere lunga almeno 5 caratteri!',
            'thumb.required' => 'L\'immagine è obbligatoria!',
            'thumb.min' => 'Il link dell\'immagine deve essere lunga almeno 20 caratteri!',
            'price.required' => 'Il prezzo è obbligatorio!',
            'price.max' => 'Il prezzo deve essere al massimo di 20 caratteri!',
            'series.required' => 'Il nome della serie è obbligatorio!',
            'series.max' => 'Il nome della serie deve essere al massimo di 50 caratteri!',
            'sale_date.required' => 'La data è obbligatoria!',
            'type.required' => 'La tipologia del fumetto è obbligatoria!',
            'type.max' => 'La tipologia del fumetto deve essere al massimo di 30 caratteri!',
            'artists.required' => 'I nomi degli artisti sono obbligatori!',
            'writers.required' => 'I nomi degli scrittori sono obbligatori!',
        ];
    }
}
