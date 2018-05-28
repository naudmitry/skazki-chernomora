@extends('admin.layouts.master')

@section('content')
    @include('admin.vendor.pageHeader', [
        'section' => 'Новости',
        'description' => 'Добавление и редактирование новостей',
        'page' => 'Статьи'
    ])
@endsection
