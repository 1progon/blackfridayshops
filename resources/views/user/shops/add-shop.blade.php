@extends('layouts.admin-layout')

@section('main')

    <div class="container">
        <h2>Добавить магазин</h2>
        <form action="{{ route('shops.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name">
            </div>

            <div class="form-group">
                <label for="adm_id">Admitad Id</label>
                <input class="form-control" type="text" name="adm_id" id="adm_id" required>
            </div>

            <div class="form-group">
                <label for="adm_image">Admitad Image Link</label>
                <input class="form-control" type="text" name="adm_image" id="adm_image" required>
            </div>

            <div class="form-group">
                <label for="adm_connection_status">Admitad Connection Status</label>
                <select class="custom-select" name="adm_connection_status" id="adm_connection_status" required>
                    <option value="active" selected="selected">Active</option>
                    <option value="pending">Pending</option>
                    <option value="declined">Declined</option>
                </select>
            </div>

            <div class="form-group">
                <label for="adm_status">Admitad status</label>
                <select name="adm_status" id="adm_status" class="custom-select">
                    <option value="active" selected>Активный</option>
                    <option value="disabled">Не активный</option>

                </select>
            </div>

            <div class="form-group">
                <label for="adm_modified_date">Admitad Modified Date</label>
                <input class="form-control" type="date" name="adm_modified_date" id="adm_modified_date" required>
            </div>

            <div class="form-group">
                <div class="form-check">

                    <input class="form-check-input"
                           checked="checked"
                           type="radio"
                           name="popular"
                           id="not-popular"
                           value="0">
                    <label class="form-check-label" for="not-popular">Not Popular</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input"
                           type="radio"
                           name="popular"
                           id="popular"
                           value="1">
                    <label class="form-check-label" for="popular">Popular</label>
                </div>
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input class="form-control" type="text" name="slug" id="slug">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" rows="5"></textarea>
            </div>

            <div class="form-group">
                <label for="website">Website</label>
                <input class="form-control" type="text" name="website" id="website">
            </div>

            <div class="form-group">
                <label for="adm_gotolink">Admitad GoTo Link</label>
                <input class="form-control" type="text" name="adm_gotolink" id="adm_gotolink" required>
            </div>

            <div class="form-group">
                <label for="rating">Rating</label>
                <input class="form-control" type="text" name="rating" id="rating">
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input class="form-control" type="text" name="phone" id="phone">
            </div>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Добавить магазин">
            </div>


        </form>
    </div>


@endsection
