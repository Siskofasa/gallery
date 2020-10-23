@extends('components.master')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="content">
        <div class="searchbar">
            <form action="/search" method="POST" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" name="q"  width="60%" placeholder="Search Image">
                    <span class="input-group-btn">
                <button type="button" class="btn btn-default btn-sm">
                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                    </svg>
                </button>
            </span>
                </div>
            </form>
        </div>


        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="cs-p-1">Name</th>
                    <th class="cs-p-1">Image</th>
                    <th class="cs-p-1">User</th>
                    <th class="cs-p-1">Date</th>
                </tr>
                </thead>

                @forelse($images as $image)
                    <tr>
                        <td class="cs-p-1">{{ $image->image_title }}</td>
                        <td class="cs-p-1"><a href="{{ route('view-image', [ "selected_image" => $image->id]) }}">View Image</a></td>
                        <td class="cs-p-1">{{ $image->image_category }}</td>
                    </tr>
                @empty
                    <p>No Images at the moment</p>
                @endforelse
            </table>
        </div>
    </div>


</x-app-layout>
