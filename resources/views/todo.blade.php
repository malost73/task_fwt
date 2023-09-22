@extends('layouts.header')

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Задача') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ '/' }}">
                                @csrf

                                <div class="input-group">
                                    <input type="text" class="form-control @error('task') is-invalid @enderror"
                                           name="task" value="{{ old('task') }}" required autocomplete="task">
                                    <button type="submit" class="btn btn-success "
                                            id="input-group-button-right">{{ __('Добавить') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class=" col-md-12">
                <h1>Задачи</h1>
                <table class="table">
                    <tbody>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Текст
                        </th>
                    </tr>
                    {{--                        @foreach($tasks as $task)--}}
                    {{--                            <tr>--}}
                    {{--                                <td>{{ $task->done }}</td>--}}
                    {{--                                <td>{{ $task->description}}</td>--}}
                    {{--                                <td>--}}
                    {{--                                    <div class="btn-group" role="group">--}}
                    {{--                                        <a class="btn btn-success" type="button"--}}
                    {{--                                           href="">Открыть</a>--}}
                    {{--                                    </div>--}}
                    {{--                                </td>--}}
                    {{--                            </tr>--}}
                    {{--                        @endforeach--}}
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection


{{--@extends('layouts.header')--}}


{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card">--}}

{{--                    <div class="card-header">{{ Auth::user()->name }}, Ваши задачи</div>--}}

{{--                    <div class="card-body">--}}
{{--                        @if (session('status'))--}}
{{--                            <div class="alert alert-success" role="alert">--}}
{{--                                {{ session('status') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                        You are logged in!--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
