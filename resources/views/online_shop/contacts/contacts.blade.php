@extends('online_shop.layouts.main_wide')

@section('page_Heading')
    Localização
@stop

@section('section')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="/">Entrada</a>
                </li>
                <li class="active">Localização</li>
            </ol>
        </div>
    </div>
        <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
            <div class="col-md-8">
                <!-- Embedded Google Map -->
                  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d324828.9002522116!2d-8.80063342859985!3d39.54718003112829!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd2276238dc72131%3A0x30b44128438bbe00!2sR.+da+Lagoa+31%2C+2495%2C+Portugal!5e0!3m2!1sen!2spt!4v1456702664051"
                    width="90%"
                    height="300"
                    frameborder="1"
                    style="border:0"
                    allowfullscreen></iframe>
            </div>
            <!-- Contact Details Column -->
            <div class="col-md-4">
                <h3>Informações</h3>
                <p>
                    Rua da Lagoa 31, <br>2495-016 Casal Dos Lobos,<br> Leiria, Portugal<br>
                </p>
                <p><i class="fa fa-phone"></i>
                    <abbr title="Telefone">P</abbr>: (+351) 918 619 751</p>
                <p><i class="fa fa-envelope-o"></i>
                    <abbr title="Email">E</abbr>: <a href="mailto:geral@pcqar.pt">geral@pcqar.pt</a>
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
                <form name="sentMessage" id="contactForm" method="POST" action="/contactos/email"  novalidate>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="control-group form-group required">
                        <div class="controls">
                            <label>Nome Completo:</label>
                            <input type="text" class="form-control" name="name" required data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group required">
                        <div class="controls">
                            <label>Número de Contacto:</label>
                            <input type="tel" class="form-control" name="phone" required data-validation-required-message="Please enter your phone number.">
                        </div>
                    </div>
                    <div class="control-group form-group required">
                        <div class="controls">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email" required data-validation-required-message="Please enter your email address.">
                        </div>
                    </div>
                    <div class="control-group form-group required">
                        <div class="controls">
                            <label>Mensagem:</label>
                            <textarea rows="10" cols="100" class="form-control" name="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                        </div>
                    </div>
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-primary">Enviar Messagem</button>
                </form>
            </div>

        </div>
 @stop
