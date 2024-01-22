<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
   
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')


      @include('admin.navbar')

      <div class="container-fluid page-body-wrapper text-center mt-auto" >
        <div align="center" style="padding-top: 100px">
            <table>
                <tr style="background-color: black">
                    <th style="padding: 10px">Customer name</th>
                    <th style="padding: 10px">Email</th>
                    <th style="padding: 10px">Phone</th>
                    <th style="padding: 10px">Doctor Name</th>
                    <th style="padding: 10px">Date</th>
                    <th style="padding: 10px">Message</th>
                    <th style="padding: 10px">Status</th>
                    <th style="padding: 10px">Approved</th>
                    <th style="padding: 10px">Cancled</th>
                    <th style="padding: 10px">Send mail</th>
                </tr>
                @foreach ($appointments as $appointment)
                    
                <tr style="background-color:skyblue">
                    <td>{{$appointment->name}}</td>
                   <td>{{$appointment->email}}</td>
                   <td>{{$appointment->phone}}</td>
                   <td>{{$appointment->doctor}}</td>
                   <td>{{$appointment->date}}</td>
                   <td>{{$appointment->message}}</td>
                   <td>{{$appointment->status}}</td>
                   <td>
                    <a class="btn btn-success" href="{{url('approved',$appointment->id)}}">Approved</a>
                   </td>
                   <td>
                    <a class="btn btn-danger" href="{{url('cancled',$appointment->id)}}">Cancled</a>
                   </td>
                  
                   <td>
                    <a class="btn btn-primary" href="{{url('emailview',$appointment->id)}}">Send mail</a>
                   </td>
                   
                   

                   
                </tr>
                @endforeach

            </table>
        </div>

      </div>

     
        <!-- partial -->
     @include('admin.body')
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>