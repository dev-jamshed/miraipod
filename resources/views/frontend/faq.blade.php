@extends('frontend.layouts.master_layout')

@section('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap');


.accordion-container {
    /* width: 80%; */
    /* max-width: 600px;
    margin: 20px auto; */
}

.accordion-item {
    background-color: #FFFFFF; /* White background for items */
    border: 1px solid #E0E0E0; /* Light border */
    border-radius: 8px;
    margin-bottom: 10px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1); /* Softer shadow */
}

.accordion-header {
    background-color: var(--primary-color); /* Soft purple */
    color: #FFFFFF; /* White text */
    padding: 15px;
    font-size: 18px;
    border: none;
    width: 100%;
    text-align: left;
    cursor: pointer;
    outline: none;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-radius: 8px 8px 0 0;
    transition: background-color 0.3s ease;
}

.accordion-header:hover {
    background-color: var(--btn-hover-color); /* Darker shade of purple */
}

.accordion-content {
    background-color: #FAFAFA; /* Very light grey for content */
    overflow: hidden;
    padding: 0 15px;
    max-height: 0;
    transition: max-height 0.3s ease;
}

.accordion-content p {
    margin: 15px 0;
    line-height: 1.5;
}

.icon {
    transition: transform 0.3s ease;
}

.active .icon {
    transform: rotate(45deg);
}

</style>
@endsection


@section('content')



 <!--================Post Gallery Slider Area =================-->
 <section class="about_image mb-5">
    <img class="img-fluid banner-img" src="{{asset('frontend')}}/images/footer-backgorund.png" alt="">
    <div class="overlay-text">
        <div>
            <h1>Faqs</h1>
            <p>Home / Faqs</p>
        </div>
    </div>
</section>
<!--================End Post Gallery Slider Area =================-->



<div class="accordion-container container" style="margin-bottom:100px ">

    <div class="heading-header mb-5">

        <h2 >Frequently Asked Questions</h2>
    </div>

    <div class="accordion-item">
        <button class="accordion-header">
            Can I buy a vehicle for use in Japan?
            <span class="icon">+</span>
        </button>
        <div class="accordion-content">
            <p>Yes, you can buy a vehicle for use in Japan.</p>
        </div>
    </div>
    <div class="accordion-item">
        <button class="accordion-header">
            Is it possible to request vehicles that are not currently listed on your website?






            <span class="icon">+</span>
        </button>
        <div class="accordion-content">
            <p>Absolutely! Please feel free to let us know what you are looking for. Our team will make every effort to find the vehicle that best meets your needs.






            </p>
        </div>
    </div>
    <div class="accordion-item">
        <button class="accordion-header">
            Do you provide the manufacturing year of your vehicles in the listings?






            <span class="icon">+</span>
        </button>
        <div class="accordion-content">
            <p>Yes, we provide the manufacturing year when available. However, we cannot guarantee the accuracy of this information as it is supplied by a third party. We are not responsible for any losses, damages, or issues arising from this information.

            </p>
        </div>
    </div>
    <div class="accordion-item">
        <button class="accordion-header">
            Which currencies do you accept?






            <span class="icon">+</span>
        </button>
        <div class="accordion-content">
            <p>
                Primarily, we deal in U.S dollars and Japanese yen. But all other currencies also acceptable.
                
                Please note that all payments must be in the form of a bank remittance so that the buyer and seller have an official written record of the payment transaction. Under no circumstances do we accept any form of cash. </p>
        </div>
    </div>
    <div class="accordion-item">
        <button class="accordion-header">
            Can you ship auto parts inside the vehicle I am buying?
            <span class="icon">+</span>
        </button>
        <div class="accordion-content">
            <p>
                No, we are not allowed to put anything inside the vehicle unless it is shipped by container.</p>
        </div>
    </div>
    <div class="accordion-item">
        <button class="accordion-header">
            What are the rules/regulations for importing a vehicle?
 <span class="icon">+</span>
        </button>
        <div class="accordion-content">
            <p>For information on export rules and procedures specific to your country, including pre-export inspection requirements, please refer to the appropriate government authorities. Additionally, we highly recommend conducting thorough research on the expectations and responsibilities involved in importing a vehicle into your country to fully understand any associated risks.






            </p>
        </div>
    </div>
    <div class="accordion-item">
        <button class="accordion-header">
            Can you show me the condition of the vehicle?
            <span class="icon">+</span>
        </button>
        <div class="accordion-content">
            <p>We provide 10 to 15 detailed pictures of the vehicle to help with your buying decision.

            </p>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<script>
    document.querySelectorAll('.accordion-header').forEach(button => {
    button.addEventListener('click', () => {
        const accordionContent = button.nextElementSibling;

        button.classList.toggle('active');

        if (button.classList.contains('active')) {
            accordionContent.style.maxHeight = accordionContent.scrollHeight + 'px';
        } else {
            accordionContent.style.maxHeight = 0;
        }

        // Close other open accordion items
        document.querySelectorAll('.accordion-header').forEach(otherButton => {
            if (otherButton !== button) {
                otherButton.classList.remove('active');
                otherButton.nextElementSibling.style.maxHeight = 0;
            }
        });
    });
});
</script>

@endsection
