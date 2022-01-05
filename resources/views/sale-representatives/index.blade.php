@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h2>Sales Team</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="float-right mb-2 mt-2">
                                <a class="btn btn-success" href="{{ route('sale-representatives.create') }}"> Add New</a>
                            </div>

                        </div>

                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <table class="table table-bordered px-2">
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

                                        <a class="btn btn-warning" data-toggle="modal" id="mediumButton"
                                            data-target="#mediumModal"
                                            data-attr="{{ route('sale-representatives.show', $saleRepresentative->id) }}"
                                            title="show">Show</a>
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
                </div>
            </div>
        </div>
    </div>

    <!-- medium modal -->
    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="mediumBody">
                    <div>
                        <!-- the result to be displayed apply here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            // display a modal (medium modal)
            $(document).on('click', '#mediumButton', function(event) {
                alert("hi");
                // event.preventDefault();
                // let href = $(this).attr('data-attr');
                // $.ajax({
                //     url: href,
                //     beforeSend: function() {
                //         $('#loader').show();
                //     },
                //     // return the result
                //     success: function(result) {
                //         $('#mediumModal').modal("show");
                //         $('#mediumBody').html(result).show();
                //     },
                //     complete: function() {
                //         $('#loader').hide();
                //     },
                //     error: function(jqXHR, testStatus, error) {
                //         console.log(error);
                //         alert("Page " + href + " cannot open. Error:" + error);
                //         $('#loader').hide();
                //     },
                //     timeout: 8000
                // })
            });
        </script>
    @endpush

@endsection
