// ParsleyConfig definition if not already set
window.ParsleyConfig = window.ParsleyConfig || {};
window.ParsleyConfig.i18n = window.ParsleyConfig.i18n || {};

window.ParsleyConfig.i18n.es = $.extend(window.ParsleyConfig.i18n.es || {}, {
  defaultMessage: "Este valor parece ser inválido.",
  type: {
    email: "Debe ser un correo válido.",
    url: "Debe ser una URL válida.",
    number: "Debe ser un número válido.",
    integer: "Debe ser un número válido.",
    digits: "Debe ser un dígito válido.",
    alphanum: "Debe ser alfanumérico."
  },
  notblank: "No puedes dejar este campo en blanco.",
  required: "Este campo es obligatorio.",
  pattern: "Este valor es incorrecto.",
  min: "Este valor no debe ser menor que %s.",
  max: "Este valor no debe ser mayor que %s.",
  range: "Este valor debe estar entre %s y %s.",
  minlength: "La longitud mínima es de %s caracteres.",
  maxlength: "La longitud máxima es de %s caracteres.",
  length: "La longitud debe estar entre %s y %s caracteres.",
  mincheck: "Debe seleccionar al menos %s opciones.",
  maxcheck: "Debe seleccionar %s opciones o menos.",
  check: "Debe seleccionar entre %s y %s opciones.",
  equalto: "Este valor debe ser idéntico.",
  remote: 'Ya está en uso.'
});
// If file is loaded after Parsley main file, auto-load locale
if ('undefined' !== typeof window.ParsleyValidator)
window.ParsleyValidator.addCatalog('es', window.ParsleyConfig.i18n.es, true);