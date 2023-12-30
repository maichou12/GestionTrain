{{-- message success --}}
@if (Session::has('success'))
<div class="alert alert-success text-center" role="alert">
      {{ Session::get('success') }}
</div>
@endif
{{-- message d'erreur warning  --}}
@if (Session::has('warning'))
<div class="alert alert-warning text-center" role="alert">
    {{ Session::get('warning') }}
</div>
@endif

{{-- message d'erreur danger --}}
@if (Session::has('danger'))
<div class="alert alert-danger text-center" role="alert">
      {{ Session::get('danger') }}
</div>
@endif
