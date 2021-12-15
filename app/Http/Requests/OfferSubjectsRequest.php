<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferSubjectsRequest extends FormRequest
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
      'semester_id' => ['required'],
      'weekday_id' => ['required'],
      'shift_id' => ['required'],
      'professor' => ['required'],
      'classroom_id' => ['required'],
      'subject' => ['required'],
    ];
  }
}
