@extends('header')
<br>
<br>
<br>
<br>
<br>
<br>
@section('title', 'Contact')

@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Contact</h2>
					<hr>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-12">
                    <div class="wrapper">
                        <div class="row justify-content-center">
                            <div class="col-lg-8 mb-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="dbox w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center">
                                                <span class="fa fa-map-marker"></span>
                                            </div>
                                            <div class="text">
                                                <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="dbox w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center">
                                                <span class="fa fa-phone"></span>
                                            </div>
                                            <div class="text">
                                                <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="dbox w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center">
                                                <span class="fa fa-paper-plane"></span>
                                            </div>
                                            <div class="text">
                                                <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="contact-wrap">
                                    <h3 class="mb-4 text-center">Get in touch with us</h3>
                                    <div id="form-message-warning" class="mb-4 w-100 text-center"></div>
                                    <div id="form-message-success" class="mb-4 w-100 text-center" style="display:none; color:green">
                                        Your message was sent, thank you! <br><br>
                                        <center>
                                         <button class="btn btn-info"><a href="{{route('home')}}" class="btn btn-info">Home</a>
                                         </button>
                                         <center>
                                    </div>
                                    <form method="POST" id="contactForm" name="contactForm" class="contactForm" action="{{ route('contact.store') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required>
                                                </div>
                                            </div>
											<br>
<br>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                                </div>
                                            </div>
											<br>
<br>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                                                </div>
                                            </div>
											<br>
<br>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea name="message" class="form-control" id="message" cols="30" rows="8" placeholder="Message" required></textarea>
                                                </div>
                                            </div>
											<br><br><br>
<br>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="submit" value="Send Message" class="btn btn-primary">
                                                    <div class="submitting"></div>
                                                </div>
												<br>
<br>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // JavaScript to handle form submission response
        document.getElementById("contactForm").addEventListener("submit", function(event) {
            event.preventDefault();
            var form = $(this);
            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: form.serialize(),
                success: function(response) {
                    $('#form-message-success').show();
                    $('#form-message-warning').hide();
                    form.find("input[type=text], input[type=email], textarea").val("");
                },
                error: function(xhr, status, error) {
                    $('#form-message-warning').html(xhr.responseText).show();
                    $('#form-message-success').hide();
                }
            });
        });
    </script>
@endsection
