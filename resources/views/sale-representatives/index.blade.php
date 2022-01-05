<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sales Team Manager</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2 border mb-2">
        <div class="row">
            <div class="col-lg-12 margin-tb bg-light">
                <div class="float-left text-black">
                    <h2>Sales Team</h2>
                </div>

            </div>
            <div class="col-lg-12 margin-tb">
                <div class="float-right mb-2 mt-2">
                    <a class="btn btn-success" href="{{ route('sale-representatives.create') }}"> Add New</a>
                </div>

            </div>

        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>ß
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Telephone</th>
                <th>Current Route</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($saleRepresentatives as $saleRepresentative)
                <tr>
                    <td>{{ $saleRepresentative->id }}</td>
                    <td>{{ $saleRepresentative->name }}</td>
                    <td>{{ $saleRepresentative->email }}</td>
                    <td>{{ $saleRepresentative->telephone }}</td>
                    <td>{{ $saleRepresentative->current_route }}</td>
                    <td>
                        <form action="{{ route('sale-representatives.destroy', $saleRepresentative->id) }}"
                            method="Post">
                            <a class="btn btn-primary"
                                href="{{ route('sale-representatives.edit', $saleRepresentative->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        {!! $saleRepresentatives->links('pagination::bootstrap-4') !!}
</body>

</html>
