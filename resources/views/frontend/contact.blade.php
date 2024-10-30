@extends('frontend.layouts.master_layout')
@section('styles')
    <link rel="stylesheet" href="{{asset('frontend')}}/css/contact.css">
@endsection
@section('content')
@php
$companyInfo = \App\Helpers\getCompanyInfo(); 
 
@endphp


    <!--================Post Gallery Slider Area =================-->
    <section class="about_image">
        <img class="img-fluid banner-img" src="{{asset('frontend')}}/images/footer-backgorund.png" alt="">
        <div class="overlay-text">
            <div>
                <h1>Contact</h1>
                <p>Home / Contact</p>
            </div>
        </div>
    </section>
    <!--================End Post Gallery Slider Area =================-->




    <!--================Contact Area =================-->

    <section class="contact-container">
        <span class="big-circle"></span>
        <img src="img/shape.png" class="square" alt="" />
        <div class="form">
            <div class="contact-info">
               <h3 class="title">Connect With Us for Your Next Dream Car</h3>
<p class="text mb-2">
    Have questions or need assistance? Reach out to us, and let us help you find the perfect car from Japan’s top auctions!
</p>

<div class="info">
    <div class="information">
        <i class="fas fa-map-marker-alt"></i> &nbsp;&nbsp;
        <p>{{ $companyInfo->office_address }}</p>
    </div>
    
    @if(!empty($companyInfo->email_1))
        <div class="information">
            <i class="fas fa-envelope"></i> &nbsp;&nbsp;
            <div>
                <p>{{ $companyInfo->email_1 }}</p>
            </div>
        </div>
    @endif

    @if(!empty($companyInfo->email_2))
        <div class="information">
            <i class="fas fa-envelope"></i> &nbsp;&nbsp;
            <div>
                <p>{{ $companyInfo->email_2 }}</p>
            </div>
        </div>
    @endif

    @if(!empty($companyInfo->email_3))
        <div class="information">
            <i class="fas fa-envelope"></i> &nbsp;&nbsp;
            <div>
                <p>{{ $companyInfo->email_3 }}</p>
            </div>
        </div>
    @endif

    @if(!empty($companyInfo->email_4))
        <div class="information">
            <i class="fas fa-envelope"></i> &nbsp;&nbsp;
            <div>
                <p>{{ $companyInfo->email_4 }}</p>
            </div>
        </div>
    @endif

    @if(!empty($companyInfo->phone_1))
        <div class="information">
            <i class="fas fa-phone"></i>&nbsp;&nbsp;
            <p>{{ $companyInfo->phone_1 }}</p>
        </div>
    @endif

    @if(!empty($companyInfo->phone_2))
        <div class="information">
            <i class="fas fa-phone"></i>&nbsp;&nbsp;
            <p>{{ $companyInfo->phone_2 }}</p>
        </div>
    @endif

    @if(!empty($companyInfo->phone_3))
        <div class="information">
            <i class="fas fa-phone"></i>&nbsp;&nbsp;
            <p>{{ $companyInfo->phone_3 }}</p>
        </div>
    @endif

    @if(!empty($companyInfo->phone_4))
        <div class="information">
            <i class="fas fa-phone"></i>&nbsp;&nbsp;
            <p>{{ $companyInfo->phone_4 }}</p>
        </div>
    @endif
</div>


                <div class="social-media">
                    <p>Connect with us :</p>
                    <div class="social-icons">
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="contact-form">
                <span class="circle one"></span>
                <span class="circle two"></span>

                <form action="{{route('contact.store')}}" method="POST" id="contactForm">
                    @csrf
                    <h3 class="title">Contact us</h3>
                    <div class="input-container">
                        <input type="text" name="name" class="input" />
                        <label for="">Name</label>
                        <span>Name</span>
                    </div>
                    <div class="input-container">
                        <input type="email" name="email" class="input" />
                        <label for="">Email</label>
                        <span>Email</span>
                    </div>
                    <div class="input-container">
                        <input type="tel" name="phone" class="input" />
                        <label for="">Phone</label>
                        <span>Phone</span>
                    </div>
                    <div class="input-container">
                        <input type="text" name="subject" class="input" />
                        <label for="">subject</label>
                        <span>Subject</span>
                    </div>
                    <div class="input-container textarea">
                        <textarea name="message" class="input"></textarea>
                        <label for="">Message</label>
                        <span>Message</span>
                    </div>
                    <input type="submit" id="submitForm" value="Send" class="btn" />
                </form>
            </div>
        </div>
    </section>
    <!--================End Contact Area =================-->
@endsection


@section('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#submitForm').click(function(e) {
            e.preventDefault();

            // Serialize the form data
            var formData = $('#contactForm').serialize();

            // Submit the form via Ajax
            $.ajax({
                type: 'POST',
                url: $('#contactForm').attr('action'),
                data: formData,
                success: function(response) {
                    console.log(response)
                    // If successful, display success message
                    Swal.fire({
                    title: "Query Submitted",
                    text: response.message,
                    icon: "success"
                    });

                    $('#contactForm')[0].reset();
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log(xhr)

                    // If error, display error message
                    $('.error-message').show().html('We\'re sorry, but something went wrong');
                    Swal.fire({
                    title: "Could'nt Send",
                    text: 'We\'re sorry, but something went wrong',
                    icon: "error"
                    });
                }
            });
        });
    });
</script>


<script>
    const inputs = document.querySelectorAll(".input");

        function focusFunc() {
        let parent = this.parentNode;
        parent.classList.add("focus");
        }

        function blurFunc() {
        let parent = this.parentNode;
        if (this.value == "") {
            parent.classList.remove("focus");
        }
        }

        inputs.forEach((input) => {
        input.addEventListener("focus", focusFunc);
        input.addEventListener("blur", blurFunc);
        });

</script>

@endsection
