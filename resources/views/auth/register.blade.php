@extends('layouts.auth.app')

@section('content')
<!-- Registration 3 - Bootstrap Brain Component -->
<section class="p-3 p-md-4 p-xl-5">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 bsb-tpl-bg-platinum">
        <div class="d-flex flex-column justify-content-between h-100 p-3 p-md-4 p-xl-5">
          <h3 class="m-0">Welcome!</h3>
          <img class="img-fluid rounded mx-auto my-4" loading="lazy" src="./assets/img/bsb-logo.svg" width="245" height="80" alt="BootstrapBrain Logo">
          <p class="mb-0">Not a member yet? <a href="#!" class="link-secondary text-decoration-none">Register now</a></p>
        </div>
      </div>
      <div class="col-12 col-md-6 bsb-tpl-bg-lotion">
        <div class="p-3 p-md-4 p-xl-5">
          <div class="row">
            <div class="col-12">
              <div class="mb-5">
                <h2 class="h3">Registration</h2>
                <h3 class="fs-6 fw-normal text-secondary m-0">Enter your details to register</h3>
              </div>
            </div>
          </div>
          <form action="{{ route('store') }}" method="POST">
          @csrf
            <div class="row gy-3 gy-md-4 overflow-hidden">
              
              <div class="col-12">
                <label for="firstName" class="form-label">First Name <span class="text-danger">*</span></label>
                <input type="name" class="form-control" name="name" id="name" placeholder="First Name" required>
              </div>
              
             
              <div class="col-12">
                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
              </div>
              <div class="col-12">
                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="password" id="password" value="" required>
              </div>
              <div class="col-12">
                <label for="password" class="form-label">Comfrim Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" value="" required>
              </div>
              <!-- <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" name="iAgree" id="iAgree" required>
                  <label class="form-check-label text-secondary" for="iAgree">
                    I agree to the <a href="#!" class="link-primary text-decoration-none">terms and conditions</a>
                  </label>
                </div>
              </div> -->
              <div class="col-12">
                <div class="d-grid">
                  <button class="btn bsb-btn-xl btn-primary" type="submit">Sign up</button>
                </div>
              </div>
            </div>
          </form>
          <div class="row">
            <div class="col-12">
              <hr class="mt-5 mb-4 border-secondary-subtle">
              <p class="m-0 text-secondary text-end">Already have an account? <a href="#!" class="link-primary text-decoration-none">Sign in</a></p>
            </div>
          </div>
       
        </div>
      </div>
    </div>
  </div>
</section>
@endsection