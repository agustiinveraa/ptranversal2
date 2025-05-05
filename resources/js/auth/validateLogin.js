document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');

    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Obtener los datos del formulario
            const formData = new FormData(loginForm);
            const email = formData.get('email');
            const password = formData.get('password');
            
            // Validación básica
            let isValid = true;
            let errors = {};
            
            if (!email || !email.includes('@')) {
                errors.email = 'Por favor, introduce un email válido';
                isValid = false;
            }
            
            if (!password || password.length < 8) {
                errors.password = 'La contraseña debe tener al menos 8 caracteres';
                isValid = false;
            }
            
            // Si hay errores, mostrarlos
            if (!isValid) {
                Object.keys(errors).forEach(key => {
                    const input = document.getElementById(key);
                    input.classList.add('input-error');
                    
                    // Crear mensaje de error si no existe
                    let errorMsg = input.parentNode.querySelector('.error-message');
                    if (!errorMsg) {
                        errorMsg = document.createElement('p');
                        errorMsg.className = 'error-message text-error text-sm mt-1';
                        input.parentNode.appendChild(errorMsg);
                    }
                    errorMsg.textContent = errors[key];
                });
                return;
            }
            
            // Enviar datos al servidor
            fetch('/api/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': formData.get('_token')
                },
                body: JSON.stringify({
                    email: email,
                    password: password
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.errors) {
                    // Mostrar errores de validación del servidor
                    Object.keys(data.errors).forEach(key => {
                        const input = document.getElementById(key);
                        if (input) {
                            input.classList.add('input-error');
                            
                            // Crear mensaje de error
                            let errorMsg = input.parentNode.querySelector('.error-message');
                            if (!errorMsg) {
                                errorMsg = document.createElement('p');
                                errorMsg.className = 'error-message text-error text-sm mt-1';
                                input.parentNode.appendChild(errorMsg);
                            }
                            errorMsg.textContent = data.errors[key][0];
                        }
                    });
                } else if (data.success) {
                    // Redireccionar si el login es exitoso
                    window.location.href = data.redirect;
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    }
});