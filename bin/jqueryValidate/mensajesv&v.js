jQuery.extend(jQuery.validator.messages, {
  required: "Este campo es obligatorio.",
  remote: "Por favor, rellena este campo.",
  email: "Por favor, escribe una direccian de correo valida",
  url: "Por favor, escribe una URL valida.",
  date: "Por favor, escribe una fecha valida.",
  dateISO: "Por favor, escribe una fecha (ISO) valida.",
  text:" Por favor Este campo solo es texto",
  number: "Por favor, escribe un numero entero valido.",
  digits: "Por favor, escribe bien los digitos.",
  creditcard: "Por favor, escribe un numero de tarjeta valido.",
  equalTo: "Por favor, escribe el mismo valor de nuevo.",
  accept: "Por favor, escribe un valor con una extensian aceptada.",
  maxlength: jQuery.validator.format("Por favor, no escribas mas de {0} caracteres."),
  minlength: jQuery.validator.format("Por favor, no escribas menos de {0} caracteres."),
  rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
  range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
  max: jQuery.validator.format("Valor maximo es {0}."),
  min: jQuery.validator.format("Valor minimo es {0}.")
});