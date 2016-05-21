@extends('layouts.base')

@section('customstyle')
@stop

@section('content')
<div class="fullwidthbanner-container internas">
    <div class="fullwidthbanner internas">

        <ul>
            <li data-transition="fade">

                <img src="_content/index/slider/1920x547-1.jpg" alt="">

                <h1 class="caption title sft"
                    data-x="0"
                    data-y="100"
                    data-speed="700"
                    data-start="1000"
                    data-easing="easeOutBack">
                    <strong>Contáctenos</strong>
                </h1>

                <div class="caption text sfb"
                    data-x="0"
                    data-y="320"
                    data-speed="700"
                    data-start="1500"
                    data-easing="easeOutBack">
                    Para mas información puede contactarnos en:
                </div>

                <div class="caption icons-1 sfb"
                    data-x="600"
                    data-y="250"
                    data-speed="700"
                    data-start="1800"
                    data-easing="easeOutBack">
                    <span>
                        <i class="ifc-sent"></i>
                    </span>
                </div>

                <div class="caption icons-2 sfb"
                    data-x="700"
                    data-y="200"
                    data-speed="700"
                    data-start="2000"
                    data-easing="easeOutBack">
                    <span>
                        <i class="ifc-read_message"></i>
                    </span>
                </div>

                <div class="caption icons-3 sfb"
                    data-x="800"
                    data-y="150"
                    data-speed="700"
                    data-start="2200"
                    data-easing="easeOutBack">
                    <span>
                        <i class="ifc-help"></i>
                    </span>
                </div>

            </li>



        </ul>

        </div><!-- end .fullwidthbanner -->
</div><!-- end .fullwidthbanner-container -->

<div style="height: 60px;"></div>

            <div class="row">
                <div class="span3">

                    <div class="icon-box-1">

                        <i class="ifc-define_location"></i>

                        <div class="icon-box-content">

                            <h3>Ubíquenos</h3>

                        </div><!-- end .icon-box-content -->

                    </div><!-- end .icon-box-1 -->

                     <!-- <p>Para mas información puedes contactarnos en:</p> -->

                    <address>
                      <strong>Oficinas</strong><br>
                      <a href="https://goo.gl/maps/ZXgZXRn33Hy" target="_blank">Calle 44 # 67 A 55 Salitre el Greco</a><br>
                      Bogotá D.C.<br>
                      <br>
                      Teléfono: (57+1) 315 5562 <br>
                      Móviles: 321 407 7576 -
                      310 317 5728 <br>
                      Email: <a href="mailto:info@suprocesoaldia.com">info@suprocesoaldia.com</a>
                    </address>

                </div><!-- end .span3 -->
                <div class="span9">

                    <h3>Envíenos sus datos</h3>

                    <br>

                    {{ Form::open(array('route' => 'contactenos.post', 'class' => 'fixed', 'name' => 'contact-form', 'id' => 'contact-form')) }}

                    <fieldset>

                        <div id="formstatus">{{ $mensaje }}</div>

                        <div class="row">
                            <div class="span3 {{ $errors->first('name', 'validation-error') }}">

                                {{ Form::input('text', 'name', null, array('placeholder' => 'Nombre', 'class' => $errors->first('name', 'validation-error') )) }}

                                {{ $errors->first('name', '<label for="name" class="validation-error" style="display: block;">:message</label>') }}


                            </div><!-- edd .span3 -->
                            <div class="span3">

                                {{ Form::input('text', 'email', null, array('placeholder' => 'E-mail', 'class' => $errors->first('email', 'validation-error') )) }}

                                {{ $errors->first('email', '<label for="email" class="validation-error" style="display: block;">:message</label>') }}

                            </div><!-- edd .span3 -->
                            <div class="span3">

                                {{ Form::input('text', 'telephone', null, array('placeholder' => 'Teléfono', 'class' => $errors->first('telephone', 'validation-error') )) }}

                                {{ $errors->first('telephone', '<label for="telephone" class="validation-error" style="display: block;">:message</label>') }}

                            </div><!-- edd .span3 -->
                        </div><!-- end .row -->

                        {{ Form::textarea('msg', null, array('class' => 'span9', 'placeholder' => 'Mensaje' )) }}
                        {{ $errors->first('msg', '<label for="msg" class="validation-error" style="display: block;">:message</label>') }}

                        {{ Form::input('hidden', 'contacto') }}
                        {{ Form::input('submit', null, 'Enviar', array('class' => 'btn btn-green-dark float-right')) }}

                    </fieldset>

                    {{ Form::close() }}

                    <!-- <form class="fixed" id="contact-form"  name="contact-form" method="post" action="_layout/php/send.php">
                        <fieldset>

                            <div id="formstatus">{{ $mensaje }}</div>

                            <div class="row">
                                <div class="span3">

                                    <input id="name" type="text" name="name" value="" placeholder="nombre">

                                </div><!-- edd .span3
                                <div class="span3">

                                    <input id="email" type="text" name="email" value="" placeholder="e-mail">

                                </div><!-- edd .span3
                                <div class="span3">

                                    <input id="telephone" type="text" name="telephone" value="" placeholder="teléfono" >

                                </div><!-- edd .span3
                            </div><!-- end .row

                            <textarea class="span9" id="message" name="message" rows="10" cols="25" placeholder="comentario"></textarea>

                            <input class="btn btn-green-dark float-right" id="submit" type="submit" name="submit" value="Enviar">

                        </fieldset>
                    </form> -->

                </div><!-- end .span9 -->
            </div><!-- end .row -->
@stop

@section('customscript')
@stop
