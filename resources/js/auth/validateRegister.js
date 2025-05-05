$(document).ready(function() {
    function showError(input, message) {
        input.addClass('border-red-500').removeClass('border-gray-300');
        input.next('.error-message').remove();
        input.after(`<span class="error-message text-red-500 text-sm">${message}</span>`);
    }

    function clearError(input) {
        input.removeClass('border-red-500').addClass('border-gray-300');
        input.next('.error-message').remove();
    }

    $('#fullName').on('blur', function() {
        const formatted = $(this).val().trim().toLowerCase().split(/\s+/)
            .map(word => word.charAt(0).toUpperCase() + word.slice(1))
            .join(' ');
        $(this).val(formatted);
    });

    function validateFullName() {
        const fullName = $('#fullName').val().trim();
        const parts = fullName.split(/\s+/);
        const regex = /^[A-Za-zÀ-ÿ]+(?:\s+[A-Za-zÀ-ÿ]+){1,3}$/;
        
        if (parts.length < 2 || parts.length > 4 || !regex.test(fullName)) {
            showError($('#fullName'), 'Mínimo 1 nombre y 1 apellido, máximo 2 nombres y 2 apellidos');
            return false;
        }
        clearError($('#fullName'));
        return true;
    }

    function validateBirthDate() {
        const birthDate = new Date($('#birthDate').val());
        const today = new Date();
        const minDate = new Date(today.getFullYear() - 100, today.getMonth(), today.getDate());
        const maxDate = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate());
        
        if (!birthDate || birthDate > maxDate || birthDate < minDate) {
            showError($('#birthDate'), 'Debes tener entre 18 y 100 años');
            return false;
        }
        clearError($('#birthDate'));
        return true;
    }

    function validatePhone() {
        const phone = $('#phone').val();
        const regex = /^\+(?:[0-9]●?){6,14}[0-9]$/;
        
        if (!regex.test(phone)) {
            showError($('#phone'), 'Formato inválido (+CCNNNNNNNNN)');
            return false;
        }
        clearError($('#phone'));
        return true;
    }

    function validateAddress(address, id) {
        const regex = /^[a-zA-Z0-9\s.,'-ñÑáéíóúÁÉÍÓÚ]{10,}$/;
        if (!regex.test(address)) {
            showError($(`#${id}`), 'Dirección inválida (mínimo 10 caracteres)');
            return false;
        }
        clearError($(`#${id}`));
        return true;
    }

    $('#sameAsShipping').change(function() {
        if ($(this).is(':checked')) {
            $('#billingAddress').val($('#shippingAddress').val()).prop('disabled', true);
        } else {
            $('#billingAddress').val('').prop('disabled', false);
        }
    });

    function validateEmail() {
        const email = $('#email').val();
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        if (!regex.test(email)) {
            showError($('#email'), 'Email inválido');
            return false;
        }
        clearError($('#email'));
        return true;
    }

    function calculatePasswordStrength(password) {
        let strength = 0;
        if (password.length >= 8) strength++;
        if (/[A-Z]/.test(password)) strength++;
        if (/[a-z]/.test(password)) strength++;
        if (/[0-9]/.test(password)) strength++;
        if (/[\W_]/.test(password)) strength++;
        return Math.min(strength, 4);
    }

    $('#password').on('input', function() {
        const strength = calculatePasswordStrength($(this).val());
        $('#password-strength-meter').val(strength);
    });

    function validatePassword() {
        const password = $('#password').val();
        const strength = calculatePasswordStrength(password);
        
        if (strength < 2) {
            showError($('#password'), 'La contraseña debe ser más fuerte (mínimo 8 caracteres con mayúsculas y números)');
            return false;
        }
        clearError($('#password'));
        return true;
    }

    function validateConfirmPassword() {
        if ($('#password').val() !== $('#password_confirmation').val()) {
            showError($('#password_confirmation'), 'Las contraseñas no coinciden');
            return false;
        }
        clearError($('#password_confirmation'));
        return true;
    }

    $('input, select').on('blur', function() {
        switch(this.id) {
            case 'fullName': validateFullName(); break;
            case 'birthDate': validateBirthDate(); break;
            case 'phone': validatePhone(); break;
            case 'shippingAddress': validateAddress($(this).val(), 'shippingAddress'); break;
            case 'billingAddress': if(!$('#sameAsShipping').prop('checked')) validateAddress($(this).val(), 'billingAddress'); break;
            case 'email': validateEmail(); break;
            case 'password': validatePassword(); break;
            case 'password_confirmation': validateConfirmPassword(); break;
        }
    });

    $('#registerForm').submit(function(e) {
        e.preventDefault();
        
        const isFullNameValid = validateFullName();
        const isBirthDateValid = validateBirthDate();
        const isPhoneValid = validatePhone();
        const isShippingAddressValid = validateAddress($('#shippingAddress').val(), 'shippingAddress');
        const isBillingAddressValid = $('#sameAsShipping').is(':checked') || validateAddress($('#billingAddress').val(), 'billingAddress');
        const isEmailValid = validateEmail();
        const isPasswordValid = validatePassword();
        const isPasswordConfirmValid = validateConfirmPassword();
        
        if (isFullNameValid && isBirthDateValid && isPhoneValid && isShippingAddressValid && 
            isBillingAddressValid && isEmailValid && isPasswordValid && isPasswordConfirmValid) {
            
            // Preparar datos para enviar
            const formData = new FormData(this);
            const userData = {};
            formData.forEach((value, key) => {
                userData[key] = value;
            });
            
            // Enviar datos al servidor
            $.ajax({
                url: '/api/register',
                type: 'POST',
                data: userData,
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                success: function(response) {
                    if (response.success) {
                        window.location.href = response.redirect;
                    }
                },
                error: function(xhr) {
                    const response = xhr.responseJSON;
                    if (response && response.errors) {
                        // Mostrar errores de validación del servidor
                        Object.keys(response.errors).forEach(key => {
                            showError($('#' + key), response.errors[key][0]);
                        });
                    } else {
                        alert('Ha ocurrido un error al procesar el registro.');
                    }
                }
            });
        }
    });

    $('input, select').on('focus', function() {
        $(this).addClass('ring-2 ring-indigo-300 border-indigo-500');
    }).on('blur', function() {
        $(this).removeClass('ring-2 ring-indigo-300 border-indigo-500');
    });
});