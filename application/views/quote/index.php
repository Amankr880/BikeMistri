<?php
      $quotes= [
      [
      'author' => 'Oscar Wilde',
      'text' => 'Be yourself; everyone else is already taken.',
      ],
      [
      'author' => 'Frank Zappa',
      'text' => 'So many books, so little time.',
      ],
      [
      'author' => 'Mae West',
      'text' => 'You only live once, but if you do it right, once is enough.',
      ],
      [
      'author' => 'Mahatma Gandhi',
      'text' => 'Be the change that you wish to see in the world.',
      ],
      [
      'author' => 'Elbert Hubbard',
      'text' => 'A friend is someone who knows all about you and still loves you.',
      ],
      [
      'author' => 'Oscar Wilde',
      'text' => 'Always forgive your enemies; nothing annoys them so much.',
      ],
      [
      'author' => 'Oscar Wilde',
      'text' => 'To live is the rarest thing in the world. Most people exist, that is all.',
      ],
      [
      'author' => 'Mahatma Gandhi',
      'text' => 'Live as if you were to die tomorrow. Learn as if you were to live forever.',
      ],
      [
      'author' => 'Friedrich Nietzsche, Twilight of the Idols',
      'text' => 'Without music, life would be a mistake.',
      ],
      [
      'author' => 'Andre Gide, Autumn Leaves',
      'text' => 'It is better to be hated for what you are than to be loved for what you are not.',
      ],
      ];

      $quote = $quotes[array_rand($quotes)];
      $quoteText = $quote['text'];
      $quoteAuthor = $quote['author'];
      ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Random Quote</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/creative.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->

    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong>Quote Of The Day</strong>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto" >
            <p class="text-faded mb-5">&ldquo;<?php echo $quoteText; ?>&rdquo;<br><br><strong>- <?php echo $quoteAuthor ?></strong></p>
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="index.php">Refresh</a>
          </div>
        </div>
      </div>
    </header>

    <section class="bg-primary" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <p class="text-faded mb-4">Aman Kumar</p>
            <hr class="light my-4">
            <p class="text-faded mb-4">
              <i class="fab fa-facebook-square"></i>
              <i class="fab fa-twitter"></i>
              <i class="fab fa-instagram"></i>
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>

    <script type="text/javascript">

    </script>

  </body>

</html>
