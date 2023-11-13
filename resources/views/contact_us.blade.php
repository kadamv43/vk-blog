

@extends('layout.app')

@section('content')

<div class="site-hero py-5 bg-light mb-0">

    <div class="container">
      <div class="row align-items-center justify-content-between">
        <div class="col-lg-12 text-center">
          <h1 class="text-black mb-0">Contact Us</h1>
        </div>
      </div>
    </div>
  </div>

  <div class="section-grey bg-light">
    <div class="container">
      <div class="block">
        <div class="row justify-content-center">
          <div class="col-md-8 col-lg-8 pb-4" data-aos="fade-up" data-aos-delay="200">
            <form>
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label class="text-black" for="fname">First name</label>
                    <input type="text" class="form-control" id="fname">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label class="text-black" for="lname">Last name</label>
                    <input type="text" class="form-control" id="lname">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="text-black" for="email">Email address</label>
                <input type="email" class="form-control" id="email">
              </div>

              <div class="form-group">
                <label class="text-black" for="message">Message</label>
                <textarea name="" class="form-control" id="message" cols="30" rows="5"></textarea>
              </div>

              <button type="submit" class="btn btn-primary-hover-outline">Send Message</button>
            </form>

          </div>





        </div>

      </div>

    </div>


  </div>
@endsection