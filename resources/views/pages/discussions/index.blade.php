@extends('layouts.app')

@section('body')
<section class="bg-gray pt-4 pb-5">
    <div class="container">
        <div class="mb-4">
            <div class="mb-3 d-flex align-items-center justify-content-between">
                <h2 class="me-4 mb-0">
                    All Discussions
                </h2>
                <div>
                    51,875 Discussions
                </div>
            </div>
            <a href="#" class="btn btn-primary">Log In to Create Discussion</a>
        </div>
        <div class="row">
            <div class="col-12 col-lg-8 mb-5 mb-lg-0">
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
                            <a href="#">
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
                            <a href="#">
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
                            <a href="#">
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
            <div class="col-12 col-lg-4">
                <div class="card">
                    <h3>All Categories</h3>
                    <div>
                        <a href="#">
                            <span class="badge rounded-pill text-bg-light">Eloquent</span>
                            <span class="badge rounded-pill text-bg-light">Facade</span>
                            <span class="badge rounded-pill text-bg-light">Helper</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection