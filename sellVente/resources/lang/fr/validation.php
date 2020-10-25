<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Cet following language lines contain Cet default error messages used by
    | Cet validator class. Some of Cetse rules have multiple versions such
    | as Cet size rules. Feel free to tweak each of Cetse messages here.
    |
    */

    'accepted' => 'Cet :attribute doit être accepté.',
    'active_url' => 'Cet :attribute n\'est pas une URL valide.',
    'after' => 'Cet :attribute doit être une date après :date.',
    'after_or_equal' => 'Cet :attribute doit être une date postérieure ou égale à :date.',
    'alpha' => 'Cet :attribute ne peut contenir que des lettres.',
    'alpha_dash' => 'Cet :attribute ne peut contenir que des lettres, des chiffres, des tirets et des traits de soulignement.',
    'alpha_num' => 'Cet :attribute ne peut contenir que des lettres et des chiffres.',
    'array' => 'Cet :attribute doit être un tableau.',
    'before' => 'Cet :attribute doit être une date antérieure à :date.',
    'before_or_equal' => 'Cet :attribute doit être une date antérieure ou égale à :date.',
    'between' => [
        'numeric' => 'Cet :attribute doit être entre :min et :max.',
        'file' => 'Cet :attribute doit être entre :min et :max kilo-octets.',
        'string' => 'Cet :attribute doit être entre :min et :max charactères.',
        'array' => 'Cet :attribute doit avoir entre :min et :max articles.',
    ],
    'boolean' => 'Le champ :attribute doit être vrai ou faux.',
    'confirmed' => 'Cet :attribute la confirmation ne correspond pas.',
    'date' => 'Cet :attribute n\'est pas une date valide.',
    'date_equals' => 'Cet :attribute doit être une date égale à :date.',
    'date_format' => 'Cet :attribute ne correspond pas au format :format.',
    'different' => 'Cet :attribute et :oCetr doit être différent.',
    'chiffres' => 'Cet :attribute doit être :chiffres chiffres.',
    'chiffres_between' => 'Cet :attribute doit être entre :min et :max chiffres.',
    'dimensions' => 'Cet :attribute a des dimensions d\'image non valides.',
    'distinct' => 'Le champ :attribute a une valeur en double.',
    'email' => 'Cet :attribute doit être une adresse courriel valide.',
    'ends_with' => 'Cet :attribute doit se terminer par un de Cet suivant : :values.',
    'exists' => 'La sélection :attribute est invalide.',
    'file' => 'Cet :attribute doit être un fichier.',
    'filled' => 'le champ :attribute doit avoir une valeur.',
    'gt' => [
        'numeric' => 'Cet :attribute doit être supérieur à :value.',
        'file' => 'Cet :attribute doit être supérieur à :value kilo-octets.',
        'string' => 'Cet :attribute doit être supérieur à :value charactères.',
        'array' => 'Cet :attribute doit avoir more than :value articles.',
    ],
    'gte' => [
        'numeric' => 'Cet :attribute doit être supérieur à or equal :value.',
        'file' => 'Cet :attribute doit être supérieur ou égal à :value kilo-octets.',
        'string' => 'Cet :attribute doit être supérieur ou égal à :value charactères.',
        'array' => 'Cet :attribute doit avoir :value articles ou plus.',
    ],
    'image' => 'Cet :attribute doit être une image.',
    'in' => 'Cet :attribute sélectionné est invalide.',
    'in_array' => 'Le champ:attribute n\'existe pas dans :oCetr.',
    'integer' => 'Cet :attribute doit être un entier.',
    'ip' => 'Cet :attribute doit être une adresse IP valide.',
    'ipv4' => 'Cet :attribute doit être une adresse IPv4 valide.',
    'ipv6' => 'Cet :attribute doit être une adresse IPv6 valide.',
    'json' => 'Cet :attribute doit être une chaîne JSON valide.',
    'lt' => [
        'numeric' => 'Cet :attribute doit être inférieur à :value.',
        'file' => 'Cet :attribute doit être inférieur à :value kilo-octets.',
        'string' => 'Cet :attribute doit être inférieur à :value charactères.',
        'array' => 'Cet :attribute doit avoir less than :value articles.',
    ],
    'lte' => [
        'numeric' => 'Cet :attribute doit être inférieur à or equal :value.',
        'file' => 'Cet :attribute doit être inférieur à or equal :value kilo-octets.',
        'string' => 'Cet :attribute doit être inférieur à or equal :value charactères.',
        'array' => 'Cet :attribute ne doit pas avoir plus de :value articles.',
    ],
    'max' => [
        'numeric' => 'Cet :attribute ne peut pas être supérieur à :max.',
        'file' => 'Cet :attribute ne peut pas être supérieur à :max kilo-octets.',
        'string' => 'Cet :attribute ne peut pas être supérieur à :max charactères.',
        'array' => 'Cet :attribute ne peut pas avoir plus de :max articles.',
    ],
    'mimes' => 'Cet :attribute doit être un fichier de type : :values.',
    'mimetypes' => 'Cet :attribute doit être un fichier de type : :values.',
    'min' => [
        'numeric' => 'Cet :attribute doit être au moins :min.',
        'file' => 'Cet :attribute doit être au moins :min kilo-octets.',
        'string' => 'Cet :attribute doit être au moins :min charactères.',
        'array' => 'Cet :attribute doit avoir au moins :min articles.',
    ],
    'not_in' => 'Cet :attribute sélectionné est invalide.',
    'not_regex' => 'Cet :attribute le format n\'est pas valide.',
    'numeric' => 'Cet :attribute doit être un nombre.',
    'password' => 'Cet mot de passe est incorrect.',
    'present' => 'Le champ  :attribute doit être présent.',
    'regex' => 'Cet :attribute format n\'est pas valide.',
    'required' => 'Cet :attribute est requis.',
    'required_if' => 'Le champ :attribute est requis lorsque :oCetr est :value.',
    'required_unless' => 'Le champ :attribute est requis unless :oCetr est dans :values.',
    'required_with' => 'Le champ :attribute est requis lorsque :values est present.',
    'required_with_all' => 'Le champ :attribute est requis lorsque :values sont présents.',
    'required_without' => 'Le champ :attribute est requis lorsque :values n\'est pas présent.',
    'required_without_all' => 'Le champ :attribute est requis lorsqu\'aucunes :values n\'est présente.',
    'same' => 'Cet :attribute et :oCetr doit correspondre.',
    'size' => [
        'numeric' => 'Cet :attribute doit être :size.',
        'file' => 'Cet :attribute doit être :size kilo-octets.',
        'string' => 'Cet :attribute doit être :size charactères.',
        'array' => 'Cet :attribute doit contenir :size articles.',
    ],
    'starts_with' => 'Cet :attribute doit commencer par un de Cet suivant : :values.',
    'string' => 'Cet :attributedoit être une chaîne de caractères.',
    'timezone' => 'Cet :attribute doit être une zone valide.',
    'unique' => 'Cet :attribute a déjà été pris.',
    'uploaded' => 'Cet :attribute échec du téléchargement.',
    'url' => 'Cet :attribute le format n\'est pas valide.',
    'uuid' => 'Cet :attribute doit être un UUID valide.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using Cet
    | convention "attribute.rule" to name Cet lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'message personnalisé',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | Cet following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
