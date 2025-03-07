@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="text-center">
                    <h1>My Action Plan</h1>
                    <p>Keep yourself organize and be productive</p>
                </div>

                <livewire:add-plan-component />
                <livewire:list-plan-component />
            </div>
        </div>
    </div>
@endsection
