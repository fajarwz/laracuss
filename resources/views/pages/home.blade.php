@extends('layouts.app')

@section('body')
<section class="container hero">
  <div class="row align-items-center h-100">
    <div class="col-12 col-lg-6">
      <h1>The Laravel<br />Community Forum</h1>
      <p class="mb-4">Empowering the Laravel Community to connect, share and learn</p>
      <a href="{{ route('auth.sign-up.show') }}" class="btn btn-primary me-2 mb-2 mb-lg-0">Sign Up</a>
      <a href="{{ route('discussions.index') }}" class="btn btn-secondary mb-2 mb-lg-0">Join Discussions</a>
    </div>
    <div class="col-12 col-lg-6 h-315px order-first order-lg-last mb-3 mb-lg-0">
      <img class="hero-image float-lg-end" src="{{ url('assets/images/hero-image.png') }}" alt="">
    </div>
  </div>
</section>
<section class="container min-h-372px">
  <div class="row">
    <div class="col-12 col-lg-4 text-center">
      <img class="promote-icon mb-2" src="{{ url('assets/images/discussions.png') }}" alt="Discussions">
      <h2>{{ Str::plural('Discussion', $discussionCount) }}</h2>
      <p class="fs-3">{{ $discussionCount }}</p>
    </div>
    <div class="col-12 col-lg-4 text-center">
      <img class="promote-icon mb-2" src="{{ url('assets/images/answers.png') }}" alt="Answers">
      <h2>{{ Str::plural('Answer', $answerCount) }}</h2>
      <p class="fs-3">{{ $answerCount }}</p>
    </div>
    <div class="col-12 col-lg-4 text-center">
      <img class="promote-icon mb-2" src="{{ url('assets/images/users.png') }}" alt="Users">
      <h2>{{ Str::plural('User', $userCount) }}</h2>
      <p class="fs-3">{{ $userCount }}</p>
    </div>
  </div>
</section>
<section class="bg-gray">
  <div class="container py-80px">
    <h2 class="text-center mb-5">Help Others</h2>
    <div class="row">
      @forelse ($latestDiscussions as $latestDiscussion)
      <div class="col-12 col-lg-4 mb-3">
        <div class="card">
          <a href="{{ route('discussions.show', $latestDiscussion->slug) }}">
            <h3>{{ $latestDiscussion->title }}</h3>
          </a>
          <div>
            <p class="mb-5">
              {{ $latestDiscussion->content_preview }}
            </p>
            <div class="row">
              <div class="col me-1 me-lg-2">
                <a href="{{ route('discussions.categories.show', $latestDiscussion->category->slug) }}">
                  <span class="badge rounded-pill text-bg-light">{{ $latestDiscussion->category->name }}</span>
                </a>
              </div>
              <div class="col-5 col-lg-7">
                <div class="avatar-sm-wrapper d-inline-block">
                  <a href="{{ route('users.show', $latestDiscussion->user->username) }}" class="me-1">
                    <img src="{{ filter_var($latestDiscussion->user->picture, FILTER_VALIDATE_URL) 
                      ? $latestDiscussion->user->picture : Storage::url($latestDiscussion->user->picture) }}" 
                      class="avatar rounded-circle" alt="{{ $latestDiscussion->user->username }}">
                  </a>
                </div>
                <span class="fs-12px">
                  <a href="{{ route('users.show', $latestDiscussion->user->username) }}" class="me-1 fw-bold">
                    {{ 
                      strlen($latestDiscussion->user->username) > 7
                      ? substr($latestDiscussion->user->username , 0, 7) . '...'
                      : $latestDiscussion->user->username
                    }}
                  </a>
                  <span class="color-gray">{{ $latestDiscussion->created_at->diffForHumans() }}</span>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      @empty
          
      @endforelse
    </div>
  </div>
</section>
<section class="container min-h-372px d-flex flex-column align-items-center justify-content-center">
  <h2>Ready to contribute?</h2>
  <p class="mb-4">Want to make a big impact?</p>
  <div class="text-center">
    <a href="{{ route('auth.sign-up.show') }}" class="btn btn-primary me-2 mb-2 mb-lg-0">Sign Up</a>
    <a href="{{ route('discussions.index') }}" class="btn btn-secondary mb-2 mb-lg-0">Join Discussions</a>
  </div>
</section>
@endsection
      