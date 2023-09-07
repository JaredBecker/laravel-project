@if (session()->has('message'))
    <div x-show="show" x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" class="fixed top-0 left-1/2 transform bg-laravel -translate-x-1/2 text-white px-48 py-3">
        <p>
            {{ session('message') }}
        </p>
    </div>
@endif
