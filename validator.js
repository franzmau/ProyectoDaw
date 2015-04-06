$('#helpForm').bootstrapValidator({
     message: 'Este valor no es valido',
     feedbackIcons: {
         valid: 'glyphicon glyphicon-ok',
         invalid: 'glyphicon glyphicon-remove',
         validating: 'glyphicon glyphicon-refresh'
     },
     fields: {
         usuario: {
             validators: {
                 notEmpty: {
                     message: 'Es necesaria tu matricula para proporcionarte tu contraseña'
                 },
                 stringLength: {
                     max:10,
                     message: 'Tu matricula debe ser de  10 caracteres'
                 }
             }
         },

         email: {
             validators: {
                 notEmpty: {
                     message: 'Es necesario tu correo para proporcionarte tu contraseña'
                 },
                 emailAddress: {
                     message: 'El correo electronico no es valido'
                 }
             }
         }
     }
});
