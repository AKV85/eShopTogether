
{{--Šis šablonas yra atsakingas už adreso redagavimo formą. --}}
{{--Jis yra naudojamas rodyti vartotojui formą, kurią jis nori redaguoti. --}}


<h1>Addresses</h1>
<span>Adresai</span>
<form action="{{route('addresses.store')}}" method="post">

    <input type="text" name="name" placeholder="{{__('adresses.name')}}" value="{{old('name')}}"><br>
    <input type="text" name="country" placeholder="{{__('adresses.country')}}" value="{{old('country')}}"><br>
    <input type="text" name="city" placeholder="{{__('adresses.city')}}" value="{{old('city')}}"><br>
    <input type="text" name="zip" placeholder="{{__('adresses.zip')}}" value="{{old('zip')}}"><br>
    <input type="text" name="street" placeholder="{{__('adresses.street')}}" value="{{old('street')}}"><br>
    <input type="text" name="house_number" placeholder="{{__('adresses.house_number')}}" value="{{old('house_number')}}"><br>
    <input type="text" name="apartament_number" placeholder="{{__('adresses.apartament_number')}}" value="{{old('apartament_number')}}"><br>
    <input type="text" name="state" placeholder="{{__('adresses.state')}}" value="{{old('state')}}"><br>
    <input type="text" name="type" placeholder="{{__('adresses.type')}}" value="{{old('type')}}"><br>
    <input type="text" name="additional_info" placeholder="{{__('adresses.additional_info')}}" value="{{old('additional_info')}}"><br>
{{--    <input type="text" name="user_id" placeholder="{{__('adresses.user_id')}}" value="{{old('user_id')}}"><br>--}}
{{--    <input type="text" name="created_at" placeholder="{{__('adresses.created_at')}}" value="{{old('created_at')}}"><br>--}}
{{--    <input type="text" name="updated_at" placeholder="{{__('adresses.updated_at')}}" value="{{old('updated_at')}}"><br>--}}
    <hr>
    <input type="submit" class="Atnaujinti">
    @csrf
</form>
