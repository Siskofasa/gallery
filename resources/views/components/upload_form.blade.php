@extends('components.master')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <h2 class="card-header w-100 m-1 text-center">Upload Image</h2>
        </div>
        <div class="row justify-content-center">
            {{-- enctype attribute is important if your form contains file upload --}}
            {{-- Please check https://www.w3schools.com/tags/att_form_enctype.asp for further info --}}
            <form class="m-2" method="post" action="{{route('post-file')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" id="title" placeholder="Enter file Name" name="title">
                    <br/>
                    <input type="text" class="form-control" id="description" placeholder="Enter description" name="description">
                    <br/>
                    <input type="text" class="form-control" id="category" placeholder="Enter category" name="category">
                </div>
                <div class="form-group">
                    <label for="image">Choose Image</label>
                    <input id="image" type="file" name="image">
                </div>
                <button type="submit" class="btn btn-dark d-block w-75 mx-auto">Upload</button>
            </form>
        </div>

        @include('components.errors')
    </div>
</x-app-layout>
