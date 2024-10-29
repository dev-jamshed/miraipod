<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use Illuminate\Contracts\View\View;

class DetailController extends Controller
{



    public function edit(Company $company)
    {
        return view('admin.companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        // Validate the request
        $request->validate([
            'email_1' => 'nullable|email',
            'email_2' => 'nullable|email',
            'phone_1' => 'nullable|string',
            'phone_2' => 'nullable|string',
            'office_address' => 'nullable|string',
        ]);

        // Update the company details
        $company->update($request->all());


        session()->flash('success', 'Company updated successfully.');

        // Return a JSON response
        return response()->json([
            'status' => true,
            'message' => 'Company updated successfully.',
        ]);
    }

    public function getUsers()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        // return $users;
        return view('admin.users.index', compact('users'));
    }
}
