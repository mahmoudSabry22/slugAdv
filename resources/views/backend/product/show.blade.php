@extends('backend.layout.index')
@section('content')

    <section class="content">
        <!-- Default box -->
        <div class="container">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$product->name}}</h3>
                    <div class="box-tools pull-right">
                        <a class="btn btn-sm btn-default" href="{{ route('product.create') }}"> <i class="fa fa-plus"></i> </a>
                        <a class="btn btn-sm btn-default" href="{{ route('product.edit', [$product->id]) }}"> <i class="fa fa-edit"></i> </a>
                        <span  title="delete cat">
                            <a data-toggle="modal" data-target="#myModal{{ $product->id }}" class="btn btn-sm btn-default" href=""> <i class="fa fa-trash"></i> </a>
                        </span>
                        <div class="modal fade" id="myModal{{ $product->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">x</button>
                                        <h4 class="modal-title">
                                            delete
                                        </h4>
                                    </div>
                                    <div class="modal-body">
                                        ask {{ $product->name }} !
                                    </div>
                                    <div class="modal-footer">
                                        <form method="post" action="{{ route('product.destroy', [$product->id]) }}">
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
                        <a class="btn btn-sm btn-default" href="{{ route('product.index') }}"> <i class="fa fa-list"></i> </a>
                    </div>
                </div>
                <div class="box-body">
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Title : </strong>
                            {{ $product->name }}
                            <br><hr>
                        </div>
                       

                        <div class="col-md-6">
                            <strong>belongs To Category : </strong>
                          <a href="{{route('category.show',[$product->category->slag])}}">  {{ $product->category->name }}</a>
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