<?php

namespace App\Http\Controllers\AllUsers;
use App\Http\Controllers\Controller;
use App\Models\Company; 

use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($company_id)
    {
        $company_data = Company::findOrFail($company_id);
        $contactable_employees = $company_data->employees()->where('contactable', 1)->get();
        return view('all_users.company_profile', [
            'company_data' => $company_data,
            'contactable_employees' => $contactable_employees,
     
        ]);
    }
}
