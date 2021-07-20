@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <form class="row g-3">
                <div class="col-auto">
                    <label for="search" class="visually-hidden">Amount</label>
                    <input type="number" name="amount" class="form-control" id="search" value="{{request()->get('amount')}}" placeholder="20">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Search</button>
                </div>
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rows as $row)
                    <tr>
                        <td>{{$row->id }}</td>
                        <td>{{$row->price }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
