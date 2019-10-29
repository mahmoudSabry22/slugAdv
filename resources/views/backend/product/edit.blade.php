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
                            <a class="btn btn-sm btn-default" href="{{route('product.index')}}"> <i class="fa fa-list"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                  @include('message')
                    <form method="post" action="{{ route('product.update',$product->name) }}" class="form-horizontal" role="form" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="form-body">

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label">Product Name <span style="color:red">*</span> </label>
                                <div class="col-md-6">
                                    <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="name" required>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong class="help-block">{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            
                            <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label">Categories <span style="color:red">*</span></label>
                                <div class="col-md-6">

                                    <select class="form-control" name="category_id" >
                                        

                                        @foreach($prods as $parent )

                                        <option value="{{ $parent->id }}" {{ $parent->name == 'category_id' ? 'selected' : '' }}>{{ $parent->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('category_id'))
                                        <span class="help-block">
                                            <strong class="help-block">{{ $errors->first('category_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                           
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-10" style="margin-left: 20px">
                                    <button type="submit" class="btn btn-primary">Add</button>
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