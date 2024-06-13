@extends('layouts.app')

@section('content')
<div class="card-body">
    <h1><i class="fas fa-user-circle"></i> Welcome, {{ Auth::user()->name }}!</h1>
    <p>This is your dashboard.</p>
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    <i class="far fa-calendar-alt"></i>
                    <div id="current-date" class="text-white-50 small"></div>
                    <p class="mb-0">Stay organized with your daily schedule.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    <i class="far fa-clock"></i>
                    <div id="current-time" class="text-white-50 small"></div>
                    <p class="mb-0">Current server time to keep you on track.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card bg-info text-white shadow">
                <div class="card-body">
                    <i class="fas fa-user-tag"></i>
                    <div class="text-white-50 small">{{ Auth::user()->role }}</div>
                    
                    @if(Auth::user()->role == 'superadmin')
                        <p>You can see all the menus on this website.</p>
                    @elseif(Auth::user()->role == 'admin')
                        <p>You handle damaged products, and create a return note to give to the product delivery party.</p>
                    @elseif(Auth::user()->role == 'warehouse')
                        <p>You handle checking newly purchased products to see whether the product is damaged or in good condition.</p>
                    @elseif(Auth::user()->role == 'shipment')
                        <p>You handle products that need to be returned to the supplier.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card-body i {
        font-size: 2rem;
    }
    .card-body p {
        margin-top: 10px;
    }
    .bg-primary {
        background: linear-gradient(135deg, #1e90ff 0%, #87cefa 100%);
    }
    .bg-success {
        background: linear-gradient(135deg, #28a745 0%, #98fb98 100%);
    }
    .bg-info {
        background: linear-gradient(135deg, #17a2b8 0%, #87ceeb 100%);
    }
</style>
@endpush
@push('scripts')
<script>
    function updateTime() {
        const now = new Date();
        const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        const day = days[now.getDay()];
        const date = now.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
        const time = now.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit', second: '2-digit' });

        document.getElementById('current-date').textContent = `${day}, ${date}`;
        document.getElementById('current-time').textContent = time;
    }

    setInterval(updateTime, 1000);
    updateTime(); 
</script>
@endpush