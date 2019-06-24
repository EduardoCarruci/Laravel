{{-- {!! Form::open(array('url' => 'cita' , 'method'=>'POST','autocomplete'=> 'off' , 'role'=> 'search'))!!}  --}}
{!! Form::open(['route' => ['cita.show', 'cita' =>$cita->fecha], ,'autocomplete'=> 'off' 'method' => 'POST' ,'role'=> 'search']) !!}

<div class="form-group">
    <div class="input-group">
        <input type="text" class="form-control" name="searchText" placeholder="Buscar.." value="{{$searchText}}">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </span>
    </div>
</div>



{{Form::close()}}