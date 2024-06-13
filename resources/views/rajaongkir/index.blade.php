@extends('layouts.app')

@section('content')
<div class="card-body">
    <h1 class="h3 mb-4 text-gray-800">City</h1>
    <div class="table-responsive mt-4 mt-xl-0">
        <table id="cities-table" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>City Name</th>
                    <th>Province</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cities['rajaongkir']['results'] as $city)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $city['city_name'] }}</td>
                    <td>{{ $city['province'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#cities-table').DataTable();
    });
</script>
@endpush
