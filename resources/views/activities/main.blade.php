@extends('layouts.app')

@section('content')
<div class="container">
  <h3>Your Activity Log</h3>
  @if($activities->isEmpty())
    <p>No activities recorded yet.</p>
  @else
    <table class="table">
      <thead>
        <tr>
          <th>When</th>
          <th>Action</th>
          <th>Target ID</th>
          <th>Active?</th>
        </tr>
      </thead>
      <tbody>
        @foreach($activities as $act)
          <tr>
            <td>{{ $act->created_at->diffForHumans() }}</td>
            <td>{{ Str::headline($act->last_activity_type) }}</td>
            <td>{{ $act->activity_id ? $act->activity_id : '-' }}</td>
            <td>{{ $act->is_active ? 'Yes' : 'No' }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @endif
</div>
@endsection