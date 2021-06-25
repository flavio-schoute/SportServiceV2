<?php

namespace App\Util;

use Illuminate\Support\Facades\DB;

class Utils {

    // NEED TO BE IMPLEMENTED
    public function isOptionDisabled($key) {
        $data = $this->getOptions($key);
        foreach($data as $item) {
            if ($item->value == 1) {
                return true;
            }

            return false;
        }
    }

    // Maybe make this a static function in class somewhere
    private function getOptions($key)
    {
        $data = DB::table('options')->select('key', 'value')->where('key', '=', $key)->get();
        return $data;
    }

}
