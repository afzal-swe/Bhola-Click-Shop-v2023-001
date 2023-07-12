@extends('admin.admin_master')
@section('admin')

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> --}}

<div class="main-content col-lg-10 center">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-body"><br><br>
                        <h4 class="text-muted font-size-18"><b>Edit Product Category</b></h4><br><br>
    
                        <div class="p-3">
                            <form method="POST" action="{{ route('category.update',$edit->id) }}">
                                @csrf
                                
                                <!-- Portfolio Name -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Edit Category Name<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input id="category_name" name="category_name" class="form-control" type="text" value="{{$edit->category_name}}">
                                        
                                        @error('category_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div><br>
    
                                <div class="form-group row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Update Category</button>
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
