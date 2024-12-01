 // Obtener referencias a los campos del formulario
 var nombreInput = document.getElementById('nombre');
 var apellidoInput = document.getElementById('apellido');
 var dniInput = document.getElementById('dni');
 var usuarioInput = document.getElementById('usuario');
 var passwordInput = document.getElementById('clave');
 var eyeIcon = document.querySelector('.eye-icon');

 // Función para generar el nombre de usuario y la contraseña
 function generarCredenciales() {
     // Obtener los valores de los campos
     var nombre = nombreInput.value.trim();
     var apellido = apellidoInput.value.trim();
     var dni = dniInput.value.trim();

     // Generar el nombre de usuario y la contraseña
     var usuario = nombre.charAt(0) + apellido.split(' ')[0];
     // Generar la contraseña
     var primerApellido = apellido.split(' ')[0];
     var segundoApellido = apellido.split(' ')[1] || ''; // Si no hay segundo apellido, usar cadena vacía
     var primeraLetraPrimerApellido = primerApellido.charAt(0).toLowerCase();
     var primeraLetraSegundoApellido = segundoApellido.charAt(0).toLowerCase();
     var pass = dni + primeraLetraPrimerApellido + primeraLetraSegundoApellido;

     // Asignar los valores generados a los campos correspondientes
     usuarioInput.value = usuario.toLowerCase(); // Convertir el usuario a minúsculas
     passwordInput.value = pass;
 }

 // Escuchar eventos de cambio en los campos relevantes y llamar a la función para generar las credenciales
 nombreInput.addEventListener('input', generarCredenciales);
 apellidoInput.addEventListener('input', generarCredenciales);
 dniInput.addEventListener('input', generarCredenciales);

 // Generar las credenciales una vez al cargar la página
 generarCredenciales();

 function togglePassword() {
     var passwordInput = document.getElementById('clave');
     if (passwordInput.type === "password") {
         passwordInput.type = "text";
         eyeIcon.classList.remove('fa-eye-slash');
         eyeIcon.classList.add('fa-eye');
     } else {
         passwordInput.type = "password";
         eyeIcon.classList.remove('fa-eye');
         eyeIcon.classList.add('fa-eye-slash');
     }
 }

 eyeIcon.addEventListener('click', togglePassword);