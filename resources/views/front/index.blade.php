@extends ('layouts/nav')

@section ('content')
<section class="cid-rRCnzIDhFl mbr-fullscreen mbr-parallax-background" id="header2-5">
    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(35, 35, 35);"></div>
    <div class="container align-center justify-content-center">
        <div class="d-flex flex-row">
            <div class="mbr-white col-md-6">
                <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-2">
                    Go to News
                </h1>
                <div class="mbr-section-btn">
                    <a class="btn btn-md btn-secondary display-4" href="/news">News</a>
                </div>
            </div>
            <hr>
            <div class="mbr-white col-md-6">
                <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-2">
                    Go to Products
                </h1>
                <div class="mbr-section-btn">
                    <a class="btn btn-md btn-secondary display-4" href="/product">Products</a>
                </div>
            </div>
        </div>
    </div>
    <div class="mbr-arrow hidden-sm-down" aria-hidden="true">
        <a href="#next">
            <i class="mbri-down mbr-iconfont"></i>
        </a>
    </div>
</section>

<section class="mbr-section form1 cid-rSTlrDPiqZ py-5" id="form1-6">
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                    CONTACT FORM
                </h2>
                <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
                    Easily add subscribe and contact forms without any server-side integration.
                </h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8" data-form-type="formoid">
                <!---Formbuilder Form--->
                <form action="/contact_message" method="POST" class="mbr-form form-with-styler"
                    data-form-title="Mobirise Form"><input type="hidden" name="email" data-form-email="true"
                        value="n+ANsyGeQJBLGZwMCkcf7gKKDsMb4MTdMyxVC3qKYiSokOhRPfHe3jf3LzUdqfiVxLIZKEIlvNPwGPZsIjiNkXM/COYq/AF4kETvb4leDOBdpKCFongBlVZvSDZNgYdT">
                        @csrf
                    <div class="row">
                        <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Thanks for filling
                            out the form!</div>
                        <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">
                        </div>
                    </div>
                    <div class="dragArea row">
                        <div class="col-md-4  form-group" data-for="name">
                            <label for="name-form1-6" class="form-control-label mbr-fonts-style display-7">Name</label>
                            <input type="text" name="name" data-form-field="Name" required="required"
                                class="form-control display-7" id="name-form1-6">
                        </div>
                        <div class="col-md-4  form-group" data-for="email">
                            <label for="email-form1-6"
                                class="form-control-label mbr-fonts-style display-7">Email</label>
                            <input type="email" name="email" data-form-field="Email" required="required"
                                class="form-control display-7" id="email-form1-6">
                        </div>
                        <div data-for="phone" class="col-md-4  form-group">
                            <label for="phone-form1-6"
                                class="form-control-label mbr-fonts-style display-7">Phone</label>
                            <input type="tel" name="phone" data-form-field="Phone" class="form-control display-7"
                                id="phone-form1-6">
                        </div>
                        <div data-for="message" class="col-md-12 form-group">
                            <label for="message-form1-6"
                                class="form-control-label mbr-fonts-style display-7">Message</label>
                            <textarea name="message" data-form-field="Message" class="form-control display-7"
                                id="message-form1-6"></textarea>
                        </div>
                        <div class="d-flex">
                            <div class="mx-3">
                                {{-- {!! htmlFormSnippet() !!} --}}
                                {{-- @error('g-recaptcha-response')
                                    <div class="alert alert-danger">{{ "Please check reCAPTCHA." }}</div>
                                @enderror --}}
                            </div>
                            <div class="col-md-12 input-group-btn align-center">
                                <button type="submit" class="btn btn-primary btn-form display-4">SEND FORM</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!---Formbuilder Form--->
            </div>
        </div>
    </div>
</section>
@endsection
