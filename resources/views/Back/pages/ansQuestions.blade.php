@extends('Back.master')

@section('title')
    Survey Answer
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
                                <th>User</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th class="no-content">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach ($ansQuestions as $ans)
                                <tr>
                                    <td>{{ $i++ }}</td>

                                    <td>
                                        @if(!empty($ans->user->name))
                                            {{ $ans->user->name }}
                                        @else
                                            {{ __('N/A') }}
                                        @endif
                                    </td>
                                    <td>
                                        @if(!empty($ans->question->question))
                                        {{ $ans->question->question }}
                                        @else
                                        {{ __('N/A') }}
                                        @endif
                                    </td>
                                    <td>
                                        @if(!empty($ans->user_ans))
                                        {{ $ans->user_ans }}
                                        @else
                                        {{ __('N/A') }}
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('surv_ans_del',$ans) }}" title="Click To Delete">
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
                                <th>User</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>

    </div>


@endsection


