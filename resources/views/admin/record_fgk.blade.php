@extends('layouts.admin')

@section('js')
<script src="{{ asset('js/record.js') }}"></script>
@endsection

@section('contenido')
<div class="container" style = "width: 97%;">
    <!--encabezado-->
    <header>
        <h5>Record de Alumnos:FGK</h5>
    </header>
    <nav>
    <div class="nav-wrapper">
      <div class="col s12">
        <a href="#!" class="breadcrumb">Notas</a>
        <a href="encabezados" class="breadcrumb">Ranking</a>
        <a href="#!" class="breadcrumb">Becas</a>
      </div>
    </div>
  </nav>

  <div id="encabezados">                        
            <div class="card-tabs">
                <ul class="tabs tabs-fixed-width">
                    <li class="tab"><a class="active" href="#op1">Centro Escolar</a></li>
                    <li class="tab"><a href="#op2">CCGk</a></li>                    

                </ul>
            </div>
            </div>
    <div class="fondo-cuerpo">
        <!-- <div class="card-panel" style="border-radius: 7px;"> -->
    </div>
</div>

@endsection