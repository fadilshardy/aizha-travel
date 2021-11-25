    <!-- CSRF Token -->
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Document</title>
    </head>
    <body>

        <div class="container mx-auto">
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
                        <td><a href="{{route('destination.show', $destination->id)}}">{{$destination->name}}</a></td>
                        <td>{{$destination->price}}</td>
                        <td>{{$destination->slug}}</td>
                        <td>
                            <form class="d-inline-block" action="{{route('destination.destroy', $destination->id)}}" method="POST">
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

    </body>
    </html>
