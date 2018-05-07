
<html lang="en-ca">
<head>
<script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body class="container" >


    <header>
        <!-- BEGIN mynav.php INCLUDE -->
        <?php include "./mynav.php"; ?>
        <div class="content">

        </div>
        <!-- END mynav.php INCLUDE -->
    </header>

    <main class="section">
        <div class="row center">

        </div>
        <form name="contact" method="post" action="../Functions/ContactPro.php">
            <label for="name">Name: </label>
            <input type="text" id="name" name="name" maxlength="50" size="30">
            <br>
            <label for="email">Email: </label>
            <input type="text" id="email" name="email" maxlength="80" size="30">
            <br>
            <label for="message">Message: </label>
            <textarea name="message" id="message" maxlength="2000" rows="25" cols="12" ></textarea>
            <br><br><br>
            <div class="g-recaptcha form-group" data-sitekey="6LdMO1YUAAAAAAodGYv2bwa6oEN9TWciDEDu8mfQ"></div>
            <input type="submit" value="Send">
        </form>

    </main>


<footer class="page-footer teal darken-4">
<?php include "./footer.php"; ?>
    </footer>

</body>
</html>