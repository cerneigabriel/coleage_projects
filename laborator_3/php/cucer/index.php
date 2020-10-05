

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <?php
            $a = [276, 323, 750, 552, 565, -15, -37, -31, 7, 2, 0, 5, 856, 34, 12, 76];
            $c = [];

            foreach ($a as $i) $c[] = $i;
            var_dump($c);

            function s($a) {
                for ($i=0; $i < count($a); $i++) { 
                    for ($j=$i; $j < count($a); $j++) { 
                        if ($a[$i] < $a[$j]) {
                            $aux = $a[$i];
                            $a[$i] = $a[$j];
                            $a[$j] = $aux;
                        }
                    }
                }
                return $a;
            }

            var_dump(s($a));
        ?>
        <div class="row flex-column align-items-center justify-content-center">
            <div class="col-lg-6">
                <form action="" method="POST" class="row">
                    <div class="col-9">
                        <input type="text" name="numar" class="form-control">
                    </div>
                    <div class="col-3">
                        <button type="submit" class="btn btn-success">Adauga</button>
                    </div>
                </form>
            </div>
            
            <div class="col-lg-6">
                <div class="row justify-content-center pt-3">
                    <div class="col-9 text-right">
                        <h1 id="text"></h1>
                    </div>
                    <div class="col-3">
                        <button type="button" onClick="afis();" class="btn btn-primary">Afiseaza</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        </div>
    </div>

    <script>
        var j = `<?php echo (isset($_POST['numar']) ? str_split($_POST['numar']) : ''); ?>`;
        var d = `<?php echo (isset($_POST['numar']) ? $_POST['numar'] : ''); ?>`;

        
        function afis() {
            document.getElementById('text').innerHTML = d;
            document.querySelector('[name="numar"]').value = JSON.stringify(j);
        }
    </script>
</body>
</html>