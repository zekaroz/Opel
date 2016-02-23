@extends('online_shop.layouts.main_wide')

@section('page_Heading')
    Contactos
@stop

@section('section')
        <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
            <div class="col-md-8">
                <!-- Embedded Google Map -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6262.517239888821!2d-8.72279894042573!3d39.659931896099785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd227623ad900345%3A0x3776c3cf29bb56c4!2sR.+da+Sra.+do+Monte%2C+2495!5e0!3m2!1spt-PT!2spt!4v1452726336986" 
                width="100%" 
                height="450" 
                frameborder="0" 
                style="border:0" 
                allowfullscreen></iframe>
            </div>
            <!-- Contact Details Column -->
            <div class="col-md-4">
                <h3>Direcções</h3>
                <p>
                    Rua Nossa Senhora do Monte, 2495<br>
                </p>
                <p><i class="fa fa-phone"></i> 
                    <abbr title="Telefone">P</abbr>: (+351) 918 619 751</p>
                <p><i class="fa fa-envelope-o"></i> 
                    <abbr title="Email">E</abbr>: <a href="mailto:info@reciopel.online">reciopel@reciopel.online</a>
                </p>
                <p><i class="fa fa-clock-o"></i> 
                    <abbr title="Hours">Horário</abbr>: Segunda - Sexta: das 9:00 AM às 6:00 PM</p>
                <ul class="list-unstyled list-inline list-social-icons">
                    <li>
                        <a href="https://www.facebook.com/reciopel/" target="_blank"><i class="fa fa-facebook-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-linkedin-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-google-plus-square fa-2x"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->

        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        <div class="row">
            <div class="col-md-8">
                <h3>Contacte-nos</h3>
                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="control-group form-group required">
                        <div class="controls">
                            <label>Nome Completo:</label>
                            <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group required">
                        <div class="controls">
                            <label>Número de Contacto:</label>
                            <input type="tel" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
                        </div>
                    </div>
                    <div class="control-group form-group required">
                        <div class="controls">
                            <label>Email:</label>
                            <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
                        </div>
                    </div>
                    <div class="control-group form-group required">
                        <div class="controls">
                            <label>Mensagem:</label>
                            <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                        </div>
                    </div>
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-primary">Enviar Messagem</button>
                </form>
            </div>

        </div>
 @stop