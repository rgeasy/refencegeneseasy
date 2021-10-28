<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'O campo <b>:attribute</b> must be accepted.',
    'active_url' => 'O campo <b>:attribute</b> não é uma URL válida.',
    'after' => 'O campo <b>:attribute</b> deve ser uma data após <b>:date</b>.',
    'after_or_equal' => 'O campo <b>:attribute</b> deve ser uma data após ou igual a <b>:date</b>.',
    'alpha' => 'O campo <b>:attribute</b> deve ter letras.',
    'alpha_dash' => 'O campo <b>:attribute</b> só deve conter letras, números, - e _.',
    'alpha_num' => 'O campo <b>:attribute</b> só deve conter letras e números.',
    'array' => 'O campo <b>:attribute</b> deve ser um array.',
    'before' => 'O campo <b>:attribute</b> deve ser uma data antes <b>:date</b>.',
    'before_or_equal' => 'O campo <b>:attribute</b> deve ser uma data antes ou igual a <b>:date</b>.',
    'between' => [
        'numeric' => 'O campo <b>:attribute</b> must be between <b>:min</b> and <b>:max</b>.',
        'file' => 'O campo <b>:attribute</b> must be between <b>:min</b> and <b>:max</b> kilobytes.',
        'string' => 'O campo <b>:attribute</b> must be between <b>:min</b> and <b>:max</b> characters.',
        'array' => 'O campo <b>:attribute</b> must have between <b>:min</b> and <b>:max</b> items.',
    ],
    'boolean' => 'O campo <b>:attribute</b> deve ser verdadeiro ou falso.',
    'confirmed' => 'O campo <b>:attribute</b> confirmation does not match.',
    'date' => 'O campo <b>:attribute</b> não é uma data válida.',
    'date_equals' => 'O campo <b>:attribute</b> deve ser igual a <b>:date</b>.',
    'date_format' => 'O campo <b>:attribute</b> não está no formato :format.',
    'different' => 'O campos <b>:attribute</b> e <b>:other</b> devem ser diferentes.',
    'digits' => 'O campo <b>:attribute</b> deve ter <b>:digits</b> dígitos.',
    'digits_between' => 'O campo <b>:attribute</b> deve ser entre <b>:min</b> and <b>:max</b> digits.',
    'dimensions' => 'O campo <b>:attribute</b> has invalid image dimensions.',
    'distinct' => 'O campo <b>:attribute</b> field has a duplicate value.',
    'email' => 'O campo <b>:attribute</b> must be a valid email address.',
    'ends_with' => 'O campo <b>:attribute</b> must end with one of the following: <b>:values</b>.',
    'exists' => 'The selected <b>:attribute</b> is invalid.',
    'file' => 'O campo <b>:attribute</b> must be a file.',
    'filled' => 'O campo <b>:attribute</b> field must have a value.',
    'gt' => [
        'numeric' => 'O campo <b>:attribute</b> must be greater than :value.',
        'file' => 'O campo <b>:attribute</b> must be greater than :value kilobytes.',
        'string' => 'O campo <b>:attribute</b> must be greater than :value characters.',
        'array' => 'O campo <b>:attribute</b> must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'O campo <b>:attribute</b> must be greater than or equal :value.',
        'file' => 'O campo <b>:attribute</b> must be greater than or equal :value kilobytes.',
        'string' => 'O campo <b>:attribute</b> must be greater than or equal :value characters.',
        'array' => 'O campo <b>:attribute</b> must have :value items or more.',
    ],
    'image' => 'O campo <b>:attribute</b> must be an image.',
    'in' => 'The selected <b>:attribute</b> is invalid.',
    'in_array' => 'O campo <b>:attribute</b> field does not exist in <b>:other</b>.',
    'integer' => 'O campo <b>:attribute</b> must be an integer.',
    'ip' => 'O campo <b>:attribute</b> must be a valid IP address.',
    'ipv4' => 'O campo <b>:attribute</b> must be a valid IPv4 address.',
    'ipv6' => 'O campo <b>:attribute</b> must be a valid IPv6 address.',
    'json' => 'O campo <b>:attribute</b> must be a valid JSON string.',
    'lt' => [
        'numeric' => 'O campo <b>:attribute</b> must be less than :value.',
        'file' => 'O campo <b>:attribute</b> must be less than :value kilobytes.',
        'string' => 'O campo <b>:attribute</b> must be less than :value characters.',
        'array' => 'O campo <b>:attribute</b> must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'O campo <b>:attribute</b> must be less than or equal :value.',
        'file' => 'O campo <b>:attribute</b> must be less than or equal :value kilobytes.',
        'string' => 'O campo <b>:attribute</b> must be less than or equal :value characters.',
        'array' => 'O campo <b>:attribute</b> must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'O campo <b>:attribute</b> may not be greater than <b>:max</b>.',
        'file' => 'O campo <b>:attribute</b> may not be greater than <b>:max</b> kilobytes.',
        'string' => 'O campo <b>:attribute</b> may not be greater than <b>:max</b> characters.',
        'array' => 'O campo <b>:attribute</b> may not have more than <b>:max</b> items.',
    ],
    'mimes' => 'O campo <b>:attribute</b> must be a file of type: <b>:values</b>.',
    'mimetypes' => 'O campo <b>:attribute</b> must be a file of type: <b>:values</b>.',
    'min' => [
        'numeric' => 'O campo <b>:attribute</b> must be at least <b>:min</b>.',
        'file' => 'O campo <b>:attribute</b> must be at least <b>:min</b> kilobytes.',
        'string' => 'O campo <b>:attribute</b> must be at least <b>:min</b> characters.',
        'array' => 'O campo <b>:attribute</b> must have at least <b>:min</b> items.',
    ],
    'not_in' => 'The selected <b>:attribute</b> is invalid.',
    'not_regex' => 'O campo <b>:attribute</b> format is invalid.',
    'numeric' => 'O campo <b>:attribute</b> must be a number.',
    'password' => 'The password is incorrect.',
    'present' => 'O campo <b>:attribute</b> field must be present.',
    'regex' => 'O campo <b>:attribute</b> format is invalid.',
    'required' => 'O campo <b>:attribute</b> não pode estar vazio.',
    'required_if' => 'O campo <b>:attribute</b> field is required when <b>:other</b> is :value.',
    'required_unless' => 'O campo <b>:attribute</b> field is required unless <b>:other</b> is in <b>:values</b>.',
    'required_with' => 'O campo <b>:attribute</b> field is required when <b>:values</b> is present.',
    'required_with_all' => 'O campo <b>:attribute</b> field is required when <b>:values</b> are present.',
    'required_without' => 'O campo <b>:attribute</b> field is required when <b>:values</b> is not present.',
    'required_without_all' => 'O campo <b>:attribute</b> field is required when none of <b>:values</b> are present.',
    'same' => 'O campo <b>:attribute</b> and <b>:other</b> must match.',
    'size' => [
        'numeric' => 'O campo <b>:attribute</b> must be <b>:size</b>.',
        'file' => 'O campo <b>:attribute</b> must be <b>:size</b> kilobytes.',
        'string' => 'O campo <b>:attribute</b> must be <b>:size</b> characters.',
        'array' => 'O campo <b>:attribute</b> must contain <b>:size</b> items.',
    ],
    'starts_with' => 'O campo <b>:attribute</b> must start with one of the following: <b>:values</b>.',
    'string' => 'O campo <b>:attribute</b> deve ser uma palavra/frase.',
    'timezone' => 'O campo <b>:attribute</b> deve ser uma zona válida.',
    'unique' => 'O campo <b>:attribute</b> já está sendo utilizado.',
    'uploaded' => 'O campo <b>:attribute</b> falhou em fazer o upload.',
    'url' => 'O formato do campo <b>:attribute</b> está inválido.',
    'uuid' => 'O campo <b>:attribute</b> deve ser um UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
