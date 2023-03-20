
{{--Šis šablonas atsako už asmens informacijos redagavimą.--}}

<h1>Edit person</h1>
<span>Editing {{$person->name}}</span>
<form action="{{route('persons.update', $person)}}" method="post">
{{--    <input type="text" name="id" placeholder="{{__('persons.id')}}" value="{{old('id')}}"><br>--}}
    <input type="text" name="name" placeholder="{{__('persons.name')}}" value="{{old('name')}}"><br>
    <input type="text" name="surname" placeholder="{{__('persons.surname')}}" value="{{old('surname')}}"><br>
    <input type="text" name="email" placeholder="{{__('persons.email')}}" value="{{old('email')}}"><br>
{{--    <input type="text" name="user_id" placeholder="{{__('persons.user_id')}}" value="{{old('user_id')}}"><br>--}}
{{--    <input type="text" name="addresses_id" placeholder="{{__('persons.addresses_id')}}" value="{{old('addresses_id')}}"><br>--}}
    <hr>
    @csrf
    <hr>
    <input type="submit" class="SEND">
</form>
