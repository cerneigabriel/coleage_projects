<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laborator 5 / Varianta 2</title>
</head>

<body>
    <h1>Laborator 5 / Varianta 2</h1>
    <hr>

    <h4>2. Să se construiască un tablou pătratic de dimensiune n, n cu primele n * n numere:</h4>

    <form class="form" function_name="ex_2" action="controller.php" method="POST">
        <input type="hidden" name="function_name" value="ex_2">
        <label for="rows_columns">Nr. de randuri si coloane:</label>
        <input type="number" id="rows_columns" min="0" max="1000" name="rows_columns">
        <br>
        <button type="submit">Calculate</button>
    </form>

    <pre id="ex_2_container"></pre>

    <h4>5. Declarați un tablou bidimensional m, n. Afișați tabloul în pagină. Elaborați o funcție care va mări elementele unei linii cu 10 și va afișa în pagină tabloul.</h4>

    <form class="form" function_name="ex_5" action="controller.php" method="POST">
        <input type="hidden" name="function_name" value="ex_5">
        <label for="rows">Nr. de randuri:</label>
        <input type="number" id="rows" min="0" max="1000" name="rows">
        <br>
        <label for="columns">Nr. de coloane:</label>
        <input type="number" id="columns" min="0" max="1000" name="columns">
        <br>
        <label for="col">De marit linia x cu 10:</label>
        <input type="number" id="col" min="0" max="1000" name="col">
        <br>
        <button type="submit">Calculate</button>
    </form>

    <pre id="ex_5_container"></pre>

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