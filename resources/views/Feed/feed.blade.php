<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Post</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        @vite(['../resources/css/userPost.css', '../resources/js/Like/Like.js',  '../resources/js/app.js'])
    </head>
    <h1>Home Feed</h1>
    <h1>{{ Auth::user()->username}}</h1>
    @php
        $posts = App\Http\Controllers\postClubberController::getAll();  
    @endphp


    @foreach ($posts as $post)
        <h1>-----</h1>
        <h1>{{$post->clubberUsername}} ha postato</h1>
        <h3><strong>{{$post->caption}}</strong> al {{$post->clubUsername}}</h3>
        <button id="like-button" name="{{$post->id}}">METTI LIKE</button>
    @endforeach

    <button id="prova">PROVA</button>
    @csrf


</html>
