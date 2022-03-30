@extends('admin.layouts.index')

@section('title_page')
    Unreviewed Reports
@endsection

@section('container')
    <div id="ajax-container"></div>
@endsection 

@section('ajax_script')
    <script src="/js/ajax.js"></script>
@endsection