@extends('dashboard.master')

@section('content')

<a class="btn btn-success mt-3 mb-3 " href="{{route('post.create')}}">Crear</a>

<table class="table">
    <thead class="thead-light">
        <tr>
            <th>
                Id
            </th>
            <th>
                Titulo
            </th>
            <th>
                Categorìa
            </th>
            <th>
                Posteado
            </th>
            <th>
               Creacion
            </th>
            <th>
                Actualizacion
            </th>
            <th>
                Acciones
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>
                {{$post->id}}
            </td>
            <td>
                {{$post->title}}
            </td>
            <td>
                {{$post->category->title}}
            </td>
            <td>
                {{$post->posted}}
            </td>
            <td>
                {{$post->created_at}}
            </td>
            <td>
                {{$post->updated_at}}
            </td>
            <td>
                <a href="{{route('post.show',$post->id)}}" class="btn btn-sm btn-primary " >Ver</a>
                <a href="{{route('post.edit',$post->id)}}" class="btn btn-sm btn-success" >Actualizar</a>                
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" 
                        data-id="{{$post->id}}">Eliminar</button>
           </td>            
        </tr>
        @endforeach
    </tbody>
</table>

{{$posts->links() }}

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">Borrar Registro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>¿Seguro de que desea eliminar el registro deleccionado?</p>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
          
          <form id="formDelete"  method="POST"  action="{{route('post.destroy',0)}}" data-action="{{route('post.destroy',0)}}">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-sm btn-danger">Borrar</button> 
            </form>
                 
        </div> 
      </div>
    </div>
  </div>

  <script>
        window.onload = function(){

            $('#deleteModal').on('show.bs.modal', function (event) {
            
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
             action = $('#formDelete').attr('data-action').slice(0,-1)
             action += id
            console.log(action)
            $('#formDelete').attr('action',action)

            var modal = $(this)

            modal.find('.modal-title').text('Vas a borrar el POST: ' + id)
            //modal.find('.modal-body input').val(recipient)
    })

        }
        
  </script>

@endsection

