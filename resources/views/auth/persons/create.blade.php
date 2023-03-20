

{{--Šis šablonas atsako už naujo asmens įrašymo formos rodymą.--}}

<h1>Person</h1>
<span>Asmenys</span>
<form action="{{route('persons.store')}}" method="post">

    <input type="text" name="name" placeholder="{{__('persons.name')}}" value="{{old('name')}}"><br>
    <input type="text" name="surname" placeholder="{{__('persons.surname')}}" value="{{old('surname')}}"><br>
    <input type="text" name="email" placeholder="{{__('persons.email')}}" value="{{old('email')}}"><br>
{{--    <input type="text" name="user_id" placeholder="{{__('persons.user_id')}}" value="{{old('user_id')}}"><br>--}}
{{--    <input type="text" name="addresses_id" placeholder="{{__('persons.addresses_id')}}" value="{{old('addresses_id')}}"><br>--}}
    <hr>
    <input type="submit" class="Atnaujinti">
    @csrf
</form>
