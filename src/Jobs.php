<?php
  class Jobs
  {
    private $comp;
    private $title;
    private $desc;
    private $start;
    private $end;

    function __construct($comp, $title, $desc, $start, $end)
    {
      $this->comp = $comp;
      $this->title = $title;
      $this->desc = $desc;
      $this->start = $start;
      $this->end = $end;
    }

    function getComp()
    {
      return $this->comp;
    }
    function getTitle()
    {
      return $this->title;
    }
    function getDesc()
    {
      return $this->desc;
    }
    function getStart()
    {
      return $this->start;
    }
    function getEnd()
    {
      return $this->end;
    }

    function save()
    {
      array_push($_SESSION['job-list'], $this);
    }

    static function getAll()
    {
      return $_SESSION['job-list'];
    }

    static function reset()
    {
      $_SESSION['job-list'] = array();
    }
  }
 ?>
