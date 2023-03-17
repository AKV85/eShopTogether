<div class="row">
    <div class="col s12 m3">
        <div class="card">
            <div class="card-image">
                <img src="https://picsum.photos/200">
                <span class="card-title">{{ $addresses->name }}</span>
            </div>
            <div class="card-content">
                <div>ID: {{$address->id}}</div>
                <p>Name: {{ $address->name }}</p>
                <p>Country: {{ $address->country }}</p>
                <p>City: {{ $address->city }}</p>
                <p>Zip: {{ $address->zip }}</p>
                <p>House number: {{ $address->house_number }}</p>
                <p>Apartament number: {{ $address->apartament_number }}</p>
                <p>Additional info: {{ $address->additional_info }}</p>
                <p>User id: {{ $address->user_id }}</p>
            </div>
            <div class="card-action">
                <a href="{{ route('addresses.edit', $address->id) }}"
                   data-tooltip="Redaguoti"
                   class="tooltipped waves-effect waves-light green btn-small">
                    <i class="tiny material-icons">edit</i>
                </a>
                <form action="{{ route('addresses.destroy', $address->id) }}" method="POST">
                    @csrf
                    <button type="submit"data-tooltip="Šalinti"
                            class="tooltipped waves-effect waves-light red btn-small">
                        <i class="tiny material-icons">delete</i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
