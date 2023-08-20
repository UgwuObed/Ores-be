<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IM+Fell+DW+Pica&family=Inder&family=Indie+Flower&display=swap" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <div class="inner">
        <div class="card">
            <h3>Login</h3>
            <a href="{{ route('register') }}" class="signup-link">New Here? Sign Up</a><br><br>
            <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf
                <div class="form-wrapper">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control1" required>
                </div>
                <div class="form-wrapper">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control1" required>
                </div>
                <div class="button-wrapper">
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>

        body{
        margin: 0;
        padding: 0;
        background: linear-gradient(99deg, rgba(128, 0, 128, 0.13) 24.29%, rgba(128, 0, 128, 0.17) 58.64%, rgba(128, 0, 128, 0.00) 100%);
        font-family: 'Inder', sans-serif;
    }
.wrapper {
    min-height: 100vh;
    background: url('{{ asset("images/register.png") }}') no-repeat center center fixed;
    background-size: cover;
    display: flex;
    align-items: center;
    justify-content: center;
}

.inner {
    max-width: 400px;
}

.card {
    background-color: rgba(255, 255, 255, 0.671);
    box-shadow: 0 4px 6px rgba(54, 50, 50, 0.1);
    border-radius: 20px;
    padding: 42px;
    width: 430px;
    margin-left: -80px;
    transition: transform 0.6s;
}

.card:hover {
    transform: translateY(-5px);
}

.form-wrapper {
    width: 48%;
    margin-bottom: 17px;

    &:first-child {
        margin-right: 4%;
    }
}

.form-wrapper.full-width {
    width: 100%;
}

button {
    background-color: #8e44ad;
    color: white;
    font-family: 'Inder';
    border-radius: 45px;
    border: 1px solid #800080;
    background: #800080;
    width: 196px;
    height: 38px;
    font-weight: 400;
}

button:hover {
    background-color: #8e44ad;
    color: #800080;
    border-radius: 45px;
    border: 1px solid #800080;
    background: #ffffff;
    width: 196px;
    height: 38px;
    font-weight: 800;
    transition: transform 0.6s;
}

.button-wrapper {
    text-align: center;
    margin-top: 29px;
}

.form-control {
    text-align: center;
    width: 196px;
    height: 38px;
    flex-shrink: 0;
    border-radius: 45px;
    font-family: 'Inder';
    border: 1px solid #800080;
    background: #FFF;
}

.form-control1 {
    width: 420px;
    height: 38px;
    text-align: center;
    flex-shrink: 0;
    font-family: 'Inder';
    border-radius: 45px;
    border: 1px solid #800080;
    background: #FFF;
}

.signup-link {
    text-decoration: none;
}
</style>
</body>
</html>
