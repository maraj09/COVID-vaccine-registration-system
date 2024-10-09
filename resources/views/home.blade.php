@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Dashboard') }}</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            <p>{{ __('You are logged in!') }}</p>

            <hr>

            <h5 class="my-3">User Information:</h5>
            <p class="fs-4"><strong>Email:</strong> {{ $user->email }}</p>
            <p class="fs-4"><strong>NID Number:</strong> {{ $user->nid }}</p>

            @php
              $registration = $user->registration;
            @endphp
            @if ($registration)
              <h4 class="fs-4"><strong>Registration Status:</strong>
                @if ($registration->status === 'Not registered')
                  <span class="badge text-bg-secondary">Not registered</span>
                @elseif($registration->status === 'Not scheduled')
                  <span class="badge text-bg-warning">Not scheduled</span>
                @elseif($registration->status === 'Scheduled')
                  <span class="badge text-bg-info">Scheduled for
                    {{ \Carbon\Carbon::parse($registration->scheduled_date)->format('F j, Y') }}</span>
                @elseif($registration->status === 'Vaccinated')
                  <span class="badge text-bg-success">Vaccinated</span>
                @endif
              </h4>
            @else
              <p><strong>Registration Status:</strong> <span class="badge text-bg-secondary">Not registered</span></p>
            @endif
            <p class="fs-4"><strong>Center:</strong> {{ $user->registration->vaccineCenter->name }},
              {{ $user->registration->vaccineCenter->location }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
