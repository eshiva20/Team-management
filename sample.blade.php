@extends('admin::shiva.layout')

@section('page_title')
<!-- Page title -->
@stop

@push('css')
<!-- Any external css specific to the page -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/css/bootstrap-grid.min.css" />
<style>
/* style specific to the page */
</style>
@endpush

@section('content-wrapper')
<div class="content">
<h1>hello World</h1>
</div>
@stop

@push('scripts')
<!-- any external scripts for the page, don't forget type="module" -->
<script type="module" src="<externalscripts>"></script>
<script>
// js specific to the page
</script>
@endpush