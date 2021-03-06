<?php
    require 'includes/app.php';
    $inicio=true;
    incluirTemplate('header');
    ?>

<main class="contenedor seccion">
  <h1>Contacto</h1>
  <picture>
    <source srcset="build/img/destacada3.webp" type="image/webp">
    <source srcset="build/img/destacada3.jpg" type="image/jpeg">
    <img src="build/img/destacada3.jpg" loading="lazy" alt="Imagen  contacto">
  </picture>

  <h2>Llene el formulario de contacto</h2>
  <form class="formulario">
    <fieldset> <!--Campos relacionados-->
      <legend>Informacion personal</legend>
      <label for="nombre">Nombre</label>
      <input type="text" placeholder="Tu nombre" id="nombre">

      <label for="email">E-mail</label>
      <input type="email" placeholder="Tu email" id="email">

      <label for="telefono">Telefono</label>
      <input type="tel" placeholder="Tu telefono" id="telefono">

      <label for="mensaje">Mensaje</label>
      <textarea id="mensaje"></textarea>
    </fieldset>

    <fieldset>
      <legend>Informacion sobre la propiedad</legend>
      <label for="opciones">Vende o compra</label>
      <select id="opciones">
        <option value="" disabled selected> --Seleccione-- </option>
        <option value="compra">Compra</option>
        <option value="vende">Vende</option>
      </select>

      <label for="presupuesto">Precio o presupuesto</label>
      <input type="number" placeholder="Tu precio o presupuesto" id="presupuesto">
    </fieldset>

    <fieldset>
      <legend>Contacto</legend>
      <p>Como desea ser contactado</p>

      <div class="forma-contacto">
        <label for="contacto-telefono">Telefono</label>
        <input name="contacto" type="radio" value="telefono" id="contacto-telefono">

        <label for="contacto-email">E-mail</label>
        <input name="contacto" type="radio" value="E-mail" id="contacto-email"> <!--El name funciona para que solo se pueda seleccionar una opcion en un radiobutton-->
      </div>

        <p>Si eligio telefono, elija la fecha y la hora para ser contactado</p>

        <label for="fecha">Fecha</label>
        <input type="date"  id="fecha">

        <label for="hora">Hora</label>
        <input type="time"  id="hora" min="9:00" max="18:00">
    </fieldset>

    <input type="submit" value="Enviar" class="boton-verde">

  </form>
</main>

<?php incluirTemplate('footer');?>


<script src="build/js/bundle.js"></script>
</body>
</html>