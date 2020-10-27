@extends('components.master')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div id="app">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <search-component search-route="{{route('search')}}" image-link="{{route('view-image', [ "selected_image" => "a"])}}"></search-component>
    </div>

</x-app-layout>
