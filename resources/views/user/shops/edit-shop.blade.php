@extends('layouts.admin-layout')

@section('main')

    <div class="container">

        <h2>Редактировать магазин {{ $shop->id }}</h2>
        <form action="{{ route('shops.update', $shop) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ $shop->name }}">
            </div>

            <div class="form-group">
                <label for="adm_id">Admitad Id</label>
                <input class="form-control"
                       type="text"
                       name="adm_id"
                       id="adm_id"
                       readonly
                       required
                       value="{{ $shop->adm_id }}">
            </div>

            <div class="form-group">
                <label for="adm_image">Admitad Image Link</label>
                <input class="form-control" type="text" name="adm_image" id="adm_image" required
                       value="{{ $shop->adm_image }}">
            </div>

            <div class="form-group">
                <label for="adm_connection_status">Admitad Connection Status</label>
                <select class="custom-select" name="adm_connection_status" id="adm_connection_status" required>
                    <option value="active" {{ $shop->adm_connection_status == 'active' ? 'selected' : '' }}>Active
                    </option>
                    <option value="pending" {{ $shop->adm_connection_status == 'pending' ? 'selected' : ''
                }}>Pending
                    </option>
                    <option value="declined" {{ $shop->adm_connection_status == 'declined' ? 'selected' : ''
                }}>Declined
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="adm_status">Admitad status</label>
                <select name="adm_status" id="adm_status" class="custom-select">
                    <option value="active" {{ $shop->adm_status === 'active' ? 'selected' : '' }}>Активный</option>
                    <option value="disabled" {{ $shop->adm_status === 'disabled' ? 'selected' : '' }}>Не активный
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="adm_modified_date">Admitad Modified Date</label>
                <input class="form-control"
                       type="text"
                       name="adm_modified_date"
                       id="adm_modified_date"
                       readonly
                       value="{{ $shop->adm_modified_date }}">
            </div>

            <div class="form-group">

                <div class="form-check">

                    <input class="form-check-input"
                           {{ $shop->popular === 0 ? 'checked' : '' }}
                           type="radio"
                           name="popular"
                           id="not-popular"
                           value="0">
                    <label class="form-check-label" for="not-popular">Not Popular</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input"
                           {{ $shop->popular === 1 ? 'checked' : '' }}
                           type="radio"
                           name="popular"
                           id="popular"
                           value="1">
                    <label class="form-check-label" for="popular">Popular</label>
                </div>
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input class="form-control" type="text" name="slug" id="slug" value="{{ $shop->slug }}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description"
                          rows="5">{{ $shop->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="website">Website</label>
                <input class="form-control" type="text" name="website" id="website" value="{{ $shop->website }}">
            </div>

            <div class="form-group">
                <label for="adm_gotolink">Admitad GoTo Link</label>
                <input class="form-control" type="text" name="adm_gotolink" id="adm_gotolink" required
                       value="{{ $shop->adm_gotolink }}">
            </div>

            <div class="form-group">
                <label for="rating">Rating</label>
                <input class="form-control" type="text" name="rating" id="rating" value="{{ $shop->rating }}">
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input class="form-control" type="text" name="phone" id="phone" value="{{ $shop->phone }}">
            </div>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Изменить магазин">
            </div>


        </form>
    </div>


@endsection
