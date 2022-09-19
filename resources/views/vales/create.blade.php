<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Generar Vales</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{asset('vales/css/index.css')}}">
    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker3.css')}}">
    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-standalone.css')}}">
    <script src="{{asset('datePicker/js/bootstrap-datepicker.js')}}"></script>
    <!-- Languaje -->
    <script src="{{asset('vales/js/app.js')}}"></script>
</head>
<body>
      <!-- Modal 
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary">Guardar Cambios</button>
            </div>
          </div>
        </div>
      </div>-->
      
      <div class=" todo col p-md-1"></div>
      <div class="container col-md-5 p-2">
          <div class="card">
              <div class="card-header">
                  <h2 class="text-center">CALACOTO - GENERAR VALES <i class="bi bi-journal-check"></i></h2>
              </div>
              <div class="body2 p-3">
                  <div class="container2">

                        <!--<div class="row height d-flex justifi-content-center align-items-center"> -->
                              <form method="POST" action="{{ route('vales.store')   }}" novalidate>
                                @csrf
                                <div class="form-group d-flex">
                                <div class="form-group col-sm-6">
                                    <label for="empresa">Empresa</label>
                                    <select name="empresa" 
                                            class="form-control @error('empresa')
                                                is-invalid
                                            @enderror"
                                            id="empresa"
                                    >
                                          <option value="">---Seleccione---</option>
                                    @foreach ($empresa as $empresa)
                                          <option 
                                          value="{{ $empresa->id }}"
                                          {{ old('empresa')== $empresa->id ? 'selected' : '' }}
                                          >{{$empresa->nombre}}</option>
                                    @endforeach
                                    </select>
                                    @error('empresa')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>                                        
                               <div class="form-group col-sm-5">
                                  <label for="date">Fecha de emisión</label>
                                  <input  type="text" 
                                          name="date"
                                          class="form-control @error('date')
                                              is-invaled
                                          @enderror"
                                          id="date"  
                                          placeholder="DD/MM/YYYY"
                                          value={{old('date')}}
                                          >
                                          @error('date')
                                          <span class="invalid-feedback d-block" role="alert">
                                              <strong>{{$message}}</strong>
                                          </span>
                                          @enderror
                              </div>
                              </div>
                              <div class="form-group d-flex">
                              <div class="form-group col-sm-4">
                                  <label for="novales">Nro. Vales</label>
                                  <input type="integer"
                                         name="novales"
                                         class="form-control @error('novales')
                                          is-invalid
                                         @enderror"
                                         id="novales"
                                         placeholder="Cantidad"
                                         value={{old('novales')}} 
                                  >
                                  @error('novales')
                                      <span class="invalid-feedback d-block" role="alert">
                                          <strong>{{$message}}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="form-group col-sm-4">
                                  <label for="desde">Nro. DESDE</label>
                                  <input type="integer"
                                         name="desde"
                                         class="form-control @error('desde')
                                          is-invalid
                                         @enderror"
                                         id="desde"
                                         placeholder="Introduzca N°"
                                         value={{old('desde')}} 
                                  >
                                  @error('desde')
                                      <span class="invalid-feedback d-block" role="alert">
                                          <strong>{{$message}}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="form-group col-sm-4">
                                <label for="hasta">Nro. HASTA</label>
                                <input type="integer"
                                       name="hasta"
                                       class="form-control @error('hasta')
                                        is-invalid
                                       @enderror"
                                       id="hasta"
                                       placeholder="Introduzca N°"
                                       value={{old('hasta')}} 
                                >
                                @error('hasta')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>
                          <div class="form-group d-flex">
                            <div class="form-group col-sm-4">
                              <label for="importeuni">Bs. (x Vale)</label>
                              <input type="numeric"
                                     name="importeuni"
                                     class="form-control @error('importeuni')
                                      is-invalid
                                     @enderror"
                                     id="importeuni"
                                     placeholder="Bs"
                                     value={{old('importeuni')}} 
                              >
                              @error('importeuni')
                                  <span class="invalid-feedback d-block" role="alert">
                                      <strong>{{$message}}</strong>
                                  </span>
                              @enderror
                          </div>
                          <div class="form-group col-sm-4">
                            <label for="item">Gasolina</label>
                            <input type="text"
                                   name="item"
                                   class="form-control @error('item')
                                    is-invalid
                                   @enderror"
                                   id="item"
                                   placeholder="Tipo"
                                   value={{old('item')}} 
                            >
                            @error('item')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>                        
                              <div class="form-group col-sm-4">
                                  <label for="prelitro">Precio X Litro</label>
                                  <input type="integer"
                                         name="prelitro"
                                         class="form-control @error('prelitro')
                                          is-invalid
                                         @enderror"
                                         id="prelitro"
                                         placeholder="Bs"
                                         value={{old('prelitro')}} 
                                  >
                                  @error('prelitro')
                                      <span class="invalid-feedback d-block" role="alert">
                                          <strong>{{$message}}</strong>
                                      </span>
                                  @enderror
                              </div>
                            </div>
                            <div class="form-group d-flex">
                            <div class="form-group col-sm-8">
                            <label for="referencia">Referencia</label>
                            <input type="text"
                                   name="referencia"
                                   class="form-control @error('referencia')
                                    is-invalid
                                   @enderror"
                                   id="referencia"
                                   placeholder=""
                                   value={{old('referencia')}} 
                            >
                            @error('referencia')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror 
                        </div>
                        <div class="form-group d-flex col-sm-5">
                            <label for="success"></label>
                            <input type="submit" class="btn btn-outline-success" value="GENERAR">
                        </div>
                        </div>
                        </form>
                        <!--Aqui van los botones -->
                            <div class="form-group d-flex p-md-3">
                                <div class="form-group col-sm-4">
                                    <input type="submit" class="btn btn-outline-primary" value="IMPRIMIR VALE">
                                </div>
                                <div class="form-group col-sm-5">
                                    <input type="submit" class="btn btn-outline-dark" value="IMPRIMIR PAPELETA">
                                </div>
                                <div class="form-group col-sm-4">
                                    <input type="submit" class="btn btn-outline-danger" value="CANCELAR">
                                </div> 
                            </div>
                        <!--Hasta aqui-->
                          </div>    
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <script>
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="{{asset('datePicker/js/bootstrap-datepicker.min.js')}}"></script>    
    <script src="{{asset('datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>
    </body>
</html>
                              