@extends('backend.layout.index')
@section('content')  
       <section class="content">
        <div class="container">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$title}}</h3>
                    <div class="box-tools pull-right">
                        <div class="actions">
                            <a class="btn btn-sm btn-default" href="{{route('category.index')}}"> <i class="fa fa-list"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                  @include('message')
                    <form method="post" action="{{ route('category.update',$category->slag) }}" class="form-horizontal" role="form" enctype="multipart/form-data">
                    @method('PATCH')
                        @csrf
                        <div class="form-body">

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label">Category Name <span style="color:red">*</span> </label>
                                <div class="col-md-6">
                                    <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="name" required>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong class="help-block">{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group{{ $errors->has('slag') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label">Category Slag <span style="color:red">*</span> </label>
                                <div class="col-md-6">
                                    <input type="text" name="slag" value="{{ $category->slag }}" class="form-control" placeholder="slag" required>
                                    @if ($errors->has('slag'))
                                        <span class="help-block">
                                            <strong class="help-block">{{ $errors->first('slag') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                           
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-10" style="margin-left: 20px">
                                    <button type="submit" class="btn btn-primary">edit</button>
                                    <a href="{{ route('product.index') }}" class="btn btn-info">cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div> 
    </section>
@endsection
