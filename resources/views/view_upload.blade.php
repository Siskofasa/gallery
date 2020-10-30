@extends('components.master')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<div id="app">
    <div class="content">
        <div class="table-responsive">
            <table class="table table-hover">
                @if($image->is_visible)
                    <thead>
                    <tr>
                        <th class="cs-p-1">{{$image->image_title}}</th>
                    </tr>
                    <tr>
                        <td class="cs-p-1"><i>{{$image->image_category}}</i></td>
                    </tr>
                    </thead>
                    <tr>
                        <td class="cs-p-1"><img src="{{$image->image_link}}"></td>
                    </tr>
                    @if(Auth::user())
                    <tr>
                        <td class="cs=p=11">
                            {{--Hier komt nog de route naar de controller die de like danwel unlike verwerkt--}}
                            <like-component like-route="{{route('like')}}"
                                            user-id="{{Auth::user()->id}}"
                                            image-id="{{$image->id}}"
                                            :temp-like-count="{{$image->likes()->count()}}"
                                            :temp-like-exists="{{$like_exists ? 'true' : 'false'}}"
                            ></like-component>
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <td class="cs-p-1">{{$image->image_description}}</td>
                    </tr>
                @else
                    <p>The image could not be found. </p>
                @endif
            </table>
        </div>
    </div>
</div>


</x-app-layout>
