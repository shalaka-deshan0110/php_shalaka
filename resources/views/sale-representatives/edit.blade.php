@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card" style="">
            <div class="card-header">
                <h2>Edit Sales Representative</h2>
            </div>
            <div class="row">
                <div class="col-lg-12 margin-tb me-4">
                    <div class="float-end mt-2 me-4">
                        <a class="btn btn-success" href="{{ route('sale-representatives.index') }}"> Back to list</a>
                    </div>
                </div>
            </div>
            @if (session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('sale-representatives.update', $saleRepresentative->id) }}" method="POST" enctype="multipart/form-data"
                class="form-inline col-12 mx-auto px-2 ps-4 mt-5">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="id"><strong>ID:</strong></label>
                        <div class="col-sm-10">
                            <input type="text" id="id" class="form-control" value="{{ $saleRepresentative->id }}"
                                placeholder="Name" disabled>
                            @error('name')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">

                        <label class="col-sm-2 col-form-label" for="name"><strong>Name:</strong></label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" value="{{ $saleRepresentative->name }}"
                                placeholder="Name">
                            @error('name')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="email"><strong>Email:</strong></label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" value="{{ $saleRepresentative->email }}"
                                placeholder="Email">
                            @error('email')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="telephone"><strong>Telephone:</strong></label>
                        <div class="col-sm-10">
                            <input type="text" name="telephone" class="form-control" value="{{ $saleRepresentative->telephone }}"
                                placeholder="Telephone">
                            @error('telephone')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="joined_date"><strong>Joined Date:</strong></label>
                        <div class="col-sm-10">
                            <input type="date" name="joined_date" class="form-control" value="{{ $saleRepresentative->joined_date }}"
                                placeholder="Joined Date">
                            @error('joined_date')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="current_route"><strong>Current Route:</strong></label>
                        <div class="col-sm-10">
                            <input type="text" name="current_route" class="form-control" value="{{ $saleRepresentative->current_route }}"
                                placeholder="Current Route">
                            @error('current_route')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="comment"><strong>Comment:</strong></label>
                        <div class="col-sm-10">
                            <textarea rows="5" name="comment" class="form-control" value="{{ $saleRepresentative->comment }}"
                                placeholder="Comment">{{ $saleRepresentative->comment }}</textarea>
                            @error('comment')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                </div>
                <br>
                <br>
                <div class="col-lg-12 margin-tb">
                    <div class="float-end">
                        <button type="submit" class="btn btn-success float-end px-4 mb-2 me-4 ">Save</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
