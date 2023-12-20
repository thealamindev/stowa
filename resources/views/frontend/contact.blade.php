
@extends('layouts.frontendmaster')
@section('content')


<section class="contact_section section_space">
    <div class="container">
        <div class="row">
            <div class="col col-lg-6">
                <div class="contact_info_wrap">
                    <h3 class="contact_title">Address <span>Information</span></h3>
                    <div class="decoration_image">
                        <img src="assets/images/leaf.png" alt="image_not_found">
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="contact_info_list">
                                <h4 class="list_title">Colourbar U.S.A</h4>
                                <ul class="ul_li_block">
                                    <li>Dhaka In Twin Tower Concord </li>
                                    <li>Shopping Complex</li>
                                    <li>Open  Closes 8:30PM </li>
                                    <li>yourinfo@gmail.com</li>
                                    <li>(1200)-0989-568-331</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col col-md-6">
                            <div class="contact_info_list">
                                <h4 class="list_title">USA Exchanger</h4>
                                <ul class="ul_li_block">
                                    <li>Dhaka In Twin Tower Concord </li>
                                    <li>Shopping Complex</li>
                                    <li>Open  Closes 8:30PM </li>
                                    <li>yourinfo@gmail.com</li>
                                    <li>(1200)-0989-568-331</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col col-lg-6">
                <div class="contact_info_wrap">
                    <h3 class="contact_title">Get In Touch <span>Inform Us</span></h3>
                    <div class="decoration_image">
                        <img src="{{ asset('frontend_assets') }}/images/leaf.png" alt="image_not_found">
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <form action="{{ route('contactpost') }}" method="POST">
                        @csrf
                        <div class="form_item">
                            <input id="contact-form-name" type="text" name="name" placeholder="Your Name">
                        </div>
                        <div class="row">
                            <div class="col col-md-6 col-sm-6">
                                <div class="form_item">
                                <input id="contact-form-email" type="email" name="email" placeholder="Your Email">
                            </div>
                            </div>
                            <div class="col col-md-6 col-sm-6">
                                <div class="form_item">
                                    <input type="text" name="subject" placeholder="Your Subject">
                                </div>
                            </div>
                        </div>
                        <div class="form_item">
                            <textarea id="contact-form-message" name="message" placeholder="Message"></textarea>
                        </div>

                        <button  type="submit" class="btn btn_dark">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('footer_script')

@if (session('contact_sent'))

<script>

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 5000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: "{{ session('contact_sent') }}"
})

</script>

@endif

@endsection
