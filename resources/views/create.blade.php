@extends('layouts.app')

@section('title', 'Add Task')

@section('content')
    <form action="post" action="{{ route('tasks.store') }}">
        @csrf {{-- special generate token, automatic verified --}}
        <div>
            <label for="title">
                Title
            </label>
            <input type="text" name="title" id="title"/>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="" rows="5"></textarea>
        </div>
        <div>
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" cols="" rows="10"></textarea>
        </div>

        <div>
            <button type="submit">Add Task</button>
        </div>
    </form>
@endsection

