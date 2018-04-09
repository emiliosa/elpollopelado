<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed'   => 'Las credenciales ingresadas son incorrectas.',
    'throttle' => 'Se ha superado el máximo de intentos. Por favor intente en :seconds segundos.',

    // Activation items
    'sentEmail'         => 'Se ha enviado un mail a :email.',
    'clickInEmail'      => 'Por favor haga click en el link para activar su cuenta.',
    'anEmailWasSent'    => 'Se ha enviado un mail a :email la fecha :date.',
    'clickHereResend'   => 'Haga click para reenviar el mail.',
    'successActivated'  => 'Exitoso, tu cuenta ha sido activada.',
    'unsuccessful'      => 'Tu cuenta no ha podido ser activada; por favor intente nuevamente.',
    'notCreated'        => 'Tu cuenta no ha podido ser creada; por favor intente nuevamente.',
    'tooManyEmails'     => 'Se ha superado el máximo de mails de activación a :email. <br />Por favor intente nuevamente en <span class="label label-danger">:hours horas</span>.',
    'regThanks'         => 'Gracias por registrarse, ',
    'invalidToken'      => 'Token de activación inválido. ',
    'activationSent'    => 'Seha enviado un mail de activación. ',
    'alreadyActivated'  => 'Su cuenta ya está activada. ',

    // Labels
    'whoops'            => 'Whoops! ',
    'someProblems'      => 'Hay errores en los datos cargados.',
    'email'             => 'E-mail',
    'password'          => 'Contraseña',
    'rememberMe'        => 'Recuerdame',
    'login'             => 'Iniciar sesión',
    'forgot'            => '¿Olvidaste tu Contraseña?',
    'forgot_message'    => '¿Problemas con tu Contraseña?',
    'name'              => 'Usuario',
    'first_name'        => 'Nombre',
    'last_name'         => 'Apellido',
    'confirmPassword'   => 'Confirmar Contraseña',
    'register'          => 'Registrar',
    'login_action'      => 'Ingresar',

    // Placeholders
    'ph_name'           => 'Usuario',
    'ph_email'          => 'E-mail',
    'ph_firstname'      => 'Nombre',
    'ph_lastname'       => 'Apellido',
    'ph_password'       => 'Contraseña',
    'ph_password_conf'  => 'Confirmar Contraseña',

    // User flash messages
    'sendResetLink'     => 'Enviar link de reseteo de Contraseña',
    'resetPassword'     => 'Resetear Contraseña',
    'loggedIn'          => 'Te has logueado!',

    // email links
    'pleaseActivate'    => 'Por favor activa tu cuenta.',
    'clickHereReset'    => 'Click aquí para resetear tu Contraseña: ',
    'clickHereActivate' => 'Click aquí para activar tu cuenta: ',

    // Validators
    'userNameTaken'     => 'Username is taken',
    'userNameRequired'  => 'Username is required',
    'fNameRequired'     => 'First Name is required',
    'lNameRequired'     => 'Last Name is required',
    'emailRequired'     => 'Email is required',
    'emailInvalid'      => 'Email is invalid',
    'passwordRequired'  => 'Password is required',
    'PasswordMin'       => 'Password needs to have at least 6 characters',
    'PasswordMax'       => 'Password maximum length is 20 characters',
    'captchaRequire'    => 'Captcha is required',
    'CaptchaWrong'      => 'Wrong captcha, please try again.',
    'roleRequired'      => 'User role is required.',

];
