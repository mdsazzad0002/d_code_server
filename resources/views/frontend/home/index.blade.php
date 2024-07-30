@extends('frontend.layouts.master')

@section('title', 'Top Contributor Tanvir Ahmmed')
@section('short_description', 'Well organized and easy to understand Web building tutorials with lots of examples of how to use HTML, CSS, JavaScript, SQL, Python, PHP, Bootstrap, Java, XML and more.')
@section('og_image', static_asset('uploads/BANNER_DATA.jpg'))
@section('keywords', 'HTML, Python, CSS, SQL, JavaScript, How to, PHP, Java, C, C++, C#, jQuery, Bootstrap, Colors, W3.CSS, XML, MySQL, Icons, NodeJS, React, Graphics, Angular, R, AI, Git, Data Science, Code Game, Tutorials, Programming, Web Development, Training, Learning, Quiz, Exercises, Courses, Lessons, References, Examples, Learn to code, Source code, Demos, Tips, Website')


@section('content')
    @include('frontend.home.partials.hero')
    @include('frontend.home.partials.search_bar')
    @include('frontend.home.partials.dashboard_home')
@stop
















