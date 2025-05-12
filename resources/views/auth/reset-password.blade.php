<!-- resources/views/auth/reset-password.blade.php -->
<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <!-- Mensajes de error de validación (por ejemplo, token inválido, etc.) -->
        <x-validation-errors class="mb-4" />

        <!-- Formulario de restablecimiento de contraseña -->
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Campo oculto para el token de restablecimiento -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="nk-form">

                <!-- Campo Correo Electrónico (Email) -->
                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro">
                        <i class="notika-icon notika-mail"></i>
                    </span>
                    <div class="nk-int-st">
                        <input 
                            id="email" 
                            type="email" 
                            name="email" 
                            class="form-control" 
                            placeholder="{{ __('Correo Electrónico') }}" 
                            value="{{ old('email', $request->email) }}" 
                            required 
                            autofocus 
                        />
                    </div>
                </div>

                <!-- Campo Nueva Contraseña -->
                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro">
                        <i class="notika-icon notika-edit"></i>
                    </span>
                    <div class="nk-int-st">
                        <input 
                            id="password" 
                            type="password" 
                            name="password" 
                            class="form-control" 
                            placeholder="{{ __('Nueva Contraseña') }}" 
                            required 
                            autocomplete="new-password" 
                        />
                    </div>
                </div>

                <!-- Campo Confirmar Nueva Contraseña -->
                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro">
                        <i class="notika-icon notika-edit"></i>
                    </span>
                    <div class="nk-int-st">
                        <input 
                            id="password_confirmation" 
                            type="password" 
                            name="password_confirmation" 
                            class="form-control" 
                            placeholder="{{ __('Confirmar Contraseña') }}" 
                            required 
                            autocomplete="new-password" 
                        />
                    </div>
                </div>

                <!-- Botón para enviar el formulario de restablecer contraseña -->
                <button type="submit" class="btn btn-login btn-success btn-float mg-t-15">
                    <i class="notika-icon notika-right-arrow right-arrow-ant"></i>
                </button>

            </div> <!-- /.nk-form -->

            <!-- Navegación: enlace para volver al inicio de sesión -->
            <div class="nk-navigation nk-lg-ic">
                <a href="{{ route('login') }}">
                    <i class="notika-icon notika-right-arrow"></i> 
                    <span>{{ __('Iniciar Sesión') }}</span>
                </a>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
