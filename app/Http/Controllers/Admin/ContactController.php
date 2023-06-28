<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(5);
		return view('admin.contact.contact', compact('contacts'));
    }

    public function create()
    {
        return view('admin.contact.create');
    }

    public function store(ContactRequest $request)
    {
        $request['status'] = $request->has('status');

        Contact::create($request->all());

		return to_route('admin.panel.about.contact')->with(['success' => 'عملیات ایجاد با موفقیت انجام شد']);
    }

    public function edit(Contact $contact)
    {
        return view('admin.contact.edit', compact('contact'));
    }

    public function update(ContactRequest $request, Contact $contact)
    {
        $request['status'] = $request->has('status');
        $contact->updateOrFail($request->all());

		return to_route('admin.panel.about.contact')->with(['success' => 'عملیات ویرایش با موفقیت انجام شد']);
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

		return redirect()->back()->with(['success' => 'عملیات حذف با موفقیت انجام شد']);
    }
}
