@extends('layouts.app')

@section('body')
    <section class="bg-gray pt-4 pb-5">
        <div class="container">
            <div class="mb-5">
                <div class="d-flex align-items-center">
                    <div class="d-flex">
                        <div class="fs-2 fw-bold me-2 mb-0">
                            Answer a Question
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8 mb-5 mb-lg-0">
                    <div class="card card-discussions mb-5">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('answers.update', $answer->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="answer" class="form-label">Answer</label>
                                        <textarea class="form-control" id="answer" name="answer">{{ $answer->answer ?? old('answer') }}</textarea>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary me-4" type="submit">Submit</button>
                                        <a href="{{ route('discussions.show', $answer->discussion->slug) }}">Cancel</a>
                                    </div>
                                </form>
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
            $('#answer').summernote({
                placeholder: 'Your solution',
                tabSize: 2,
                height: 320,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link']],
                    ['view', ['codeview', 'help']],
                ]
            });

            $('span.note-icon-caret').remove();
        })
    </script>
@endsection