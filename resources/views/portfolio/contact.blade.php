@extends ('portfolio.master')

@section ('main')

<!-- Contact Section-->
<section class="page-section" id="contact">
    <div class="container">
        <br>
        <br>
        <!-- Contact Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Contact Me</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Contact Section Form-->
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">
                {{-- if condition for errors in seperated box in the fornt of the page --}}
                <!-- -->
            @if($errors->any())
            <div class= "alert alert-danger">
                @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif
                {{-- <div class="alert alert-success">
                    <p>
                        {{ $name  }} <br>
                        {{ $phone }} <br>
                        {{ $email }} <br>
                        {{ $message }} <br>
                    </p>
                </div> --}}
                <form  id="contactForm" action="{{route('contactSub')}}" method="post" enctype="multipart/form-data">
                    @csrf <!-- this code for safty of the form-->
                    <!-- Name input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="name" name="name" value="{{ old('name') }}" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                        <label for="name">Full name</label>
                        @error('name')
                            <span class="text-danger"><!--this is laravel defualt messsage variable-->{{ $message }}</span>
                        @enderror
                        <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                    </div>
                    <!-- Email address input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" name="email" value="{{ old('email') }}" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                        <label for="email">Email address</label>
                        {{-- printing error messsage immdiately after / under the form input--}}
                        <!--"email" is htee name of the inputin the form-->
                        @error('email')
                        {{-- the following is uncorret way to print error, it's just for training and learning --}}
                            <span class="text-danger">{{ 'رجاءً لا تترك الحقل فارغاً' }}</span>
                        @enderror


                        <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                        <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                    </div>
                    <!-- Phone number input-->
                    <!-- this code: data-sb-validations="required" can be deleted-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="phone" name="phone" value="{{ old('phone') }}" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                        <label for="phone">Phone number</label>
                        @error('phone')
                            <span class="text-danger"><!-- $message is a laravel variable for errors and we can change errors by the second way of validation-->{{ $message }}</span>
                        @enderror
                        <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                    </div>
                    <!-- Message input-->
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="message" name="message" value="{{ old('maessage') }}" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                        <label for="message">Message</label>
                        @error('message')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                    </div>
                    <!-- file uploading section
                    There is noo placehoder for file uplading in the form-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="image" name="image" value="{{ old('image') }}" type="file" data-sb-validations="required" />
                        <label for="name">image</label>
                        @error('image')
                            <span class="text-danger"><!--this is laravel defualt messsage variable-->{{ $message }}</span>
                        @enderror
                        <div class="invalid-feedback" data-sb-feedback="name:required">A file is required.</div>
                    </div>
                    <div class=" mb-3">
                        <label for="Education">Education:</label>
                        <select name="Education" id="Education" value="{{ old('Education') }}" class="form-control">
                          <option value="Diploma">Diploma</option>
                          <option value="Master">Master</option>
                          <option value="Bachelor">Bachelor</option>
                          <option value="PHD">PHD</option>
                        </select>
                    </div> 
                    <button class="btn btn-primary btn-xl " id="submitButton" type="submit">Send</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
