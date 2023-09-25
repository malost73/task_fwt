@extends('layouts.header')

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('add-task') }}">
                                @csrf
                                <div class="input-group">
                                    <div class="col">
                                        <input type="text"
                                               class="form-control @error('description') is-invalid @enderror"
                                               name="description" value="{{ old('description') }}" required
                                               autocomplete="description">
                                    </div>

                                    <div class="col col-md-auto">
                                        <input type="submit" class="btn btn-success" value="{{ __('Добавить') }}">
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container px-4 mt-4">
                @if($tasks->count()>0)
                    <h3>Задачи</h3>
                @endif
                <div class="table-responsive">
                    <table style="table-layout: fixed" class="table align-middle table-xxl table-bordered">

                        <tbody>
                        @foreach($tasks as $task)
                            <tr>

                                <td style="width: 5%" align="center">

                                    <form action="{{ route('edit-task', $task->id )}}" method="POST">

                                        @csrf
                                        <input
                                            class="btn @if($task->done)  @else @endif>"
                                            type="submit" name="done"
                                            value="@if($task->done)✔@else ☐ @endif">
                                    </form>

                                </td>
                                <td style="@if($task->done) text-decoration: line-through; @endif width: 85%; overflow: auto; text-overflow: clip;">
                                    {{ $task->description }}
                                </td>

                                <td align="center" style="width: 10%">
                                    <form action="{{ route('delete-task', $task->id )}}" method="GET">

                                        @csrf
                                        <input class="btn btn-danger" type="submit" value="Удалить">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
