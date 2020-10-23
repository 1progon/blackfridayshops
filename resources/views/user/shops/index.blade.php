@extends('layouts.admin-layout')
@section('main')

    <form method="get">
        @csrf
        <div class="form-row">
            <div class="form-group">
                <label for="admStatus">Adm Status Active</label>
                {{--        <input type="checkbox" name="admStatus" value="0" hidden>--}}
                <input type="checkbox" name="admStatus" id="admStatus" value="1" onchange="submit()"
                    {{ $admStatus == 1 ? 'checked' : ''  }}>
            </div>


            <div class="form-group">
                <label for="findBy"></label>
                <input type="text"
                       name="findBy"
                       id="findBy"
                       placeholder="Find By Slug, Id, Name"
                       value="{{ $filterBy ?? '' }}">
            </div>

        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Фильтр">
        </div>
    </form>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Created</th>
            <th scope="col">Name</th>
            <th scope="col">Slug</th>
            <th scope="col">Popular</th>
            <th scope="col">Admitad Status</th>
            <th scope="col">Adm Connection Status</th>
            <th scope="col">Description</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            <th scope="col">Deactivate</th>
        </tr>
        </thead>
        <tbody>
        @forelse( $shops as $shop)


            <tr>
                <th scope="row">{{ $shop->id }}</th>
                <th>{{ $shop->created_at }}</th>
                <td>{{ $shop->name }}</td>
                <td>{{ $shop->slug }}</td>
                <td>{{ $shop->popular === 1 ? 'V': ''  }}</td>
                <td>{{ $shop->adm_status  }}</td>
                <td>{{ $shop->adm_connection_status }}</td>
                <td>{{ Str::limit($shop->description, 80) }}</td>
                <td><a class="btn btn-primary" href="{{ route('shops.edit', $shop) }}">Edit</a></td>

                {{--TODO Need delete method form--}}
                <td>
                    <form class="remove-shop-form" action="{{ route('shops.destroy', $shop) }}"
                          method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </td>

                <td>
                    <form action="{{ route('shop.deactivate', $shop) }}" method="post">
                        @csrf
                        @if( $shop->adm_status == 'active')
                            <input class="btn btn-danger" type="submit" value="Deactivate">
                        @else
                            <input class="btn btn-success" type="submit" value="Activate">
                        @endif
                    </form>
                </td>
            </tr>


        @empty
        @endforelse


        </tbody>
    </table>

    {{ $shops->links() }}
@endsection

@section('scripts')
    <script>

        let removeForm = document.querySelectorAll('.remove-shop-form');
        removeForm.forEach(item => {
            item.addEventListener('submit', (e) => {
                onRemove(item, e);
            })
        });


        function onRemove(item, event) {
            event.preventDefault();
            let result = confirm('Точно удалить??');

            if (!result) {
                return;
            }

            item.submit();
        }
    </script>
@endsection
