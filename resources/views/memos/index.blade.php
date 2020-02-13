@extends('layouts.app')

@section('content')

@include('errors.alert')

  <hr/>
  <h1>Memos</h1>
  <hr/>

  <!-- details card section starts from here -->
  <section class="details-card">
      <div class="container">
          <div class="row">
            @foreach($memos as $memo)
            @if($memo->user_id == Auth::id())
              <div class="col-md-4 card">
                  <div class="card-content">
                    <div class="card-desc">
                      <a href="{{ url('memos', $memo->id) }}">
                        {{ $memo->memo_title }}
                      </a>
                      <p>{{ $memo->memo_text }}</p>  
                    </div>
                  </div>
              </div>
            @endif
            @endforeach
          </div>
      </div>
  </section>
  @endsection