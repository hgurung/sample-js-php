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
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!$rows->isEmpty())
                            @foreach($rows as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->price }}</td>
                                <td>
                                    <button class="btn btn-primary copy-btn" data-data="{{json_encode($row)}}" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                                            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                                            <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td><strong>Total</strong></td>
                                <td colspan="4">{{ $total}}</td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="5"><p class="text text-info">No data was found</p></td>
                            </tr>
                            
                        @endif
                    </tbody>
                </table>
           
        </div>
    </div>
@endsection
