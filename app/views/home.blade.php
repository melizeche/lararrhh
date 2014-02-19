@extends('master')
 
@section('contenido')
  <p>Bienvenido {{ Auth::user()->nombre }}</p>
@stop

@section('titulo')
Escritorio
@stop
 
@section('sidebar')
  @parent
   
  <a href="#">Section specific links</a>
@stop