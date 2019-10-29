@extends('backend.layout.index')
    @section('content')
    <section class="content">
        <div class="container">
                
                
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$title}}</h3>
                    <div class="box-tools pull-right">
                        <a class="btn btn-sm btn-default" href="{{ route('category.create') }}"> <i class="fa fa-plus"></i> </a>
                        <a class="btn btn-sm btn-default" href="{{ route('category.edit', [$category->slag]) }}"> <i class="fa fa-edit"></i> </a>
                        <span  title="delete cat">
                            <a data-toggle="modal" data-target="#myModal{{ $category->slag }}" class="btn btn-sm btn-default" href=""> <i class="fa fa-trash"></i> </a>
                        </span>
                        <div class="modal fade" id="myModal{{ $category->slag }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">x</button>
                                        <h4 class="modal-title">
                                            delete
                                        </h4>
                                    </div>
                                    <div class="modal-body">
                                        ask {{ $category->name }} !
                                    </div>
                                    <div class="modal-footer">
                                        <form method="post" action="{{ route('category.destroy', [$category->slag]) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                            <a class="btn btn-default" data-dismiss="modal">
                                                cancel
                                            </a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-sm btn-default" href="{{ route('category.index') }}"> <i class="fa fa-list"></i> </a>
                    </div>
                </div>
                <div class="box-body">
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Name : </strong>
                            {{ $category->name }}
                            <br><hr>
                        </div>

                        <div class="col-md-6">
                            <strong>Slag : </strong>
                            {{ $category->slag }}
                            <br><hr>
                        </div>
                        


                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </section>
  @endsection
