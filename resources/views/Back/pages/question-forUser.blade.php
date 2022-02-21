@extends('Back.master')

@section('title','Questions')

@section('content')

    {{-- <div class="container"> --}}
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">

                @foreach ($serveyQuestions as $serQue)



                    <div class="col-xl-12 col-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <form action="{{ route('user_ans') }}" method="post">
                                @csrf
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>{{ $serQue->question }}</h4>
                                            <input type="hidden" value="{{ auth()->user()->id }}" name="user_id" >
                                            <input type="hidden" value="{{ $serQue->id }}" name="question_id" >
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area" style="border: none;margin-left: 21px;">
                                    {{-- <h5 class="mb-4">Use class to make classic.</h5> --}}

                                    <div class="n-chk">
                                        <label class="new-control new-radio radio-classic-success">
                                        <input type="radio" class="new-control-input" value="{{ $serQue->answer }}" name="user_ans" required>
                                        <span class="new-control-indicator"></span>{{ $serQue->answer }}
                                        </label>
                                    </div>

                                    <div class="n-chk">
                                        <label class="new-control new-radio radio-classic-success">
                                            <input type="radio" class="new-control-input" value="{{ $serQue->ans_two }}" name="user_ans" required>
                                            <span class="new-control-indicator"></span>{{ $serQue->ans_two }}
                                        </label>
                                    </div>

                                    @if (!empty($serQue->ans_three))
                                        <div class="n-chk">
                                            <label class="new-control new-radio radio-classic-success">
                                            <input type="radio" class="new-control-input" value="{{ $serQue->ans_three }}" name="user_ans" >
                                            <span class="new-control-indicator"></span>{{ $serQue->ans_three }}
                                            </label>
                                        </div>
                                    @else

                                    @endif


                                    @if (!empty($serQue->ans_four))
                                        <div class="n-chk">
                                            <label class="new-control new-radio radio-classic-success">
                                            <input type="radio" class="new-control-input" value="{{ $serQue->ans_four }}" name="user_ans" >
                                            <span class="new-control-indicator"></span>{{ $serQue->ans_four }}
                                            </label>
                                        </div>
                                    @else

                                    @endif

                                    @if (!empty($serQue->ans_five))
                                        <div class="n-chk">
                                            <label class="new-control new-radio radio-classic-success">
                                            <input type="radio" class="new-control-input" value="{{ $serQue->ans_five }}" name="user_ans" >
                                            <span class="new-control-indicator"></span>{{ $serQue->ans_five }}
                                            </label>
                                        </div>
                                    @else

                                    @endif

                                    @if (!empty($serQue->ans_six))
                                        <div class="n-chk">
                                            <label class="new-control new-radio radio-classic-success">
                                            <input type="radio" class="new-control-input" value="{{ $serQue->ans_six }}" name="user_ans" >
                                            <span class="new-control-indicator"></span>{{ $serQue->ans_six }}
                                            </label>
                                        </div>
                                    @else

                                    @endif

                                    @if (!empty($serQue->ans_seven))
                                        <div class="n-chk">
                                            <label class="new-control new-radio radio-classic-success">
                                            <input type="radio" class="new-control-input" value="{{ $serQue->ans_seven }}" name="user_ans" >
                                            <span class="new-control-indicator"></span>{{ $serQue->ans_seven }}
                                            </label>
                                        </div>
                                    @else

                                    @endif

                                    @if (!empty($serQue->ans_eight))
                                        <div class="n-chk">
                                            <label class="new-control new-radio radio-classic-success">
                                            <input type="radio" class="new-control-input" value="{{ $serQue->ans_eight }}" name="user_ans" >
                                            <span class="new-control-indicator"></span>{{ $serQue->ans_eight }}
                                            </label>
                                        </div>
                                    @else

                                    @endif

                                    @if (!empty($serQue->ans_nine))
                                        <div class="n-chk">
                                            <label class="new-control new-radio radio-classic-success">
                                            <input type="radio" class="new-control-input" value="{{ $serQue->ans_nine }}" name="user_ans" >
                                            <span class="new-control-indicator"></span>{{ $serQue->ans_nine }}
                                            </label>
                                        </div>
                                    @else

                                    @endif

                                    @if (!empty($serQue->ans_ten))
                                        <div class="n-chk">
                                            <label class="new-control new-radio radio-classic-success">
                                            <input type="radio" class="new-control-input" value="{{ $serQue->ans_ten }}" name="user_ans" >
                                            <span class="new-control-indicator"></span>{{ $serQue->ans_ten }}
                                            </label>
                                        </div>
                                    @else

                                    @endif

                                    <button type="submit" class="btn btn-dark float-right">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                @endforeach


            </div>
        </div>
    {{-- </div> --}}

@endsection
