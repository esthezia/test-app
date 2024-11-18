@extends('layout')

@section('content')
<h1 class="h4 mb-4">Users</h1>

<p>There are {{ count($users) }} users.</p>
@endsection
