<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | EduNext</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="login-container">
        <div>
            <div class="featured-pic-gradient">
                <p>Best for e-Learning</p>
                <p>Anytime, anywhere.</p>
            </div>
            <div class="featured-pic featured-pic-1" id="featured-pic"></div>
        </div>
        <div class="right-section">
            <div>
                <img class="login-logo" src="{{ asset('/image/logo_dark.svg') }}" alt="">
                <p class="welcome">Welcome back!</p>
                <div class="option">
                    <div class="activated" onclick="switchForm('login')">Login</div>
                    <div onclick="switchForm('register')">Register</div>
                </div>
            </div>
            {{-- Login Form --}}
            <form method="POST" action="{{ route('login') }}" class="form" id="loginForm">
                @csrf
                <input type="hidden" name="form_type" value="login">
                <!-- Login form fields -->
                <div>
                    <label for="email">E-mail</label>
                    <input type="text" id="email" name="email" placeholder="Enter your E-mail">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your Password">
                </div>
                <div class="role-choice">
                    <span class="text-lg">Login as: </span>
                    <div>
                        <input type="radio" id="student" name="role" value="student" {{ old('role', $defaultRole) === 'student' ? 'checked' : '' }}>
                        <label for="student">Student</label>
                    </div>
                    <div>
                        <input type="radio" id="lecturer" name="role" value="lecturer" {{ old('role', $defaultRole) === 'lecturer' ? 'checked' : '' }}>
                        <label for="lecturer">Lecturer</label>
                    </div>
                </div>
                <div class="remember-me">
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="remember"
                            id="remember"
                            {{ old('remember') ? 'checked' : '' }}
                        >
                        <label class="form-check-label" for="remember">
                            Remember Me
                        </label>
                    </div>
                </div>
                <button type="submit">Login</button>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
            {{-- Register Form --}}
            <form method="POST" action="{{ route('register') }}" class="form" id="registerForm"
                style="display: none;">
                @csrf
                <input type="hidden" name="form_type" value="register">
                <!-- register form fields -->
                <div>
                    <label for="email">E-mail</label>
                    <input type="email" id="newEmail" name="email" placeholder="Enter your E-mail">
                </div>
                <div>
                    <label for="newName">Name</label>
                    <input type="text" id="newName" name="name" placeholder="Enter your Name">
                </div>
                <div>
                    <label for="newPassword">Password</label>
                    <input type="password" id="newPassword" name="password" placeholder="Enter your Password">
                </div>
                <div class="role-choice">
                    <span class="text-lg">Register as: </span>
                    <div>
                        <input type="radio" id="newStudent" name="role" value="student" {{ old('role', $defaultRole) === 'student' ? 'checked' : '' }}>
                        <label for="newStudent">Student</label>
                    </div>
                    <div>
                        <input type="radio" id="newLecturer" name="role" value="lecturer" {{ old('role', $defaultRole) === 'lecturer' ? 'checked' : '' }}>
                        <label for="newLecturer">Lecturer</label>
                    </div>
                </div>
                <div class="gender-choice">
                    <span class="text-lg">Gender: </span>
                    <div>
                        <input type="radio" id="male" name="gender" value="male" checked>
                        <label for="male">Male</label>
                    </div>
                    <div>
                        <input type="radio" id="female" name="gender" value="female">
                        <label for="female">Female</label>
                    </div>
                    <div>
                        <input type="radio" id="private" name="gender" value="private">
                        <label for="private">Private</label>
                    </div>
                </div>
                <button type="submit">Register</button>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </div>
    </div>

    <script>
        function switchForm(formType) {
            const loginForm = document.getElementById('loginForm');
            const registerForm = document.getElementById('registerForm');
            const options = document.querySelectorAll('.option > div');
            const welcome = document.querySelector('.welcome');
            const image_used = document.getElementById('featured-pic');
            const errorAlerts = document.querySelectorAll('.alert-danger');

            // Hide all error alerts
            errorAlerts.forEach(alert => {
                alert.style.display = 'none';
            });

            sessionStorage.setItem('currentForm', formType);

            if (formType === 'login') {

                // reset forms when switching
                loginForm.reset();
                loginForm.style.display = 'flex';
                registerForm.style.display = 'none';
                options[0].classList.add('activated');
                options[1].classList.remove('activated');
                image_used.classList.add('featured-pic-1');
                image_used.classList.remove('featured-pic-2');
                welcome.textContent = 'Welcome back!'

                const loginErrors = loginForm.querySelector('.alert-danger');
                if (loginErrors &&
                    @if ($errors->any() && old('form_type') !== 'register')
                        true
                    @else
                        false
                    @endif ) {
                    loginErrors.style.display = 'block';
                }
            } else {
                // reset forms when switching
                registerForm.reset();
                loginForm.style.display = 'none';
                registerForm.style.display = 'flex';
                options[0].classList.remove('activated');
                options[1].classList.add('activated');
                image_used.classList.add('featured-pic-2');
                image_used.classList.remove('featured-pic-1');
                welcome.textContent = 'Welcome!'

                const registerErrors = registerForm.querySelector('.alert-danger');
                if (registerErrors &&
                    @if ($errors->any() && old('form_type') === 'register')
                        true
                    @else
                        false
                    @endif ) {
                    registerErrors.style.display = 'block';
                }
            }
        }

        // Initialize the correct form based on the route
        document.addEventListener('DOMContentLoaded', function() {
            // Check for form errors first
            @if ($errors->any())
                @if (old('form_type') === 'register')
                    switchForm('register');
                @else
                    switchForm('login');
                @endif
            @else
                const savedForm = localStorage.getItem('currentForm');
                if (savedForm) {
                    switchForm(savedForm);
                } else {
                    switchForm('{{ $formType ?? 'login' }}');
                }
            @endif
        });
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
