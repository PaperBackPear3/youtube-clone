<?php

declare(strict_types=1);

namespace App\GraphQL\Validators;

use Illuminate\Validation\Rule;
use Nuwave\Lighthouse\Validation\Validator;

final class UploadVideoValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [
            $a = 'file',
            // TODO Add your validation rules
            'file' => [
                'required',
                Rule::dimensions()->maxWidth(1920)->maxHeight(1080),
                Rule::file()->mimetypes('video/mp4', 'video/quicktime'),
                Rule::file()->maxSize(1024 * 1024 * 100), // 100 MB
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'file' => 'sei uno stronzo',
        ];
    }
}
