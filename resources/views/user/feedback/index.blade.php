@extends('layouts.userActions')
@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                <div class="card-body p-4">
                    @forelse($feedbackList as $feedbackItem)
                    <div class="card mb-4">
                        <div class="card-body">
                            <p>{{$feedbackItem->comment}}</p>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                    <p class="small mb-0 ms-2">{{$feedbackItem->username}}</p>
                                    <a href="{{route('user.feedback.edit', ['feedback' => $feedbackItem])}}">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="card-body">
                            <h3>There have no comments</h3>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

@endsection
