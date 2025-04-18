<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | EduNext</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
                    <div onclick="switchForm('signup')">Sign Up</div>
                </div>
            </div>
            <form method="POST" action"{{ route('auth.handle') }}" class="form" id="loginForm">
                @call_user_func
                <input type="hidden" name="form_type" value="login">
                
            <!-- Login form fields -->
                <div>
                    <label for="username">Username</label>
                    <input type="text" id="username" placeholder="Enter your Username">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" placeholder="Enter your Password">
                </div>
                <div class="remember-me">
                    <input type="checkbox" id="remember">
                    <label for="remember">Remember me</label>
                </div>
                <button type="submit">Login</button>
            </form>
            <form method="POST" action="{{route('auth.handle')}}" class="form" id="signupForm" style="display: none;">
                @csrf
                <input type="hidden" name="form_type" value="signup">
                <!-- Signup form fields -->
                <div>
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="Enter your E-mail">
                </div>
                <div>
                    <label for="newUsername">Username</label>
                    <input type="text" id="newUsername" name="username" placeholder="Enter your Username">
                </div>
                <div>
                    <label for="newPassword">Password</label>
                    <input type="password" id="newPassword" name="password" placeholder="Enter your Password">
                </div>
                <div class="mt-4">
                    <label for="role" class="block text-sm font-medium text-gray-700">Register As:</label>
                    <select name="role" id="role" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="teacher">Teacher</option>
                        <option value="student">Student</option>
                    </select>
                </div>
                <button type="submit">Sign Up</button>
            </form>
        </div>
    </div>

    <script>
        function switchForm(formType) {
            const loginForm = document.getElementById('loginForm');
            const signupForm = document.getElementById('signupForm');
            const options = document.querySelectorAll('.option > div');
            const welcome = document.querySelector('.welcome');
            const image_used = document.getElementById('featured-pic');

            if (formType === 'login') {
                loginForm.style.display = 'flex';
                signupForm.style.display = 'none';
                options[0].classList.add('activated');
                options[1].classList.remove('activated');
                image_used.classList.add('featured-pic-1');
                image_used.classList.remove('featured-pic-2');
                welcome.textContent = 'Welcome back!'
            } else {
                loginForm.style.display = 'none';
                signupForm.style.display = 'flex';
                options[0].classList.remove('activated');
                options[1].classList.add('activated');
                image_used.classList.add('featured-pic-2');
                image_used.classList.remove('featured-pic-1');
                welcome.textContent = 'Welcome!'
            }
        }
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>