@extends('layout.main')

@section('content')
    <div class="container">
        <table id="table_id" class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Brief</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Row 1</td>
                    <td>Row 12</td>
                    <td>
                        <button class="btn btn-outline-secondary" id="buy">Edit</button>
                        <button class="btn btn-outline-secondary" id="buy">Delete</button>
                        <button class="btn btn-outline-secondary" id="buy">Add</button>
                    </td>
                </tr>
                <tr>
                    <td>Row 20</td>
                    <td>Row 23</td>
                    <td>
                        <button class="btn btn-outline-secondary" id="buy">Edit</button>
                        <button class="btn btn-outline-secondary" id="buy">Delete</button>
                        <button class="btn btn-outline-secondary" id="buy">Add</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
