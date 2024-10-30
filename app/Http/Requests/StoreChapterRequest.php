<?php

namespace App\Http\Requests;

use App\Chapter;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreChapterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('chapter_create');
    }

    public function rules()
    {
        return [
            'chaptername' => [
                'string',
                'required',
            ],
            'module_id' => [
                'required',
                'integer',
            ],
            'description' => [
                'string',
                'required',
            ],
            'published' => [
                'required',
            ],
        ];
    }
}
