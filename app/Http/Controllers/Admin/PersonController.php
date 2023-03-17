<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        $persons = Person::paginate(10);
        return view('auth.persons.index', compact('persons'));
    }

    public function create()
    {
        return view('auth.persons.create');
    }

    public function store(Request $request)
    {
        $person = Person::create($request->all());
        return redirect()->route('auth.persons.show', $person);
    }

    public function show(Person $person)
    {
        return $person;
    }

    public function edit(Person $person)
    {
        return view('auth.persons.edit', compact('person'));
    }

    public function update(Request $request, Person $person)
    {
        $person->update($request->all());
        return redirect()->route('auth.persons.show', $person);
    }

    public function destroy(Person $person)
    {
        $person->delete();
        return redirect()->route('auth.persons.index');
    }
}
