@extends('components.master')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <h2 class="card-header w-100 m-1 text-center">Manage content</h2>
        </div>

        <div id="app">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <manage-component :temp-images="{{$images}}"
                              image-link="{{route('view-image', [ "selected_image" => "a"])}}"
                              update-visibility-route="{{route('update-visibility')}}"
                              delete-image-route="{{route('delete-image')}}"
            >
            </manage-component>
        </div>

    </div>

</x-app-layout>

