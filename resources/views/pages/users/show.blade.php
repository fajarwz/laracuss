@extends('layouts.app')

@section('body')
    <section class="bg-gray pt-4 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4 mb-5 mb-lg-0">
                    <div class="d-flex mb-4">
                        <div class="avatar-wrapper rounded-circle overflow-hidden flex-shrink-0 me-4">
                            <img src="{{ url('assets/images/avatar.png') }}" alt="" class="avatar">
                        </div>
                        <div>
                            <div class="mb-4">
                                <div class="fs-2 fw-bold mb-1 lh-1 text-break">
                                    fajarwz
                                </div>
                                <div class="color-gray">
                                    Member since 1 year ago
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <input type="text" id="current-url" class="d-none" value="{{ request()->url() }}">
                        <a id="share-profile" class="btn btn-primary me-4" href="javascript:;">Share</a>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="mb-5">
                        <h2 class="mb-3">My Discussions</h2>
                        <div>
                            <div class="card card-discussions">
                                <div class="row">
                                    <div class="col-12 col-lg-2 mb-1 mb-lg-0 d-flex flex-row flex-lg-column align-items-end">
                                        <div class="text-nowrap me-2 me-lg-0">
                                            3 Likes
                                        </div>
                                        <div class="text-nowrap color-gray">
                                            9 Answers
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-10">
                                        <a href="{{ route('discussions.show') }}">
                                            <h3>How to add a custom validation in laravel?</h3>
                                        </a>
                                        <p>I am working on a blogging application in Laravel 8. There are 4 user roles, among which, the "...</p>
                                        <div class="row">
                                            <div class="col me-1 me-lg-2">
                                                <a href="#">
                                                    <span class="badge rounded-pill text-bg-light">Eloquent</span>
                                                </a>
                                            </div>
                                            <div class="col-5 col-lg-4">
                                                <div class="avatar-sm-wrapper d-inline-block">
                                                    <a href="#" class="me-1">
                                                        <img src="{{ url('assets/images/avatar-sm.png') }}" alt="Fajarwz" class="avatar rounded-circle">
                                                    </a>
                                                </div>
                                                <span class="fs-12px">
                                                    <a href="#" class="me-1 fw-bold">
                                                        Fajarwz
                                                    </a>
                                                    <span class="color-gray">7 hours ago</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-discussions">
                                <div class="row">
                                    <div class="col-12 col-lg-2 mb-1 mb-lg-0 d-flex flex-row flex-lg-column align-items-end">
                                        <div class="text-nowrap me-2 me-lg-0">
                                            3 Likes
                                        </div>
                                        <div class="text-nowrap color-gray">
                                            9 Answers
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-10">
                                        <a href="{{ route('discussions.show') }}">
                                            <h3>How to add a custom validation in laravel?</h3>
                                        </a>
                                        <p>I am working on a blogging application in Laravel 8. There are 4 user roles, among which, the "...</p>
                                        <div class="row">
                                            <div class="col me-1 me-lg-2">
                                                <a href="#">
                                                    <span class="badge rounded-pill text-bg-light">Eloquent</span>
                                                </a>
                                            </div>
                                            <div class="col-5 col-lg-4">
                                                <div class="avatar-sm-wrapper d-inline-block">
                                                    <a href="#" class="me-1">
                                                        <img src="{{ url('assets/images/avatar-sm.png') }}" alt="Fajarwz" class="avatar rounded-circle">
                                                    </a>
                                                </div>
                                                <span class="fs-12px">
                                                    <a href="#" class="me-1 fw-bold">
                                                        Fajarwz
                                                    </a>
                                                    <span class="color-gray">7 hours ago</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h2 class="mb-3">My Answers</h2>
                        <div>
                            <div class="card card-discussions">
                                <div class="row align-items-center">
                                    <div class="col-2 col-lg-1 text-center">
                                        12
                                    </div>
                                    <div class="col">
                                        <span>Replied to</span>
                                        <span class="fw-bold text-primary">
                                            <a href="#">
                                                How to add a custom validation in Laravel
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-discussions">
                                <div class="row align-items-center">
                                    <div class="col-2 col-lg-1 text-center">
                                        12
                                    </div>
                                    <div class="col">
                                        <span>Replied to</span>
                                        <span class="fw-bold text-primary">
                                            <a href="#">
                                                How to add a custom validation in Laravel
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
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
        $('#share-profile').click(function() {
            var copyText = $('#current-url');

            copyText[0].select();
            copyText[0].setSelectionRange(0, 99999);
            navigator.clipboard.writeText(copyText.val());

            var alert = $('#alert');
            alert.removeClass('d-none');

            var alertContainer = alert.find('.container');
            alertContainer.first().text('Link to this discussion copied successfully');
        })
    })
</script>
@endsection