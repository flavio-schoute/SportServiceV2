<?php

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

if (!function_exists('isOptionDisabled')) {

    /**
     * Check with the given key if the option is enabled
     *
     * @param string $key
     * @return bool If enabled it will return TRUE otherwise FALSE
     */
    function isOptionEnabled(string $key): bool {
        $data = getOptions($key);
        foreach($data as $item) {
            if ($item->value == 1) {
                return true;
            }
        }

        return false;
    }
}

if (!function_exists('getOptions')) {

    /**
     * Get an option from the database table
     *
     * @param string $key
     * @param string $database
     * @return Collection
     */
    function getOptions(string $key, string $database = 'options'): Collection {
        return DB::table($database)->select('key', 'value')->where('key', '=', $key)->get();
    }
}
