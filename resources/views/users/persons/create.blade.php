<h1>Person</h1>
<span>Asmenys</span>
<form action="{{route('persons.store')}}" method="post">

    <input type="text" name="id" placeholder="{{__('persons.id')}}" value="{{old('id')}}"><br>
    <input type="text" name="name" placeholder="{{__('persons.name')}}" value="{{old('name')}}"><br>
    <input type="text" name="surname" placeholder="{{__('persons.surname')}}" value="{{old('surname')}}"><br>
    <input type="text" name="email" placeholder="{{__('persons.email')}}" value="{{old('email')}}"><br>
    <input type="text" name="user_id" placeholder="{{__('persons.user_id')}}" value="{{old('user_id')}}"><br>
    <input type="text" name="addresses_id" placeholder="{{__('persons.addresses_id')}}" value="{{old('addresses_id')}}"><br>
    <input type="text" name="created_at" placeholder="{{__('persons.created_at')}}" value="{{old('created_at')}}"><br>
    <input type="text" name="updated_at" placeholder="{{__('persons.updated_at')}}" value="{{old('updated_at')}}"><br>
    <hr>
    <input type="submit" class="Atnaujinti">
    @csrf
</form>
