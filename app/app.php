<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Jobs.php";


    session_start();
    if (empty($_SESSION['job-list'])) {
        $_SESSION['job-list'] = array();
    }

    $app = new Silex\Application();

   $app->register(new Silex\Provider\TwigServiceProvider(), array(
    	'twig.path' => __DIR__.'/../views'
    ));


    $app->get("/", function() use ($app){

      return $app['twig']->render('jobslist.html.twig', array('jobs' => Jobs::getAll()));
    });

    $app->post("/jobcreate", function() use ($app) {
      $job = new Jobs($_POST['company'], $_POST['title'], $_POST['description'], $_POST['start'], $_POST['end']);
      $job->save();
      return $app['twig']->render('jobadded.html.twig');
    });

    $app->post("/session_cleared", function() use ($app){
      Jobs::reset();
      return $app['twig']->render('reset.html.twig');
    });
    return $app;
?>
