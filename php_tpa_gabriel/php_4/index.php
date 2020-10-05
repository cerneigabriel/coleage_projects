<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h4>3. De la tastatură se citește un număr întreg. Elaboraţi un subprogram recursiv, prin intermediul căruia se va determina valoarea expresiilor:</h4>

    <form class="form" function_name="ex_3" action="controller.php" method="POST">
        <input type="hidden" name="function_name" value="ex_3">
        <label for="number">Number</label>
        <input type="number" id="number" name="number">
        <br>
        <button type="submit">Calculate</button>
    </form>

    <div id="ex_3_container"></div>

    <h4>6. Se citește de la tastatură numărul natural dat n. Folosind un subprogram recursiv, să se calculeze suma 1 + 2 + ... + n.</h4>

    <form class="form" function_name="ex_6" action="controller.php" method="POST">
        <input type="hidden" name="function_name" value="ex_6">
        <label for="number">Number</label>
        <input type="number" id="number" name="number">
        <br>
        <button type="submit">Calculate</button>
    </form>

    <div id="ex_6_container"></div>

    <h4>9. Fibonacci</h4>

    <form class="form" function_name="ex_9" action="controller.php" method="POST">
        <input type="hidden" name="function_name" value="ex_9">
        <label for="number">Number</label>
        <input type="number" id="number" name="number">
        <br>
        <button type="submit">Calculate</button>
    </form>

    <div id="ex_9_container"></div>

    <h4>12. Funcția Ackerman</h4>

    <form class="form" function_name="ex_12" action="controller.php" method="POST">
        <input type="hidden" name="function_name" value="ex_12">
        <label for="number_1">m</label>
        <input type="number" id="number_1" name="number_1">
        <br>
        <label for="number_2">n</label>
        <input type="number" id="number_2" name="number_2">
        <br>
        <button type="submit">Calculate</button>
    </form>

    <div id="ex_12_container"></div>

    <h4>15. Funcția Manna Pnueli</h4>

    <form class="form" function_name="ex_15" action="controller.php" method="POST">
        <input type="hidden" name="function_name" value="ex_15">
        <label for="number">x</label>
        <input type="number" id="number" name="number">
        <br>
        <button type="submit">Calculate</button>
    </form>

    <div id="ex_15_container"></div>

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