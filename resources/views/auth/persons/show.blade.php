
<h1>Edit person</h1>
<span>Editing {{$person->name}}</span>
<form action="{{route('persons.update', $person)}}" method="post">
    <input type="text" name="user_id"><br>
    @csrf
    <hr>
    <input type="submit" class="SEND">
</form>
