<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Realtime Chat App</title>

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>
<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Realtime Chat App</header>
            <form action="#">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label for="firstname">First Name</label>
                        <input type="text" name="firstname" required placeholder="firstname">
                    </div>
                    <div class="field input">
                        <label for="lastname">Last Name</label>
                        <input type="text" name="lastname" required placeholder="lastname">
                    </div>
                </div>
                <div class="field input">
                    <label for="email">Email Address</label>
                    <input type="text" name="email" required placeholder="enter email">
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" required placeholder="enter your password">
                    <i class="fa fa-eye"></i>
                </div>
                <div class="field image">
                    <label for="image">Select Image</label>
                    <input type="file" name="image">
                </div>
                <div class="field btn">
                    <button type="submit">Continue</button>
                </div>
            </form>
            <div class="link">Already signed up ? <a href="login.html">Login now</a></div>
        </section>
    </div>

    <!-- js -->
    <script src="js/show-hide.js"></script>
    <script src="js/signup.js"></script>

</body>
</html>