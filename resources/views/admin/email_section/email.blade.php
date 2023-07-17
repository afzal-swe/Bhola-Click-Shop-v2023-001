@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="main-content col-lg-10 center">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-body"><br><br>
                        <h4 class="text-muted font-size-18"><b>Sent Email {{$send_mail->email}}</b></h4><br><br>
    
                        <div class="p-3">
                            <form action="{{ route('send_user.email',$send_mail->id) }}" method="POST">
                                @csrf
                                <div class="card-body">
              
                                  {{-- Email Greeting Section Start --}}
                                  <div class="row">
                                    <label for="example-text-input" >Email Greeting <span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input id="greeting" name="greeting" class="form-control" type="text" placeholder="Email Greeting" required>
                                        
                                        @error('greeting')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                  </div><br>
                                  {{-- Email Greeting Section End --}}
              
              
                                  {{-- Email FirstLing Section Start --}}
                                  <div class="row">
                                    <label for="exampleInputEmail1">Email First Ling <span class="text-danger" >*</span></label>
                                      <div class="col-sm-10">
                                          
                                          <input type="text" class="form-control" id="exampleInputEmail1" name="firstname" placeholder="Email FirstLing" required>

                                            @error('firstname')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                      </div>
                    
                                  </div><br>
                                  {{-- Email FirstLing Section End --}}

                                  {{-- Email Body Section Start --}}
                                  <div class="row">
                                    <label for="exampleInputEmail1">Email Body <span class="text-danger" >*</span></label>
                                      <div class="col-sm-10">
                                          
                                          <input type="text" class="form-control" id="exampleInputEmail1" name="body" placeholder="Email Body" required>

                                            @error('body')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                      </div>
                                  </div><br>
                                  {{-- Tags Section End --}}

                                  {{-- Email Body Section Start --}}
                                  <div class="row">
                                    <label for="exampleInputPassword1">Email Button Name <span class="text-danger" >*</span></label>
                                      <div class="col-sm-10">
                                          
                                          <input type="text" class="form-control" id="exampleInputPassword1" name="button" placeholder="Email Button Name" required>

                                            @error('button')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                      </div>
                                  </div><br>
                                  {{-- Tags Section End --}}

                                  {{-- Email Body Section Start --}}
                                  <div class="row">
                                    <label for="exampleInputPassword1">Email Url <span class="text-danger" >*</span></label>
                                      <div class="col-sm-10">
                                          
                                          <input type="text" class="form-control" id="exampleInputPassword1" name="url" placeholder="Email Url" required>

                                            @error('url')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                      </div>
                                  </div><br>
                                  {{-- Tags Section End --}}

                                  {{-- Email Body Section Start --}}
                                  <div class="row">
                                    <label for="exampleInputPassword1">Email Last Line <span class="text-danger" >*</span></label>
                                      <div class="col-sm-10">
                                          
                                          <input type="text" class="form-control" id="exampleInputPassword1" name="lastline" placeholder="Email Last Line" required>

                                            @error('lastline')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                      </div>
                                  </div><br>
                                  {{-- Tags Section End --}}
              
              
                                  
                                </div>
                                <!-- /.card-body -->
                
                                 <div class="form-group row mt-2 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Send Email</button>
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
@endsection
