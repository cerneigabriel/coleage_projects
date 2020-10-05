<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <?php
    $var1 = <<< 'STR'
    <div style="width: 60%; margin-left: auto;">
        <p>Programele de la calculator manipuleaza datele, care reprezinta informatii.<br/>
        Programele <strong>PHP</strong> folosesc doua categorii principale de date: numere si siruri.<br/>
        Numerele sunt compuse numai din <u>cifre</u>, in timp ce un sir poate contine <u>orice caracter, inclusiv cifre, litere si simboluri speciale</u>.</p>
    </div>
    STR;
    echo $var1;

    $var1 = <<< STR
    
    STR;
    echo $var1;
    ?>

    <div style="width: 80%; font-size: 18px;">
        <p>Decizia privind <span style="color: blue">modul de stocare a datelor este importanta</span>, in mod caracteristic, <strong><span style="color: red;">datele se stocheaza sub forma de numere</span></strong> atunci cand se doreste executarea unor <span style="color: violet; font-family: Helvetica, sans-serif; font-weight: 600;">operatii matemative asupra datelor</span>, deoarece numerele sunt stocate <span style="color: grey; font-family: Courier New;">intr-un mod care permite efectuarea de calcule.</span></p>
    </div>

    <h3>1. De la tastatura se citeste un sir de caractere. Elaborati un program care va determina:</h3>
    <form class="form" function_name="ex_1" action="controller.php" method="POST">
        <input type="hidden" name="function_name" value="ex_1">
        <input type="text" name="string" required>
        <button type="submit">Calculate</button>
    </form>

    <div id="ex_1_container"></div>


    <h3>2. De la tastatura se citeste un sir de caractere. Elaborati un program care va inlocui:</h3>
    <form class="form" function_name="ex_2" action="controller.php" method="POST">
        <input type="hidden" name="function_name" value="ex_2">
        <input type="text" name="string" required>
        <button type="submit">Calculate</button>
    </form>

    <div id="ex_2_container"></div>


    <h3>3. De la tastatura se citeste un sir de caractere. Elaborati un program care va afisa:</h3>
    <form class="form" function_name="ex_3" action="controller.php" method="POST">
        <input type="hidden" name="function_name" value="ex_3">
        <input type="text" name="string" required>
        <button type="submit">Calculate</button>
    </form>

    <div id="ex_3_container"></div>

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
                        document.getElementById(`${function_name}_container`).innerHTML = ''
                        for (const [key, value] of Object.entries(res)) {
                            let html = `<strong>${value.title}: </strong>`;
                            switch (typeof value.value) {
                                case 'number':
                                    html += value.value;
                                    break;
                                case 'string':
                                    html += value.value;
                                    break;

                                case 'object':
                                    html += '<br/>';
                                    for (const [_key, _value] of Object.entries(value.value)) {
                                        html += `${_value}, `;
                                    }

                                    default:
                                        break;
                            }
                            html += '<br/>';
                            document.getElementById(`${function_name}_container`).innerHTML += html;
                        }

                    }).catch(err => {
                        console.log(err);
                    });
            }
        });
    </script>
</body>

</html>