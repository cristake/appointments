<?php

namespace App\Http\Controllers\Api\V1;

use App\ContactCompany;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreContactCompaniesRequest;
use App\Http\Requests\Admin\UpdateContactCompaniesRequest;

class ContactCompaniesController extends Controller
{
    public function index()
    {
        return ContactCompany::all();
    }

    public function show($id)
    {
        return ContactCompany::findOrFail($id);
    }

    public function update(UpdateContactCompaniesRequest $request, $id)
    {
        $contact_company = ContactCompany::findOrFail($id);
        $contact_company->update($request->all());
        

        return $contact_company;
    }

    public function store(StoreContactCompaniesRequest $request)
    {
        $contact_company = ContactCompany::create($request->all());
        

        return $contact_company;
    }

    public function destroy($id)
    {
        $contact_company = ContactCompany::findOrFail($id);
        $contact_company->delete();
        return '';
    }
}
