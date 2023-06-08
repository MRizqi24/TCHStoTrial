@extends('layout.master')
@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- seo fact area end -->
            <br>
            @include('STO.create')
            @include('STO.modal.scan')
        </div>
    </div>
</div>

@endsection("content")
