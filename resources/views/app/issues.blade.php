@extends('layout')

@section('content')
<h1 class="h4 mb-4">Issues</h1>

<p>There are {{ (int) count($issues) }} issues.</p>
@endsection
