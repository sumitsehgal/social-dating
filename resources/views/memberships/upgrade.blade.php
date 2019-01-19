@extends('layouts.front')

@section('content')

<section class="welcome_area">
    <div class="container">
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
        <div class="welcome_title">
            <h3>{{$plan->title}}</h3>
            <p>{{$plan->description}}</p>
            <span>{{$plan->scope}}</span>
        </div>
        <!-- Payment Form -->
        <div class="row">
                <div class="col-75">
                  <div class="container">
                    <form action="/membership/upgrade/{{$plan->stripe_plan_id}}" method="post">
                        @csrf
                      <div class="row">
                        
                        <div class="col-md-2"></div>
                        <div class="col-md-6">
                          <h3>Payment</h3>
                          <label for="fname">Accepted Cards</label>
                          <div class="icon-container">
                            <i class="fa fa-cc-visa" style="color:navy;"></i>
                            <i class="fa fa-cc-amex" style="color:blue;"></i>
                            <i class="fa fa-cc-mastercard" style="color:red;"></i>
                            <i class="fa fa-cc-discover" style="color:orange;"></i>
                          </div>
                          <label for="cname">Name on Card</label>
                          <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                          <label for="ccnum">Credit card number</label>
                          <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                          <label for="expmonth">Exp Month</label>
                          <input type="text" id="expmonth" name="expmonth" placeholder="07">
              
                          <div class="row">
                            <div class="col-md-6">
                              <label for="expyear">Exp Year</label>
                              <input type="text" id="expyear" name="expyear" placeholder="2018">
                            </div>
                            <div class="col-md-6">
                              <label for="cvv">CVV</label>
                              <input type="text" id="cvv" name="cvv" placeholder="352">
                            </div>
                          </div>
                          <input type="submit" value="Continue to checkout" class="btn btn-success">
                        </div>
                        
                      </div>
                      
                    </form>
                  </div>
                </div>
            
              </div>
        <!-- End Payment Form-->
        <style>
        
input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}



        </style>

    </div>
</section>


@endsection