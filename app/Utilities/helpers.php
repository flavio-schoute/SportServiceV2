<?php

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

if (!function_exists('isOptionDisabled')) {

    function isOptionEnabled($key): bool {
        $data = getOptions($key);
        foreach($data as $item) {
            if ($item->value == 1) {
                return true;
            }

            return false;
        }
    }
}

if (!function_exists('getOptions')) {

    // Document todo -> collection return??
    function getOptions($key): Collection {
        return DB::table('options')->select('key', 'value')->where('key', '=', $key)->get();
    }
}
