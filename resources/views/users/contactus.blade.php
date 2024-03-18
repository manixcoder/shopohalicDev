@extends('users.master')
@section('pageTitle','index')
@section('content')
<div class="breadcrumb-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <ul>
            <li><a href="{{ URL::to('/') }}">Home</a></li>
            <li>></li>
            <li><a href="{{ URL::to('/contactus') }}">Contact Us</a></li>
          </ul>
        </div>                                                                                                            
      </div>                    
    </div>                                                                           
  </div>                                                                                                                                                     
  <div class="contact-page">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <h1 class="main-heading">Infromation</h1>  
          <ul>
            <li>
              <h3>Address</h3>
              <p>Address Line 1, Address line 2 <br /> City Name, State, Pincode, County.</p>
            </li>
            <li>               
              <h3>Call Us</h3>
              <p><a href="tel:+91-95125 00091/92/93">+91-95125 00091/92/93</a></p>
              <p><a href="tel:+91-261-2890893/94">+91-261-2890893/94</a></p>
            </li>
            <li>
              <h3>Email</h3>
              <p><a href="mailto:shopholic@eummyemail.com">shopholic@eummyemail.com</a></p>
            </li>
          </ul>                                         
        </div>                                                                          
        <div class="col-md-6 col-sm-6">
          <form>
          <h1 class="main-heading">Send a message</h1>
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="form-group">
                <div class="input">
                  <input type="text" name="fname" class="form-control" required="">
                  <label for="fname">First Name</label>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="form-group">
                <div class="input">
                  <input type="email" name="email" class="form-control" required="">
                  <label for="email">Email ID</label>
                </div>                                                                   
              </div>                                                                     
            </div>                                                                                       
            <div class="col-md-6 col-sm-6">
              <div class="form-group">
                <div class="input">
                  <input type="tel" name="phone" class="form-control" required="">
                  <label for="phone">Phone Number</label>
                </div>                                                                      
              </div>                                                                                                                        
            </div>                             
            <div class="col-md-12 col-sm-12">
              <div class="form-group">
                <textarea class="form-control" placeholder="Write Message"></textarea>        
              </div>            
            </div>
            <div class="col-md-12 col-sm-12 submit-btn text-center">
              <button type="submit" class="btn btn-default">SUBMIT</button>
            </div>
          </div> 
          </form>                         
        </div>
      </div>
    </div>
  </div>                                                                                                                     

  <div class="map-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.402886918667!2d2.333693615087876!3d48.86959570787257!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e3a4ff9d82d%3A0x2a2f2bde04530a39!2sQuatre%20Septembre!5e0!3m2!1sen!2sin!4v1634576626669!5m2!1sen!2sin" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
      </div>
    </div>
  </div>
    @stop