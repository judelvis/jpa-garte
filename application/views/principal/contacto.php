<section id="content">
  <div class="width-wrapper width-wrapper__inset1">
    <div class="wrapper1 wrapper7">
      <div class="container">
        <div class="row">
          <div class="grid_12">
            <div class="heading1 heading1__offset1">
              <h2>Contacto</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="grid_3">
            <address class="contacts-address wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
              <span class="our-address">DIRECCION,<br>DIRECCION.</span>
              <span class="wrapper"><span class="wide">OFICINA:</span>+1 800 559 6580</span>
              <span class="wrapper"><span class="wide">Telefono:</span>+1 800 603 6035</span>
              <span class="wrapper"><span class="wide">FAX:</span>+1 800 889 9898</span>
              <span class="wrapper"><span class="wide">E-mail:</span><a href="mailto:jud.prog@gmail.com">jud.prog@gmail.com</a></span>
            </address>
          </div>
          <div class="grid_9">
            <form id="contact-form">
              <div class="contact-form-loader"></div>
              <fieldset>
                <div class="row">
                  <div class="grid_3">
                    <span class="heading wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s">Su Nombre:</span>
                    <label class="name wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                      <input type="text" name="name" id="name" placeholder="Nombre:"
                             data-constraints="@Required @JustLetters"/>
                      <span class="empty-message">*Este campo es necesario.</span>
                    </label>
                  </div>
                  <div class="grid_3">
                    <span class="heading wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.2s">Su E-mail:</span>
                    <label class="email wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                      <input type="text" name="email" id="email" placeholder="E-mail:" value=""
                             data-constraints="@Required @Email"/>
                      <span class="empty-message">*Este campo es necesario.</span>
                      <span class="error-message">*Email no valido.</span>
                    </label>
                  </div>
                  <div class="grid_3">
                    <span class="heading wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s">Su Telefono:</span>
                    <label class="phone wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                      <input type="text" name="telephone" id="telephone" placeholder="Telefono" value=""
                             data-constraints="@Required @JustNumbers"/>
                      <span class="empty-message">*Este campo es necesario.</span>
                      <span class="error-message">*Telefono no valido.</span>
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="grid_9">
                    <span class="heading wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.4s">Su Mensaje:</span>
                    <label class="message wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                      <textarea name="message" id="message" placeholder="Mensaje:"
                                data-constraints='@Required @Length(min=20,max=999999)'></textarea>
                      <span class="empty-message">*Este campo es necesario.</span>
                      <span class="error-message">*Mensaje demasiado corto.</span>
                    </label>
                  </div>
                </div>
                <!-- <label class="recaptcha"><span class="empty-message">*This field is required.</span></label> -->
                <div class="" data-wow-duration="1s" data-wow-delay="0.1s">
                  <a href="#" data-type="submit" class="btn-default" onclick='enviar();'><span>Enviar</span></a>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="<?php echo __JSVIEW__;?>maqueta/mail.js"></script>