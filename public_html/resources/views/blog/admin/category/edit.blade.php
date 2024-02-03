@extends('layouts.app')

@section('content')
    @php /** @var \App\Models\BlogCategory $item */ @endphp
    <form method="POST" action="{{ route('admin.blog.categories.update', $item->id) }}">
        @method('PATCH')
        @csrf
        <div class="container">
            @if($errors->any())
                <div class="row justify-content-center">
                    <div class="alert alert-danger" role="alert">
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alter" aria-label="Close">
                                <span aria-hidden="true">x</span>
                            </button>
                            {!! dd($errors->all(':message')) !!}
                        </div>
                    </div>
                </div>
            @endif

            @if(session('success'))
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">x</span>
                            </button>
                            {{ session()->get('success') }}
                        </div>
                    </div>
                </div>
            @endif

            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('blog.admin.category.includes.item_edit_main_col')
                </div>
                <div class="col-md-3">
                    @include('blog.admin.category.includes.item_edit_add_col')
                </div>
            </div>

        </div>
    </form>
@endsection('content')
