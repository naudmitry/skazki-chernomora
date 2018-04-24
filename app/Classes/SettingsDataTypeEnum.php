<?php

namespace App\Classes;

class SettingsDataTypeEnum extends Enum
{
    const TYPE_STRING = 'string';
    const TYPE_FLOAT = 'float';
    const TYPE_INTEGER = 'integer';
    const TYPE_BOOLEAN = 'boolean';
    const TYPE_ARRAY = 'array';
    const TYPE_ARRAY_L10N = 'array-l10n';
}
