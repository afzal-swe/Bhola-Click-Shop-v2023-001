@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="main-content col-lg-10 center">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-body"><br><br>
                        <h4 class="text-muted font-size-18"><b>Update Product</b></h4><br><br>
    
                        <div class="p-3">
                            <form action="{{ route('product.update',$edit->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
              
                                  {{-- Product Name Section Start --}}
                                  <div class="row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Product Name</label>
                                    <div class="col-sm-10">
                                        <input id="title" name="title" class="form-control" type="text" value="{{$edit->title}}">
                                        
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                  </div><br>
                                  {{-- Product Name Section End --}}
              
                                   {{-- Category  Section Start --}}
                                  <div class="row">
                                      
                                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Category</label>
                                    <div class="col-sm-10">
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option selected disabled>Choose Category</option>
                                            @foreach ( $category as $row)
                                                <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                                            @endforeach
                                        </select> 

                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                  </div><br>
                                   {{-- Category Section End --}}
              
              
                                  {{-- Product Section Start --}}
                                  <div class="row">
                                      <div class="form-group col-md-6">
                                          <label for="exampleInputEmail1">Product Price</label>
                                          <input type="text" class="form-control" id="exampleInputEmail1" name="price" value="{{$edit->price}}">

                                            @error('price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                      </div>
                    
                                      <div class="form-group col-md-6">
                                          <label for="exampleInputPassword1">Product Discount</label>
                                          <input type="text" class="form-control" id="exampleInputPassword1" name="discount_price" value="{{$edit->discount_price}}" >
                                      </div>
                                  </div><br>
                                  {{-- Product Section End --}}

                                  {{-- Tags Section Start --}}
                                  <div class="row">
                                      <div class="form-group col-md-6">
                                          <label for="exampleInputEmail1">Tags</label>
                                          <input type="text" class="form-control" id="exampleInputEmail1" name="tags" value="{{$edit->tags}}">

                                            @error('tags')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                      </div>
                    
                                      <div class="form-group col-md-6">
                                          <label for="exampleInputPassword1">Quantity</label>
                                          <input type="text" class="form-control" id="exampleInputPassword1" name="quantity" value="{{$edit->quantity}}">

                                            @error('quantity')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                      </div>
                                  </div><br>
                                  {{-- Tags Section End --}}
              
              
                                  {{-- Discription Section Start --}}
                                  <div class="row">
                                      
                                    <label for="exampleInputEmail1">Product Discription </label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" name="description" id="summernote" cols="30" rows="4" >{{$edit->description}}</textarea>

                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                    
                                  </div><br>
                                  {{-- Discription Section End --}}
              
                                  <div class="form-group">
                                      <label for="exampleInputFile">File input</label>
                                      <div class="input-group">
                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="image" name="image">
                                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        
                                      </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                        <div class="col-sm-10">
                                            <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($edit->image)) ? 
                                                url('image/product/'.$edit->image):url('image/No_Image_Available.jpg') }}" alt="Card image cap">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                
                                 <div class="form-group row mt-2 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Update Product</button>
                                    </div>
                                </div>
                            </form>
                            <!-- end form -->
                        </div>
                    </div>
                    <!-- end cardbody -->
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload=function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
