@extends('Back.master')

@section('title')
    Survey Question Edit
@endsection


@section('content')

    <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">

                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h5>Survey Question & Answer Edit</h5>
                        <a class="btn btn-sm btn-dark float-right mb-3" href="{{ route('surv_questions') }}">
                            <i class="fas fa-list"></i> Survey Question List
                        </a>
                    </div>
                </div>
            </div>
            {{--<div class="widget-content widget-content-area">--}}
            <div class="offset-1 col-xl-10 col-md-10 col-sm-10 col-10">
                <form action="{{ route('surv_questions_update',$question) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Question<sup style="color:red;" title="Must fill out this">*</sup></label>
                                <input type="text" value="{{ $question->question }}" class="form-control @error('question') is-invalid @enderror" name="question"  placeholder="Suervey Quetions">
                            </div>
                            @error('question')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Answer<sup style="color:red;" title="Must fill out this">*</sup></label>
                                <input type="text" value="{{ $question->answer }}" class="form-control @error('answer') is-invalid @enderror" name="answer"  placeholder="Question answer">
                            </div>
                            @error('answer')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Answer Two<sup style="color:red;" title="Must fill out this">*</sup></label>
                                <input type="text" value="{{ $question->ans_two }}" class="form-control @error('ans_two') is-invalid @enderror" name="ans_two"  placeholder="Answer two">
                            </div>
                            @error('ans_two')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Answer Three<sup style="color:red;">(optional)</sup></label>
                                <input type="text" value="{{ $question->ans_three }}" class="form-control @error('ans_three') is-invalid @enderror" name="ans_three"  placeholder="Answer three">
                            </div>
                            @error('ans_three')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Answer Four<sup style="color:red;">(optional)</sup></label>
                                <input type="text" value="{{ $question->ans_four }}" class="form-control @error('ans_four') is-invalid @enderror" name="ans_four"  placeholder="Answer four">
                            </div>
                            @error('ans_four')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Answer Five<sup style="color:red;">(optional)</sup></label>
                                <input type="text" value="{{ $question->ans_five }}" class="form-control @error('ans_five') is-invalid @enderror" name="ans_five"  placeholder="Answer five">
                            </div>
                            @error('ans_five')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Answer Six<sup style="color:red;">(optional)</sup></label>
                                <input type="text" value="{{ $question->ans_six }}" class="form-control @error('ans_six') is-invalid @enderror" name="ans_six"  placeholder="Answer six">
                            </div>
                            @error('ans_six')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Answer Seven<sup style="color:red;">(optional)</sup></label>
                                <input type="text" value="{{ $question->ans_seven }}" class="form-control @error('ans_seven') is-invalid @enderror" name="ans_seven"  placeholder="Answer seven">
                            </div>
                            @error('ans_seven')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Answer Eight<sup style="color:red;">(optional)</sup></label>
                                <input type="text" value="{{ $question->ans_eight }}" class="form-control @error('ans_eight') is-invalid @enderror" name="ans_eight"  placeholder="Answer eight">
                            </div>
                            @error('ans_eight')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Answer Nine<sup style="color:red;">(optional)</sup></label>
                                <input type="text" value="{{ $question->ans_nine }}" class="form-control @error('ans_nine') is-invalid @enderror" name="ans_nine"  placeholder="Answer nine">
                            </div>
                            @error('ans_nine')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="name">Answer Ten<sup style="color:red;">(optional)</sup></label>
                                <input type="text" value="{{ $question->ans_ten }}" class="form-control @error('ans_ten') is-invalid @enderror" name="ans_ten"  placeholder="Answer ten">
                            </div>
                            @error('ans_ten')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" style="width: 150px;height: 41px;" class="btn btn-dark float-right">Update</button>
                        </div>
                    </div>

                </form>
            </div>
            {{-- </div>--}}
        </div>
    </div>

@endsection
