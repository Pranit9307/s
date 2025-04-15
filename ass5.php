<!DOCTYPE html>
<html>
<head>
  <title>Shape Area & Volume Calculator</title>
</head>
<body>
  <form action="Shape.php" method="get">
    <center>
      <h2>For Cone & Cylinder</h2>
      <table>
        <tr>
          <td>Enter Radius: </td>
          <td><input type="text" name="r"></td>
        </tr>
        <tr>
          <td>Enter Height: </td>
          <td><input type="text" name="h"></td>
        </tr>
        <tr>
          <td><input type="radio" name="op" value="1"> Cone</td>
          <td><input type="radio" name="op" value="2"> Cylinder</td>
        </tr>
      </table>

      <h2>For Sphere</h2>
      <table>
        <tr>
          <td>Enter Radius: </td>
          <td><input type="text" name="r1"></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="radio" name="op" value="3"> Sphere</td>
        </tr>
        <tr>
          <td></td>
          <td><input type="submit" value="SUBMIT"></td>
        </tr>
      </table>
    </center>
  </form>
</body>
</html






<?php
  define('pi', 3.14);

  interface shape
  {
    function calc_area($r, $h);
    function calc_vol($r, $h);
  }

  class sphere implements shape
  {
    function calc_area($r, $h)
    {
        return 4*pi*$r*$r;
    }
    function calc_vol($r, $h)
    {
        return (4/3)*pi*$r*$r*$r;
    }
  }
  
  class cylinder implements shape
  {
    function calc_area($r, $h)
    {
        return 2*pi*$r*($r+$h);
    }
    function calc_vol($r, $h)
    {
        return pi*$r*$r*$h;
    }
  }

  class cone implements shape
  {
    function calc_area($r, $h)
    {
        return 0.5*$r*$r*$h;
    }
    function calc_vol($r, $h)
    {
        return (1/3)*pi*$r*$r*$h;
    }
  }
  
  $op = isset($_GET['op']) ? $_GET['op'] : null;

  switch($op)
  {
    case 1:
        $r = isset($_GET['r']) ? (int)$_GET['r'] : 0;
        $h = isset($_GET['h']) ? (int)$_GET['h'] : 0;
        $ob = new cone();
        $a = $ob->calc_area($r, $h);
        $v = $ob->calc_vol($r, $h);
        echo "Area of Cone is: " .$a. "<br> Volume of Cone is: " .$v;
        break;

    case 2:
        $r = isset($_GET['r']) ? (int)$_GET['r'] : 0;
        $h = isset($_GET['h']) ? (int)$_GET['h'] : 0;
        $ob = new cylinder();
        $a = $ob->calc_area($r, $h);
        $v = $ob->calc_vol($r, $h);
        echo "Area of Cylinder is: " .$a. "<br> Volume of Cylinder is: " .$v;
        break;

    case 3:
        $r = isset($_GET['r']) ? (int)$_GET['r'] : 0;
        $h = isset($_GET['h']) ? (int)$_GET['h'] : 0;
        $ob = new sphere();
        $a = $ob->calc_area($r, 0);
        $v = $ob->calc_vol($r, 0);
        echo "Area of Sphere is: " .$a. "<br> Volume of Sphere is: " .$v;
        break;
    
    default:
        echo "Invalid Operation.";
  }
?>