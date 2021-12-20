@extends('layouts.app')
@include('layouts.header')
@section('content')
<div class="container h-full pt-20 mx-auto">
    <div class="py-4">
        <a href="{{route('destination.create')}}" class="text-lg font-bold text-green-400 uppercase">Add</a>
    </div>
    <table class="table-fixed">
        <thead>
            <tr>
                <th class="w-1/2 ...">Name</th>
                <th class="w-1/4 ...">Price</th>
                <th class="w-1/4 ...">Slug</th>
                <th class="w-1/4 ...">Delete</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($destinations as $destination)
            <tr>
                <td><a href="{{route('destination.show', $destination->slug)}}">{{$destination->name}}</a></td>
                <td>{{$destination->price}}</td>
                <td>{{$destination->slug}}</td>
                <td>
                    <form class="d-inline-block" action="{{route('destination.destroy', $destination->slug)}}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="p-2 bg-green-300 rounded-lg">
                            Hapus
                        </button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@include('layouts.footer')

@endsection
