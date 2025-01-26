<?php

return [
    'required' => 'O campo :attribute é obrigatório.',
    'email' => 'O campo :attribute deve ser um endereço de e-mail válido.',
    'min' => [
        'string' => 'O campo :attribute deve ter no mínimo :min caracteres.',
    ],
    'max' => [
        'string' => 'O campo :attribute não deve ter mais que :max caracteres.',
    ],
    'unique' => 'O campo :attribute já está em uso.',
    'confirmed' => 'A confirmação do campo :attribute não confere.',

    'custom' => [
        'name' => [
            'regex' => 'O campo nome só pode conter letras e espaços.',
        ],
        'email' => [
            'regex' => 'O campo e-mail deve ser um endereço de e-mail válido no formato correto.',
        ],
    ],

    'attributes' => [
        'name' => 'nome',
        'email' => 'e-mail',
        'password' => 'senha',
        'password_confirmation' => 'confirmação de senha',
    ],
];
