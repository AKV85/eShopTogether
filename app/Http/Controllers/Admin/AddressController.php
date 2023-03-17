<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = Address::query()->with(['user'])->get();
        return view('auth.addresses.index',['addresses'=>Address::orderBy("id")->paginate(6)]);
    }

    public function create()
    {
        return view('auth.addresses.create');
    }

    public function store(AddressRequest $request)
    {
        $address = Address::create($request->all());
        return redirect()->route('auth.addresses.show', $address);
    }

    public function show(Address $address)
    {
        return view('auth.addresses.show', ['address' => $address]);
    }

    public function edit(Address $address)
    {
        return view('auth.addresses.edit', compact('address'));
    }

    public function update(Request $request, Address $address)
    {
        $address->update($request->all());
        return redirect()->route('auth.addresses.show', $address);
    }

    public function destroy(Address $address)
    {
        $address->delete();
        return redirect()->route('auth.addresses.index');
    }
}
