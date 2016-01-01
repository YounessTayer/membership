<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Users
    |--------------------------------------------------------------------------
    */

    'users' => [
        'avatar'   => [
            // Default avatar file
            'default' => 'assets/img/misc/noavatar.png',
            // Path to the folder with uploaded avatars
            'path'    => 'uploads/images/avatars'
        ],
        // Number of users to display per page
        'per_page' => 10,
        // Database table name
        'table'    => 'users'
    ],

    /*
    |--------------------------------------------------------------------------
    | Groups
    |--------------------------------------------------------------------------
    */

    'groups' => [
        // Default group ID
        'default'          => 1,
        // Used for auto-generated handles
        'handle_separator' => '-', // comma "," and pipe "|" are reserved!
        // Number of groups to display per page
        'per_page'         => 10
    ],

    /*
    |--------------------------------------------------------------------------
    | Permission Sets
    |--------------------------------------------------------------------------
    */

    'sets' => [
        // Used for auto-generated handles
        'handle_separator' => '.', // comma "," and pipe "|" are reserved!
        // Number of permissions to display per page
        'per_page'         => 10
    ],

    /*
    |--------------------------------------------------------------------------
    | Permissions
    |--------------------------------------------------------------------------
    */

    'permissions' => [
        // Used for auto-generated handles
        'handle_separator' => '.', // comma "," and pipe "|" are reserved!
        // Number of permissions to display per page
        'per_page'         => 10
    ],

    /*
    |--------------------------------------------------------------------------
    | Cocur Slugify Rules
    |--------------------------------------------------------------------------
    |
    | How special characters and foreign letters should be treated.
    |
    */

    'slugify' => [
        'ä' => 'ae', 'æ' => 'ae', 'ǽ' => 'ae', 'ö' => 'oe', 'œ' => 'oe', 'ü' => 'ue', 'Ä' => 'Ae', 'Ü' => 'Ue',
        'Ö' => 'Oe', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Å' => 'A', 'Ǻ' => 'A', 'Ā' => 'A', 'Ă' => 'A',
        'Ą' => 'A', 'Ǎ' => 'A', 'Α' => 'A', 'Ά' => 'A', 'Ả' => 'A', 'Ạ' => 'A', 'Ầ' => 'A', 'Ẫ' => 'A', 'Ẩ' => 'A',
        'Ậ' => 'A', 'Ằ' => 'A', 'Ắ' => 'A', 'Ẵ' => 'A', 'Ẳ' => 'A', 'Ặ' => 'A', 'А' => 'A', 'à' => 'a', 'á' => 'a',
        'â' => 'a', 'ã' => 'a', 'å' => 'a', 'ǻ' => 'a', 'ā' => 'a', 'ă' => 'a', 'ą' => 'a', 'ǎ' => 'a', 'ª' => 'a',
        'α' => 'a', 'ά' => 'a', 'ả' => 'a', 'ạ' => 'a', 'ầ' => 'a', 'ấ' => 'a', 'ẫ' => 'a', 'ẩ' => 'a', 'ậ' => 'a',
        'ằ' => 'a', 'ắ' => 'a', 'ẵ' => 'a', 'ẳ' => 'a', 'ặ' => 'a', 'а' => 'a', 'Б' => 'B', 'б' => 'b', 'Ç' => 'C',
        'Ć' => 'C', 'Ĉ' => 'C', 'Ċ' => 'C', 'Č' => 'C', 'ç' => 'c', 'ć' => 'c', 'ĉ' => 'c', 'ċ' => 'c', 'č' => 'c',
        'Д' => 'D', 'д' => 'd', 'Ð' => 'Dj', 'Ď' => 'Dj', 'Đ' => 'Dj', 'Δ' => 'Dj', 'ð' => 'dj', 'ď' => 'dj',
        'đ' => 'dj', 'δ' => 'dj', 'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ē' => 'E', 'Ĕ' => 'E', 'Ė' => 'E',
        'Ę' => 'E', 'Ě' => 'E', 'Ε' => 'E', 'Έ' => 'E', 'Ẽ' => 'E', 'Ẻ' => 'E', 'Ẹ' => 'E', 'Ề' => 'E', 'Ế' => 'E',
        'Ễ' => 'E', 'Ể' => 'E', 'Ệ' => 'E', 'Е' => 'E', 'Э' => 'E', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e',
        'ē' => 'e', 'ĕ' => 'e', 'ė' => 'e', 'ę' => 'e', 'ě' => 'e', 'έ' => 'e', 'ε' => 'e', 'ẽ' => 'e', 'ẻ' => 'e',
        'ẹ' => 'e', 'ề' => 'e', 'ế' => 'e', 'ễ' => 'e', 'ể' => 'e', 'ệ' => 'e', 'е' => 'e', 'э' => 'e', 'Ф' => 'F',
        'ф' => 'f', 'Ĝ' => 'G', 'Ğ' => 'G', 'Ġ' => 'G', 'Ģ' => 'G', 'Γ' => 'G', 'Г' => 'G', 'Ґ' => 'G', 'ĝ' => 'g',
        'ğ' => 'g', 'ġ' => 'g', 'ģ' => 'g', 'γ' => 'g', 'г' => 'g', 'ґ' => 'g', 'Ĥ' => 'H', 'Ħ' => 'H', 'ĥ' => 'h',
        'ħ' => 'h', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ĩ' => 'I', 'Ī' => 'I', 'Ĭ' => 'I', 'Ǐ' => 'I',
        'Į' => 'I', 'İ' => 'I', 'Η' => 'I', 'Ή' => 'I', 'Ί' => 'I', 'Ι' => 'I', 'Ϊ' => 'I', 'Ỉ' => 'I', 'Ị' => 'I',
        'И' => 'I', 'Ы' => 'I', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ĩ' => 'i', 'ī' => 'i', 'ĭ' => 'i',
        'ǐ' => 'i', 'į' => 'i', 'ı' => 'i', 'η' => 'i', 'ή' => 'i', 'ί' => 'i', 'ι' => 'i', 'ϊ' => 'i', 'ỉ' => 'i',
        'ị' => 'i', 'и' => 'i', 'ы' => 'i', 'ї' => 'i', 'Ĵ' => 'J', 'ĵ' => 'j', 'Ķ' => 'K', 'Κ' => 'K', 'К' => 'K',
        'ķ' => 'k', 'κ' => 'k', 'к' => 'k', 'Ĺ' => 'L', 'Ļ' => 'L', 'Ľ' => 'L', 'Ŀ' => 'L', 'Ł' => 'L', 'Λ' => 'L',
        'Л' => 'L', 'ĺ' => 'l', 'ļ' => 'l', 'ľ' => 'l', 'ŀ' => 'l', 'ł' => 'l', 'λ' => 'l', 'л' => 'l', 'М' => 'M',
        'м' => 'm', 'Ñ' => 'N', 'Ń' => 'N', 'Ņ' => 'N', 'Ň' => 'N', 'Ν' => 'N', 'Н' => 'N', 'ñ' => 'n', 'ń' => 'n',
        'ņ' => 'n', 'ň' => 'n', 'ŉ' => 'n', 'ν' => 'n', 'н' => 'n', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O',
        'Ō' => 'O', 'Ŏ' => 'O', 'Ǒ' => 'O', 'Ő' => 'O', 'Ơ' => 'O', 'Ø' => 'O', 'Ǿ' => 'O', 'Ο' => 'O', 'Ό' => 'O',
        'Ω' => 'O', 'Ώ' => 'O', 'Ỏ' => 'O', 'Ọ' => 'O', 'Ồ' => 'O', 'Ố' => 'O', 'Ỗ' => 'O', 'Ổ' => 'O', 'Ộ' => 'O',
        'Ờ' => 'O', 'Ớ' => 'O', 'Ỡ' => 'O', 'Ở' => 'O', 'Ợ' => 'O', 'О' => 'O', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o',
        'õ' => 'o', 'ō' => 'o', 'ŏ' => 'o', 'ǒ' => 'o', 'ő' => 'o', 'ơ' => 'o', 'ø' => 'o', 'ǿ' => 'o', 'º' => 'o',
        'ο' => 'o', 'ό' => 'o', 'ω' => 'o', 'ώ' => 'o', 'ỏ' => 'o', 'ọ' => 'o', 'ồ' => 'o', 'ố' => 'o', 'ỗ' => 'o',
        'ổ' => 'o', 'ộ' => 'o', 'ờ' => 'o', 'ớ' => 'o', 'ỡ' => 'o', 'ở' => 'o', 'ợ' => 'o', 'о' => 'o', 'П' => 'P',
        'п' => 'p', 'Ŕ' => 'R', 'Ŗ' => 'R', 'Ř' => 'R', 'Ρ' => 'R', 'Р' => 'R', 'ŕ' => 'r', 'ŗ' => 'r', 'ř' => 'r',
        'ρ' => 'r', 'р' => 'r', 'Ś' => 'S', 'Ŝ' => 'S', 'Ş' => 'S', 'Ș' => 'S', 'Š' => 'S', 'Σ' => 'S', 'С' => 'S',
        'ś' => 's', 'ŝ' => 's', 'ş' => 's', 'ș' => 's', 'š' => 's', 'ſ' => 's', 'σ' => 's', 'ς' => 's', 'с' => 's',
        'Ț' => 'T', 'Ţ' => 'T', 'Ť' => 'T', 'Ŧ' => 'T', 'τ' => 'T', 'Т' => 'T', 'ț' => 't', 'ţ' => 't', 'ť' => 't',
        'ŧ' => 't', 'т' => 't', 'Þ' => 'th', 'þ' => 'th', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ũ' => 'U', 'Ū' => 'U',
        'Ŭ' => 'U', 'Ů' => 'U', 'Ű' => 'U', 'Ų' => 'U', 'Ư' => 'U', 'Ǔ' => 'U', 'Ǖ' => 'U', 'Ǘ' => 'U', 'Ǚ' => 'U',
        'Ǜ' => 'U', 'Ủ' => 'U', 'Ụ' => 'U', 'Ừ' => 'U', 'Ứ' => 'U', 'Ữ' => 'U', 'Ử' => 'U', 'Ự' => 'U', 'У' => 'U',
        'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ũ' => 'u', 'ū' => 'u', 'ŭ' => 'u', 'ů' => 'u', 'ű' => 'u', 'ų' => 'u',
        'ư' => 'u', 'ǔ' => 'u', 'ǖ' => 'u', 'ǘ' => 'u', 'ǚ' => 'u', 'ǜ' => 'u', 'υ' => 'u', 'ύ' => 'u', 'ϋ' => 'u',
        'ủ' => 'u', 'ụ' => 'u', 'ừ' => 'u', 'ứ' => 'u', 'ữ' => 'u', 'ử' => 'u', 'ự' => 'u', 'у' => 'u', 'Ý' => 'Y',
        'Ÿ' => 'Y', 'Ŷ' => 'Y', 'Υ' => 'Y', 'Ύ' => 'Y', 'Ϋ' => 'Y', 'Ỳ' => 'Y', 'Ỹ' => 'Y', 'Ỷ' => 'Y', 'Ỵ' => 'Y',
        'Й' => 'Y', 'ý' => 'y', 'ÿ' => 'y', 'ŷ' => 'y', 'ỳ' => 'y', 'ỹ' => 'y', 'ỷ' => 'y', 'ỵ' => 'y', 'й' => 'y',
        'В' => 'V', 'в' => 'v', 'Ŵ' => 'W', 'ŵ' => 'w', 'Ź' => 'Z', 'Ż' => 'Z', 'Ž' => 'Z', 'Ζ' => 'Z', 'З' => 'Z',
        'ź' => 'z', 'ż' => 'z', 'ž' => 'z', 'ζ' => 'z', 'з' => 'z', 'Æ' => 'AE', 'Ǽ' => 'AE', 'ß' => 'ss', 'Ĳ' => 'IJ',
        'ĳ' => 'ij', 'Œ' => 'OE', 'ƒ' => 'f', 'ξ' => 'ks', 'π' => 'p', 'β' => 'v', 'μ' => 'm', 'ψ' => 'ps',
        'Ё' => 'Yo', 'ё' => 'yo', 'Є' => 'Ye', 'є' => 'ye', 'Ї' => 'Yi', 'Ж' => 'Zh', 'ж' => 'zh', 'Х' => 'Kh',
        'х' => 'kh', 'Ц' => 'Ts', 'ц' => 'ts', 'Ч' => 'Ch', 'ч' => 'ch', 'Ш' => 'Sh', 'ш' => 'sh', 'Щ' => 'Shch',
        'щ' => 'shch', 'Ъ' => '', 'ъ' => '', 'Ь' => '', 'ь' => '', 'Ю' => 'Yu', 'ю' => 'yu', 'Я' => 'Ya', 'я' => 'ya'
    ]

];
