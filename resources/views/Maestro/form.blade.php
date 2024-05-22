<h1>{{ $modo }} Maestro </h1>

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $errors)
        <li>{{$errors}}</li>
        @endforeach
    </ul>
</div>
@endif


<div class="form-group">

<label for="Apellidos"> Apellidos </label>
<input type="text" class="form-control" name="Apellidos" 
value="{{ isset($maestros->Apellidos)?$maestros->Apellidos:old('Apellidos')}}" id="Apellidos">
<br>
</div>

<div class="form-group">
<label for="Nombre"> Nombre </label>
<input type="text" class="form-control" name="Nombres" value="{{isset($maestros->Nombres)?$maestros->Nombres:old('Nombres')}}" id="Nombres">
<br>
</div>

<div class="form-group">
<label for="CI"> CI </label>
<input type="text" class="form-control" name="CI" value="{{isset($maestros->CI)?$maestros->CI:old('CI')}}" id="CI">
<br>
</div>

<div class="form-group">
<label for="Direccion"> Direccion </label>
<input type="text" class="form-control" name="Direccion" value="{{isset($maestros->Direccion)?$maestros->Direccion:old('Direccion')}}" id="Direccion">
<br>
</div>

<div class="form-group">
<label for="Celular"> Celular </label>
<input type="text" class="form-control" name="Celular" value="{{isset($maestros->Celular)?$maestros->Celular:old('Celular')}}" id="Celular">
<br>
</div>

<div class="form-group">
<label for="Correo"> Correo </label>
<input type="text" class="form-control" name="Correo" value="{{isset($maestros->Correo)?$maestros->Correo:old('Correo')}}" id="Correo">
<br>
</div>

<div class="form-group">
<label for="Foto"> Foto </label>
@if(isset($alumnos->Foto))
<img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$maestros->Foto}}" width="100" alt=""/>
@endif
<input type="file" class="form-control" name="Foto" value="" id="Foto">
<br>
</div>

<div class="form-group">
<label for="curriculum"> curriculum </label>
<input type="text" class="form-control" name="curriculum" value="{{isset($maestros->curriculum)?$maestros->curriculum:old('curriculum')}}" id="curriculum">
<br>
</div>
<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a class="btn btn-primary" href="{{url('Maestro/')}}">Regresar</a>
<br>