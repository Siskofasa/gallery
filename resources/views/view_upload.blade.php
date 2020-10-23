@extends('components.master')
@include('components.nav')

<div class="table-responsive">
    <table class="table table-hover">
        @if($image)
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
            <tr>
                <td class="cs-p-1">{{$image->image_description}}</td>
            </tr>
        @else
            <p>The image could not be found. </p>
        @endif
    </table>
</div>
