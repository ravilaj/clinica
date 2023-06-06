function validateForm() {
  let nombre = document.forms["registration-form"]["nombre"].value;
  let apellido = document.forms["registration-form"]["apellidos"].value;
  let dni = document.forms["registration-form"]["dni"].value;
  let fecha_nacimiento = document.forms["registration-form"]["fecha_nacimiento"].value;
  let genero = document.forms["registration-form"]["genero"].value;
  let direccion = document.forms["registration-form"]["direccion"].value;
  let telefono = document.forms["registration-form"]["telefono"].value;
  let email = document.forms["registration-form"]["email"].value;
  let password = document.forms["registration-form"]["password"].value;


  // Validar nombre
  if (nombre == "") {
    document.getElementById("nombre-error").innerHTML = "El campo Nombre es obligatorio"; // Para sacar el error de javascript en el span
    return false;
  } else {
  document.getElementById("nombre-error").innerHTML = "";
  }

  // Validar apellido
  if (apellido == "") {
    document.getElementById("apellido-error").innerHTML = "El campo Apellido es obligatorio"; // Para sacar el error de javascript en el span
    return false;
  } else {
  document.getElementById("apellido-error").innerHTML = "";
  }

  // Validar DNI
  if (!/^[0-9]{8}[A-Za-z]{1}$/.test(dni)) {
    document.getElementById("dni-error").innerHTML = "El DNI no es válido (debe tener 8 dígitos y una letra al final)"; // Para sacar el error de javascript en el span
    return false;
  } else {
  document.getElementById("dni-error").innerHTML = "";
  }

  // Validar fecha de nacimiento
  let edad = calculateAge(fecha_nacimiento);
  if (edad < 18) {
    document.getElementById("fecha-error").innerHTML = "Debes ser mayor de edad para registrarte"; // Para sacar el error de javascript en el span
    return false;
  } else {
  document.getElementById("fecha-error").innerHTML = "";
  }

  // Validar género
  if (genero == "") {
    document.getElementById("genero-error").innerHTML = "El campo Género es obligatorio"; // Para sacar el error de javascript en el span
    return false;
  } else {
  document.getElementById("genero-error").innerHTML = "";
  }

  // Validar dirección
  if (direccion == "") {
    document.getElementById("direccion-error").innerHTML = "El campo Dirección es obligatorio"; // Para sacar el error de javascript en el span
    return false;
  } else {
  document.getElementById("direccion-error").innerHTML = "";
  }

  // Validar teléfono
  if (!/^[0-9]{9}$/.test(telefono)) {
    document.getElementById("telefono-error").innerHTML = "El teléfono no es válido (debe tener 9 dígitos)"; // Para sacar el error de javascript en el span
    return false;
  } else {
  document.getElementById("telefono-error").innerHTML = "";
  }

  // Validar email
  if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
    document.getElementById("correo-error").innerHTML = "El correo electronico no es valido"; // Para sacar el error de javascript en el span
    return false;
  } else {
  document.getElementById("correo-error").innerHTML = "";
  }

  // Validar contraseña
  if (password.length < 8) {
    document.getElementById("password-error").innerHTML = "La contraseña debe tener al menos 8 caracteres"; // Para sacar el error de javascript en el span
    return false;
  } else {
  document.getElementById("password-error").innerHTML = "";
  }
  // Si todos los campos son válidos, se envía el formulario
  return true;
}

// Función para calcular la edad a partir de la fecha de nacimiento
function calculateAge(birthday) {
  let today = new Date();
  let birthDate = new Date(birthday);
  let age = today.getFullYear() - birthDate.getFullYear();
  let month = today.getMonth() - birthDate.getMonth();
  if (month < 0 || (month === 0 && today.getDate() < birthDate.getDate())) {
    age--;
  }
  return age;
}


/* Validar medico*/
function validaForm() {
  let nombre = document.forms["registro-form_me"]["nombre"].value;
  let apellido = document.forms["registro-form_me"]["apellido"].value;
  let dni = document.forms["registro-form_me"]["dni"].value;
  let especialidad = document.forms["registro-form_me"]["especialidad"].value;
  let telefono = document.forms["registro-form_me"]["telefono"].value;
  let email = document.forms["registro-form_me"]["email"].value;
  let password = document.forms["registro-form_me"]["password"].value;


  // Validar nombre
  if (nombre == "") {
    document.getElementById("nombre-error").innerHTML = "El campo Nombre es obligatorio"; // Para sacar el error de javascript en el span
    return false;
  } else {
  document.getElementById("nombre-error").innerHTML = "";
  }

  // Validar apellido
  if (apellido == "") {
    document.getElementById("apellido-error").innerHTML = "El campo Apellido es obligatorio"; // Para sacar el error de javascript en el span
    return false;
  } else {
  document.getElementById("apellido-error").innerHTML = "";
  }

  // Validar DNI
  if (!/^[0-9]{8}[A-Za-z]{1}$/.test(dni)) {
    document.getElementById("dni-error").innerHTML = "El DNI no es válido (debe tener 8 dígitos y una letra al final)"; // Para sacar el error de javascript en el span
    return false;
  } else {
  document.getElementById("dni-error").innerHTML = "";
  }

  // Validar género
  if (especialidad == "") {
    document.getElementById("especialidad-error").innerHTML = "El campo Especialidad es obligatorio"; // Para sacar el error de javascript en el span
    return false;
  } else {
  document.getElementById("especialidad-error").innerHTML = "";
  }

  // Validar teléfono
  if (!/^[0-9]{9}$/.test(telefono)) {
    document.getElementById("telefono-error").innerHTML = "El teléfono no es válido (debe tener 9 dígitos)"; // Para sacar el error de javascript en el span
    return false;
  } else {
  document.getElementById("telefono-error").innerHTML = "";
  }

  // Validar email
  if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
    document.getElementById("correo-error").innerHTML = "El correo electronico no es valido"; // Para sacar el error de javascript en el span
    return false;
  } else {
  document.getElementById("correo-error").innerHTML = "";
  }

  // Validar contraseña
  if (password.length < 8) {
    document.getElementById("password-error").innerHTML = "La contraseña debe tener al menos 8 caracteres"; // Para sacar el error de javascript en el span
    return false;
  } else {
  document.getElementById("password-error").innerHTML = "";
  }
  // Si todos los campos son válidos, se envía el formulario
  return true;
}
