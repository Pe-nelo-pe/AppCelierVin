@extends('layouts.app')
@section('title', 'Edit-Profil')
@section('content')
   
    <form class="formBtl_form"  action="post">
        @csrf
        @method('put')
         <h1>Modification de votre Cellier</h1>
        <input type="text" placeholder="{{$utilisateur->name}}">
        <input class="btn"  type="submit" value="Modifier">
        <input class="btn-reverse"  type="submit" value="Supprimer le compte">
    </form>

@endsection