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
                        @if(!$rows->isEmpty())
                            @foreach($rows as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->price }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td><strong>Total</strong></td>
                                <td colspan="3">{{ $total}}</td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="4"><p class="text text-info">No data was found</p></td>
                            </tr>
                            
                        @endif
                    </tbody>
                </table>
           
        </div>
    </div>
@endsection
