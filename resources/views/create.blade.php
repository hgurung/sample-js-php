@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <form method="POST" action="{{url('/store')}}" id="createPostForm">
                <div class="mb-3">
                    <div class="col-sm-6 row success" id="success">

                    </div>
                </div>
                <div class="mb-3">
                    <div class="col-sm-6 row errors" id="errors">

                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="id" class="col-sm-2 col-form-label">ID</label>
                    <div class="col-sm-4">
                        <input type="number" name="id" class="form-control" id="id" placeholder="110">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="value" class="col-sm-2 col-form-label">Value</label>
                    <div class="col-sm-4">
                        <input type="text" name="value" class="form-control" id="value" placeholder="Only Values">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="value" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-primary mb-3">Submit</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
@endsection
