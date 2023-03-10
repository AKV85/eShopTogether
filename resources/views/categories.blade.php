@extends('layouts.main')

@section('title', 'Visos kategorijos')
@section('background', 'kategorija')
@section('content')
    @foreach($categories as $category)
        <div class="panel">
            <a href="{{ route('category', $category->code) }}">
                <img class='categoriesfoto' src="{{ Storage::url($category->image) }}">{{--Ši eilutė yra naudojama atvaizduoti kategorijos
 paveikslėlį, naudojant Laravel Storage klasės url() metodą, kuris gražina viešą URL adresą iš konfigūruojamo disko,
  pagal pavadinimą, kuris yra saugomas aplikacijoje.
$category->image yra paveikslėlio kelias, kuris yra saugomas duomenų bazėje ir perduodamas į Storage::url() metodą, kad
 būtų sugeneruotas viešas URL, kuris rodo į paveikslėlį. Tai naudinga, kai norite atvaizduoti paveikslėlį, kuris yra
  saugomas diskas, tačiau jis nėra tiesiogiai pasiekiamas per HTTP protokolą, nes jis yra saugomas privačiame diske.--}}
                <h2>{{ $category->name }}</h2>
            </a>
            <p>
                {{ $category->description }}
            </p>
        </div>
    @endforeach
@endsection
