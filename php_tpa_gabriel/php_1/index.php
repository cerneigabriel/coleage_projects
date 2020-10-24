<?php
function sumABCD(array $arr)
{
  $sum = 0;

  foreach ($arr as $value) $sum += $value;

  return $sum;
}

function minABCD(array $arr)
{
  $min = $arr[0];

  foreach ($arr as $value) if ($value < $min) $min = $value;

  return $min;
}

function nrCharInString(string $str, string $letter)
{
  return substr_count($str, $letter);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h3>1. Sum (a, b, c, d):</h3>
  <?php echo sumABCD([3, 10, 12, 90]); ?>


  <h3>2. Min (a, b, c, d):</h3>
  <?php echo minABCD([3, 10, 12, 90]); ?>


  <h3>3. Find 'a' in string (Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur autem, repudiandae commodi.):</h3>
  <?php echo nrCharInString('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur autem, repudiandae commodi.', 'a'); ?>


  <h3>4. De la tastatura se citeste un numar intreg n, n mai mic ca 100000. Elaborati un program cu functii prin intermediul caruia se va determina: </h3>
  <form class="form" function_name="ex_1" action="controller.php" method="POST">
    <input type="hidden" name="function_name" value="ex_1">
    <input type="number" name="number" min="0" max="100000" required>
    <button type="submit">Calculate</button>
  </form>

  <div id="ex_1_container"></div>


  <h3>5. De la tastatura se citesc doua numere intregi. Elaborati un program cu functii prin intermediul caruia se va determina:</h3>
  <form class="form" function_name="ex_2" action="controller.php" method="POST">
    <input type="hidden" name="function_name" value="ex_2">
    <input type="number" name="number_1" min="0" max="100000" required>
    <input type="number" name="number_2" min="0" max="100000" required>
    <button type="submit">Calculate</button>
  </form>

  <div id="ex_2_container"></div>

  <script>
    var forms = document.querySelectorAll('.form');

    forms.forEach(form => {
      form.onsubmit = async (event) => {
        event.preventDefault();
        let action = form.getAttribute('action');
        let method = form.getAttribute('method');
        let function_name = form.getAttribute('function_name');
        let body = new FormData(form);

        let response = await fetch(action, {
          method: method,
          body: body
        });

        response
          .json()
          .then(res => {
            console.log(res);
            
            // for (const [key, value] of Object.entries(res)) {
            // }

          }).catch(err => {
            console.log(err);
          });
      }
    });
  </script>
</body>

</html>