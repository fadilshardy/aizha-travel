@extends('layouts.app')
@extends('layouts.header')
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
    <h1 class="text-8xl">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsa voluptatum nam eveniet ea, vel amet nesciunt corporis, ducimus blanditiis qui, quaerat corrupti magni! Dolores, quae ex! Fugit ullam harum dolorem eveniet obcaecati laudantium ut quasi at modi in rerum ab et iure, fuga vitae optio veritatis nihil distinctio fugiat quia asperiores. Impedit iure, voluptatibus placeat laudantium aperiam eaque quos nihil sunt, officia facilis ut tenetur soluta debitis officiis temporibus et dolor. Officia qui libero aliquid ea in repellat veritatis voluptatum ullam, eaque mollitia, repudiandae incidunt porro. Vel amet cumque in voluptates repellendus, laboriosam tenetur odio. Sapiente dolores nemo officia pariatur aliquid maiores quae minima consequuntur ea fugiat id similique blanditiis, expedita nisi eveniet tenetur natus, atque dignissimos, saepe voluptates voluptas. Odit debitis ipsum aspernatur iusto vero fugit temporibus numquam earum quidem dolore error possimus ex saepe voluptatum dolores ullam quis, harum ut praesentium laboriosam repellendus molestias! Quibusdam recusandae nesciunt molestiae vel ad praesentium, hic, in adipisci possimus atque fugit sequi? Neque porro, quis minima expedita enim molestiae, perspiciatis nostrum excepturi aperiam et unde quasi voluptas, dolorum officia aliquam fuga sequi! Nostrum rem voluptate officia illum, quae maiores dolorem sapiente nesciunt dignissimos deserunt ducimus cumque praesentium, pariatur eum molestiae magni distinctio quam veritatis veniam delectus impedit provident! Quod eius officia corrupti necessitatibus nam labore dolorem, corporis iste voluptas! Qui totam optio laboriosam perferendis reprehenderit facere modi dolorum saepe culpa numquam magni assumenda nobis est voluptates autem, commodi quo nisi consequatur consectetur voluptatibus. Cupiditate saepe laboriosam modi maiores odit possimus a corporis molestias quod iste eligendi quae voluptates autem aut, adipisci, amet ratione exercitationem. Consectetur, ipsa voluptas. A enim velit dolore reiciendis. Aliquam obcaecati vel autem reiciendis recusandae ratione ipsum ut eum quas nihil at nam accusamus molestiae nisi dolores ipsam, consectetur provident quo quod amet nulla qui doloribus maiores! Culpa esse nam iusto nemo et hic asperiores animi voluptates necessitatibus voluptas voluptatibus ipsa voluptate magni, ullam temporibus ratione, accusantium maxime voluptatem ab dignissimos blanditiis alias molestiae? Non doloremque aperiam nam eos soluta, obcaecati cupiditate quisquam ipsam et illo nihil, pariatur labore facilis. Reprehenderit voluptates rerum recusandae numquam deserunt odio, dicta culpa voluptatem commodi, quia omnis totam placeat unde fugiat velit corporis amet nam id sequi soluta illum nihil, maiores fuga. Harum veniam soluta impedit vitae magnam? Blanditiis nemo labore aut obcaecati? Doloribus, molestiae a. Quasi excepturi consequuntur iste, quia magni nulla rerum minus sapiente impedit dolor obcaecati molestiae libero est esse ipsam quas pariatur reiciendis! Laborum exercitationem in ducimus vero quia esse quae harum quod, consequuntur inventore veniam voluptates enim quisquam odit distinctio cumque, iure consequatur doloribus eius repellendus placeat. Eaque rerum eius, necessitatibus quod cupiditate nisi illo asperiores placeat. Corporis doloremque eius natus sunt amet aspernatur dolorum laboriosam voluptate quod accusantium excepturi labore ducimus nesciunt, quibusdam minus veniam illum sint quisquam molestias magni minima eos fugit optio. Quaerat similique doloribus repudiandae nesciunt eos earum maxime debitis in aut enim ab, dolores repellat fugiat commodi placeat modi maiores. Nihil similique, soluta vitae pariatur, cum rerum omnis aliquid, voluptates sapiente tenetur doloribus?</h1>
    <h1>tes</h1>
    <h1>tes</h1>
    <h1>tes</h1>
    <h1>tes</h1>
    <h1>tes</h1>
    <h1>tes</h1>
    <h1>tes</h1>
    <h1>tes</h1>
    <h1>tes</h1>
    <h1>tes</h1>
    <h1>tes</h1>
    <h1>tes</h1>
    <h1>tes</h1>
    <h1>tes</h1>
    <h1>tes</h1>
    <h1>tes</h1>
    <h1>tes</h1>
    <h1>tes</h1>
    <h1>tes</h1>
    <h1>tes</h1>
    <h1>tes</h1>
    <h1>tes</h1>

</div>
@endsection
