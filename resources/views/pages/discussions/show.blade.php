@extends('layouts.app')

@section('body')
    <section class="bg-gray pt-4 pb-5">
        <div class="container">
            <div class="mb-5">
                <div class="d-flex align-items-center">
                    <div class="d-flex">
                        <div class="fs-2 fw-bold color-gray me-2 mb-0">Discussions</div>
                        <div class="fs-2 fw-bold color-gray me-2 mb-0">></div>
                    </div>
                    <h2 class="mb-0">{{ $discussion->title }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8 mb-5 mb-lg-0">
                    <div class="card card-discussions mb-5">
                        <div class="row">
                            <div class="col-1 d-flex flex-column justify-content-start align-items-center">
                                <a id="discussion-like" href="javascript:;" data-liked="{{ $discussion->liked() }}">
                                    <img src="{{ $discussion->liked() ? $likedImage : $notLikedImage }}" 
                                        alt="Like" id="discussion-like-icon" class="like-icon mb-1">
                                </a>
                                <span id="discussion-like-count" class="fs-4 color-gray mb-1">{{ $discussion->likeCount }}</span>
                            </div>
                            <div class="col-11">
                                <p>
                                    {!! $discussion->content !!}
                                </p>
                                <div class="mb-3">
                                    <a href="{{ route('discussions.categories.show', $discussion->category->slug) }}"><span class="badge rounded-pill text-bg-light">{{ $discussion->category->slug }}</span></a>
                                </div>
                                <div class="row align-items-start justify-content-between">
                                    <div class="col">
                                        <span class="color-gray me-2">
                                            <a href="javascript:;" id="share-discussion"><small>Share</small></a>
                                            <input type="text" value="{{ route('discussions.show', $discussion->slug) }}" id="current-url" class="d-none">
                                        </span>

                                        @if ($discussion->user_id === auth()->id())
                                        <span class="color-gray me-2">
                                            <a href="{{ route('discussions.edit', $discussion->slug) }}">
                                                <small>Edit</small>
                                            </a>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-5 col-lg-3 d-flex">
                                        <a href="#" class="card-discussions-show-avatar-wrapper flex-shrink-0 rounded-circle overflow-hidden me-1">
                                            <img src="{{ filter_var($discussion->user->picture, FILTER_VALIDATE_URL) 
                                                ? $discussion->user->picture : Storage::url($discussion->user->picture) }}" 
                                                alt="" class="avatar">
                                        </a>
                                        <div class="fs-12px lh-1">
                                            <span class="text-primary">
                                                <a href="#" class="fw-bold d-flex align-items-start text-break mb-1">
                                                    {{ $discussion->user->username }}
                                                </a>
                                            </span>
                                            <span class="color-gray">{{ $discussion->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="mb-5">2 Answers</h3>

                    <div class="mb-5">

                        <div class="card card-discussions">
                            <div class="row">
                                <div class="col-1 d-flex flex-column justify-content-start align-items-center">
                                    <a href="#">
                                        <img src="{{ url('assets/images/like.png') }}" alt="Like" class="like-icon mb-1">
                                    </a>
                                    <span class="fs-4 color-gray mb-1">12</span>
                                </div>
                                <div class="col-11">
                                    <p>
                                        lorem ipsum dolor sit amet contecstur lorem ipsum dolor sit amet contecsturlorem ipsum dolor sit amet contecsturlorem ipsum dolor sit amet contecstur
                                    </p>
                                    <div class="row align-items-end justify-content-end">
                                        <div class="col-5 col-lg-3 d-flex">
                                            <a href="#" class="card-discussions-show-avatar-wrapper flex-shrink-0 rounded-circle overflow-hidden me-1">
                                                <img src="{{ url('assets/images/avatar.png') }}" alt="" class="avatar">
                                            </a>
                                            <div class="fs-12px lh-1">
                                                <span class="text-primary">
                                                    <a href="#" class="fw-bold d-flex align-items-start text-break mb-1">
                                                        dadang z
                                                    </a>
                                                </span>
                                                <span class="color-gray">5 hours ago</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-discussions">
                            <div class="row">
                                <div class="col-1 d-flex flex-column justify-content-start align-items-center">
                                    <a href="#">
                                        <img src="{{ url('assets/images/like.png') }}" alt="Like" class="like-icon mb-1">
                                    </a>
                                    <span class="fs-4 color-gray mb-1">12</span>
                                </div>
                                <div class="col-11">
                                    <p>
                                        lorem ipsum dolor sit amet contecstur lorem ipsum dolor sit amet contecsturlorem ipsum dolor sit amet contecsturlorem ipsum dolor sit amet contecstur
                                    </p>
                                    <div class="row align-items-end justify-content-end">
                                        <div class="col-5 col-lg-3 d-flex">
                                            <a href="#" class="card-discussions-show-avatar-wrapper flex-shrink-0 rounded-circle overflow-hidden me-1">
                                                <img src="{{ url('assets/images/avatar.png') }}" alt="" class="avatar">
                                            </a>
                                            <div class="fs-12px lh-1">
                                                <span class="text-primary">
                                                    <a href="#" class="fw-bold d-flex align-items-start text-break mb-1">
                                                        dadang z
                                                    </a>
                                                </span>
                                                <span class="color-gray">5 hours ago</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="fw-bold text-center">Please <a href="{{ route('auth.login.show') }}" 
                        class="text-primary">sign in</a> or <a href="{{ route('auth.sign-up.show') }}" class="text-primary">
                        create an account</a> to participate in this discussion.</div>

                </div>

                <div class="col-12 col-lg-4">
                    <div class="card">
                        <h3>All Categories</h3>
                        <div>
                            @foreach ($categories as $category)
                            <a href="{{ route('discussions.categories.show', $category->slug) }}">
                                <span class="badge rounded-pill text-bg-light">{{ $category->name }}</span>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('after-script')
<script>
    $(document).ready(function() {
        $('#share-discussion').click(function() {
            var copyText = $('#current-url');

            copyText[0].select();
            copyText[0].setSelectionRange(0, 99999);
            navigator.clipboard.writeText(copyText.val());

            var alert = $('#alert');
            alert.removeClass('d-none');

            var alertContainer = alert.find('.container');
            alertContainer.first().text('Link to this discussion copied successfully');
        });

        $('#discussion-like').click(function() {
            // dapatkan data apakah discussion ini sudah pernah dilike oleh user
            // tentukan route like ajax, berdasarkan dengan apakah ini sudah dilike atau belum
            // lakukan proses ajax
            // jika ajax berhasil maka dapatkan status jsonnya
            // jika statusnya success maka isi counter like dengan data counter like dari jsonnya
            // lalu kita ganti icon likenya berdasarkan dengan nilai variabel point 1
            // jika user sebelumnya sudah me-like, maka ganti icon jadi notLikedImage
            // jika user sebelumnya belum me-like, maka ganti icon jadi likedImage

            var isLiked = $(this).data('liked');
            var likeRoute = isLiked ? '{{ route("discussions.like.unlike", $discussion->slug) }}'
                : '{{ route("discussions.like.like", $discussion->slug) }}';

            $.ajax({
                method: 'POST',
                url: likeRoute,
                data: {
                    '_token': '{{ csrf_token() }}'
                }
            })
            .done(function(res) {
                if (res.status === 'success') {
                    $('#discussion-like-count').text(res.data.likeCount);

                    if (isLiked) {
                        $('#discussion-like-icon').attr('src', '{{ $notLikedImage }}');
                    }
                    else {
                        $('#discussion-like-icon').attr('src', '{{ $likedImage }}');
                    }

                    $('#discussion-like').data('liked', !isLiked);
                }
            })
        })
    })
</script>
@endsection