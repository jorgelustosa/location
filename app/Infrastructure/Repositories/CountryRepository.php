<?php

namespace App\Infrastructure\Repositories;

use Illuminate\Support\Facades\DB;

class CountryRepository
{
    public function checkCountry(string $country): bool
    {
        $result = DB::table('country')
            ->where('iso', '=', $country )
            ->first();
        if (empty($result)) {
            return true ;
        }
        return false ;
    }
}
