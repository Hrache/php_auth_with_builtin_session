<?php require_once('init.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Auth with PHP session only</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link rel="stylesheet" href="styles/gradients.css" />
    <link rel="stylesheet" href="styles/main.css" />

    <script src="https://www.w3schools.com/lib/w3.js"></script>

</head>

<body class="w3-mobile">
    <section class="w3-bar w3-top">
        <a class="w3-bar-item w3-button" href="#home">Home</a>
        <a class="w3-bar-item w3-button" href="#about">About</a>
        <a class="w3-bar-item w3-button" href="#contacts">Contacts</a>

        <a
            href="#authform"
            class="w3-button w3-bar-item w3-right"
            onclick="w3.toggleClass( '#authform', 'w3-hide' )"
        >
            Account
        </a>

        <form
            action=""
            method="POST"
            id="authform"
            class="w3-padding w3-right w3-hide w3-animate-right w3-bar-item w3-white" style="max-width: 375px;"
        >
            <div class="w3-tooltip w3-margin-bottom w3-right-align" style="cursor: pointer;">
                <span onclick="w3.toggleClass( '#authform', 'w3-hide' )" class="w3-animate-right w3-hover-pale-red w3-red w3-button">Close</span>
            </div>

        <?php if (isset($_SESSION['user'], $_SESSION['user']['authtoken'])): ?>

            <input type="hidden" value="logout" name="authaction" />
            <input type="hidden" value="<?= $_SESSION['user']['authtoken'] ?>" name="authtoken" />
            <input type="submit" value="Logout" class="w3-button w3-green" />

        <?php else: ?>

            <label class="w3-block" for="email">Email</label>
            <input class="w3-block w3-input w3-border" type="email" id="email" name="email" />

            <label class="w3-block" for="password">Password</label>
            <input class="w3-block w3-input w3-border w3-margin-bottom" type="password" id="password" name="password" />

            <input type="hidden" value="login" name="authaction" />
            <input type="submit" value="Login" class="w3-button w3-red" />

        <?php endif; ?>
        </form>
    </section>

    <?php if (isset($_SESSION['message']) && is_array($_SESSION['message'])): ?>
    <section class="w3-animate-opacity w3-bar-block w3-bottom" onclick="this.remove()">
        <?php foreach ($_SESSION['message'] as $key => $message): ?>
        <article class="w3-green w3-margin-bottom w3-bar-item"><?= $message ?></article>
        <?php endforeach; ?>
    </section>
    <?php endif; ?>

    <main class="articles w3-container w3-padding-none w3-margin-none">
        <article id="home" class="w3-display-container gradient-1 h-100v">
            <h1 class="w3-display-middle w3-jumbo">Welcome</h1>
        </article>

        <article id="about" class="w3-display-container gradient-2 h-100v">
            <div class="w3-display-middle article-middles w3-round-large">
                <h2 class="w3-xxlarge w3-padding">About</h2>
                <p class="font-pt-serif w3-large w3-padding">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur et pariatur odio cum tempora officia est, facilis ea repudiandae exercitationem voluptatem totam laudantium similique impedit voluptate officiis at corporis eligendi?
                </p>
            </div>
        </article>

        <article id="contacts" class="w3-display-container gradient-3 h-100v">
            <div class="w3-display-middle article-middles">
                <h2 class="w3-xxlarge w3-padding">Contacts</h2>
                <p class="font-pt-serif w3-large w3-padding">
                    <strong>Mobile:</strong> +374 000 00 00 00
                    <br>
                    <strong>Address:</strong> Home, City, Country
                    <br>
                    <strong>Email:</strong> emailsome@email.com
                </p>
            </div>
        </article>
    </main>
</body>

</html>