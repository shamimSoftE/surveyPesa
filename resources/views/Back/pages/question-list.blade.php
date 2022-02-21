@extends('Back.master')

@section('title')
    Survey Questions
@endsection

@section('content')

    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <table id="zero-config" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Answer2</th>
                                <th>Answer3</th>
                                <th>Answer4</th>
                                <th>Answer5</th>
                                <th>Answer6</th>
                                <th>Answer7</th>
                                {{-- <th>Answer5</th> --}}
                                <th class="no-content">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach ($serveyQuestions as $servQue)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $servQue->question }}</td>
                                    <td>{{ $servQue->answer }}</td>
                                    <td>{{ $servQue->ans_two }}</td>
                                    <td>
                                        @if(!empty($servQue->ans_three))
                                            {{ $servQue->ans_three }}
                                        @else
                                            {{ __('N/A') }}
                                        @endif
                                    </td>
                                    <td>
                                        @if(!empty($servQue->ans_four))
                                        {{ $servQue->ans_four }}
                                        @else
                                        {{ __('N/A') }}
                                        @endif
                                    </td>
                                    <td>
                                        @if(!empty($servQue->ans_five))
                                        {{ $servQue->ans_five }}
                                        @else
                                        {{ __('N/A') }}
                                        @endif
                                    </td>
                                    <td>
                                        @if(!empty($servQue->ans_six))
                                        {{ $servQue->ans_six }}
                                        @else
                                        {{ __('N/A') }}
                                    @endif
                                    </td>
                                    <td>
                                        @if(!empty($servQue->ans_seven))
                                        {{ $servQue->ans_seven }}
                                        @else
                                            {{ __('N/A') }}
                                        @endif
                                    </td>

                                    <td>
                                       <a href="{{ route('surv_questions_edit',$servQue) }}" class="td-content"><span class="badge badge-success">Edit</span></a>

                                        <a href="{{ route('surv_questions_delete',$servQue) }}" title="Click To Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel">
                                                <circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line>
                                                <line x1="9" y1="9" x2="15" y2="15"></line>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Answer2</th>
                                <th>Answer3</th>
                                <th>Answer4</th>
                                <th>Answer5</th>
                                <th>Answer6</th>
                                <th>Answer7</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>

    </div>


@endsection


