{{--@extends('admin.index')--}}
<!DOCTYPE html>
<html>
@section('header')
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <script type="text/javascript" src="{{asset('assets/js/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap-filestyle.min.js')}}"></script>
</head>
@endsection
@yield('header')

@section('body')
<body>
<div style="margin: 0px 50px 0px 50px;">

    @if($product)

    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th>№ п/п</th>
            <th>Текст</th>
            <th>Кортинка</th>
            <th>Удалить</th>
        </tr>
        </thead>
        <tbody>
        @foreach($product as $k => $products)
        <tr>
            <td>{{$products->id}}</td>
            <td>{{$products->name}}</td>
            <td>{{$products->image}}</td>
            <td>{!!Form::open(['url' => route('edit',['products'=>$products->id]), 'class'=>'form-horizontal','method'=> 'POST']) !!}
                {!! Form::hidden('action','delete') !!}
                {!! Form::button('Удалить',['class' => 'btn btn-danger','type' => 'submit']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    @endif
</div>
</body>
@endsection
@yield('body')
</html>
