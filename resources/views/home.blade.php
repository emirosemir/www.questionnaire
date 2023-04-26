@extends('layouts.app')
@section("title", "Dashboard")
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if(session("formSuccess"))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                            {{ session("formSuccess") }}
                        </div>
                    </div>
                @elseif(session("formUnsuccess"))
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div>
                            {{ session("formUnsuccess") }}
                        </div>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true" tabindex="0">Home</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-createQuestionnaire-tab" data-bs-toggle="pill" data-bs-target="#pills-createQuestionnaire" type="button" role="tab" aria-controls="pills-createQuestionnaire" aria-selected="false" tabindex="1">Create Questionnaire</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="4">
                                Welcome to Questionnaire!
                            </div>
                            <div class="tab-pane fade" id="pills-createQuestionnaire" role="tabpanel" aria-labelledby="pills-createQuestionnaire-tab" tabindex="4">
                                <form action="{{ route('createQuestionnaire') }}" method="POST">
                                    @CSRF
                                    <div class="mb-3">
                                        <label for="name" class="form-label ms-2">Name</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="multipleVotes" class="form-label ms-2">Can a user vote more than once?</label>
                                        <select id="multipleVotes" name="multipleVotes" class="form-select" aria-label="Default select example">
                                            <option selected>Select...</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <h4>Answers</h4>
                                    </div>
                                    <div class="answers">
                                        <div class="mb-2">
                                            <label for="answer-0" class="form-label ms-2">Answer 1</label>
                                            <input onchange="insertAnswersInput()" type="text" id="answer-0" class="form-control answer">
                                        </div>
                                        <div class="mb-2">
                                            <label for="answer-1" class="form-label ms-2">Answer 2</label>
                                            <input onchange="insertAnswersInput()" type="text" id="answer-1" class="form-control answer">
                                        </div>
                                        <input type="hidden" id="answers" name="answers">
                                    </div>
                                    <div class="mb-3">
                                        <button onclick="newAnswer()" type="button" class="btn btn-primary w-100">New Answer</button>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
