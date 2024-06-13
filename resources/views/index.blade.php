@extends('layouts.app')

@section('content')
<div class="card-body">
    <h1>Welcome, Douglas McGee!</h1>
    <p>This is your dashboard.</p>
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    Primary Card
                    <div class="text-white-50 small">#4e73df</div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    Success Card
                    <div class="text-white-50 small">#1cc88a</div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card bg-info text-white shadow">
                <div class="card-body">
                    Info Card
                    <div class="text-white-50 small">#36b9cc</div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card bg-warning text-white shadow">
                <div class="card-body">
                    Warning Card
                    <div class="text-white-50 small">#f6c23e</div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card bg-danger text-white shadow">
                <div class="card-body">
                    Danger Card
                    <div class="text-white-50 small">#e74a3b</div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card bg-secondary text-white shadow">
                <div class="card-body">
                    Secondary Card
                    <div class="text-white-50 small">#858796</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
