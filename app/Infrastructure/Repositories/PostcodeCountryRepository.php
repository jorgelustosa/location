<?php

namespace App\Infrastructure\Repositories;

use Illuminate\Support\Facades\DB;

class PostcodeCountryRepository
{
    public function checkCountry(string $country): bool
    {
        $result = DB::table('postcode_country')
            ->where('iso', '=', $country )
            ->first();
        if (empty($result)) {
            return true ;
        }
        return false ;
    }
}
