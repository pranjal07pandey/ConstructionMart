@extends('admin.layouts.master')

@section('title')

User Profile
    
@endsection

@section('content')

<div class="content">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
        <h5 class="title">{{$user->name}}</h5>
        </div>
        <div class="card-body">
          <form>
            <div class="row">
              <div class="col-md-5 pr-1">
                <div class="form-group">
                  <label>Phone Number</label>
                <input type="text" class="form-control"  placeholder="Company" value="{{$user->phone}}">
                </div>
              </div>
              <div class="col-md-3 px-1">
                <div class="form-group">
                  <label>Username</label>
                <input type="text" class="form-control" placeholder="Username" value="{{$user->name}}">
                </div>
              </div>
              <div class="col-md-4 pl-1">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" placeholder="Email" value="{{$user->email}}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 pr-1">
                <div class="form-group">
                  <label>Registered As</label>
                <input type="text" class="form-control" placeholder="Company" value="{{$user->registered_as}}">
                </div>
              </div>
              <div class="col-md-6 pl-1">
                <div class="form-group">
                  <label>Joined Date</label>
                  <input type="text" class="form-control" placeholder="Last Name" value="{{$user->created_at}}">
                </div>
              </div>
            </div>
           
            
          </form>
        </div>
      </div>


      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Search History</h4>
        </div>
        <div class="card-body">

          @foreach ($user->searches as $searchHistory)


            <a href="#" class="btn btn-primary">{{$searchHistory->search}}</a>
                
            @endforeach

         
        </div>
      </div>

      
        
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Service Order History</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>Ordered Service</th>
                    <th>Ordered Date</th>
                   
                  </thead>
    
                  <tbody>
    

                    @foreach ($user->orderservice as $order)

                    <tr>
                        <td>{{$order->service}}</td>
                        <td>{{$order->created_at}}</td>
                        
                    </tr>
                        
                    @endforeach

                    
                  </tbody>
    
                </table>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Product Order History</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>Ordered Product</th>
                    <th>Ordered Date</th>

                  </thead>
    
                  <tbody>
    
                    <tr>
                        <td>Cornice</td>
                        <td>2019-2-15</td>
                      
                    </tr>
                                            
                  </tbody>
    
                </table>
              </div>
            </div>
          </div>

    </div>
    <div class="col-md-4">
      <div class="card card-user">
        <div class="image">
          <img src="../assets/img/bg5.jpg" alt="...">
        </div>
        <div class="card-body">
          <div class="author">
            <a href="#">
              <img class="avatar border-gray" src="../assets/img/mike.jpg" alt="...">
            <h5 class="title">{{$user->name}}</h5>
            </a>
            <p class="description">
              {{$user->phone}}
            </p>
          </div>
          
        </div>
        <hr>
        <div class="button-container">
          <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
            <i class="fab fa-facebook-f"></i>
          </button>
          <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
            <i class="fab fa-twitter"></i>
          </button>
          <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
            <i class="fab fa-google-plus-g"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection

@section('scripts')
    
@endsection
