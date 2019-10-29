@extends('backend.layout.index')

@section('content')
<div class="container">
    <h3 class="box-title">Catigories</h3>
    <div class=" col-md-offset-2 custyle">
    <table class="table table-striped custab">
    <thead>
    
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Slug</th>
            
            <th class="text-center">Action</th>
        </tr>
    </thead>
            @forelse($cat as $categories)
            <tr>
                <td>{{$categories->id}}</td>
                <td>{{$categories->name}}</td>
                <td>{{ $categories->slag }}</td>
                
                <td class="text-center" >
                <a class='btn btn-info btn-xs' href="{{ route('category.edit', $categories->slag) }}"><i class="fa fa-edit"> Edit</i></a>
                <a class='btn btn-success btn-xs' href="{{ route('category.show', $categories->slag) }}"><i class="fa fa-eye"> show</i></a>
                <a class="btn btn-danger btn-xs">
                <form method="post" action="{{ route('category.destroy', [$categories->slag]) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash" >Del</i></button>
                    


                                           
                 </form>
                 </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">No data</td>
            </tr>
            @endforelse
    </table>
    </div>
</div>
@endsection