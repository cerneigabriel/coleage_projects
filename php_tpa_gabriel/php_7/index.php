<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laborator 4</title>
</head>

<body>
    <h1>Laborator 4</h1>
    <hr>

    <h4>3. Declarați un tablou unidimensional de n numere întregi (0 &#60; n &#60; 1000). Creați funcții care vor afișa toate elementele tabloului, dubla elemntele pare ale tabloului, iar cele impare se vor tripla. Afișați tabloul modificat.</h4>

    <form class="form" function_name="ex_3" action="controller.php" method="POST">
        <input type="hidden" name="function_name" value="ex_3">
        <label for="number">Number</label>
        <input type="number" id="number" min="0" max="1000" name="number">
        <br>
        <button type="submit">Calculate</button>
    </form>

    <pre id="ex_3_container"></pre>

    <h4>6. Declarați un tablou unidimensional de n numere întregi (0 &#60; n &#60; 1000). Creați funcții care vor afișa toate elementele tabloului, apoi se vac rea un nou tablou care va fi format numai din elementele tabloului initial care au exact cel puțin 3 divizori. Afișați tabloul nou creat.</h4>

    <form class="form" function_name="ex_6" action="controller.php" method="POST">
        <input type="hidden" name="function_name" value="ex_6">
        <label for="number">Number</label>
        <input type="number" id="number" min="0" max="1000" name="number">
        <br>
        <button type="submit">Calculate</button>
    </form>

    <pre id="ex_6_container"></pre>

    <h4>9. Declarați un tablou unidimensional de n numere întregi (0 &#60; n &#60; 1000). Creați funcții care:</h4>

    <form class="form" function_name="ex_9" action="controller.php" method="POST">
        <input type="hidden" name="function_name" value="ex_9">
        <label for="number">Number</label>
        <input type="number" id="number" min="0" max="1000" name="number">
        <br>
        <button type="submit">Calculate</button>
    </form>

    <pre id="ex_9_container"></pre>

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