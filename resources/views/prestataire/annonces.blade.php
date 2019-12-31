@extends('../layouts.app')
@extends('../prestataire/nav')
@section('content')
<div class="container">
    @if($annonces)
        @foreach($annonces as $annonce)
                {{$annonce->titre}}
        @endforeach

    @endif
</div>
@endsection