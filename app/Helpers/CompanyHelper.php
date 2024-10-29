<?php

namespace App\Helpers;

// use App\Models\Admin\Company;
use App\Models\Company as ModelsCompany;

    if (!function_exists('getCompanyInfo')) {
        function getCompanyInfo() {
            return ModelsCompany::first(); 
        }
    }

