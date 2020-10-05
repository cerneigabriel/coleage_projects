<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h3>3. Să se definească funcțiile max&#10098;a,b&#10099; și min&#10098;a,b&#10099;, care returnează respectiv cel mai mare și cel mai mic dintre numerele reale a și b, apoi să se calculeze valoarea expresiei:</h3>
    <ol type="A">
        <li>
            <h5>S = max&#10098;min&#10098;𝑎1, 𝑎2&#10099;,max&#10098;𝑎3, 𝑎4&#10099;&#10099;+min&#10098;max&#10098;𝑎5, 𝑎6&#10099;,min&#10098;𝑎7, 𝑎8&#10099;&#10099;, unde 𝑎1, 𝑎2, … , 𝑎8 sunt numere reale date;</h5>
            <hr>
            <form class="form" function_name="ex_3_a" action="controller.php" method="POST">
                <input type="hidden" name="function_name" value="ex_3_a">
                <label for="a1">A1</label>
                <input type="number" step=any id="a1" name="a[]" min="0" max="100000" required>
                <br>
                <label for="a2">A2</label>
                <input type="number" step=any id="a2" name="a[]" min="0" max="100000" required>
                <br>
                <label for="a3">A3</label>
                <input type="number" step=any id="a3" name="a[]" min="0" max="100000" required>
                <br>
                <label for="a4">A4</label>
                <input type="number" step=any id="a4" name="a[]" min="0" max="100000" required>
                <br>
                <label for="a5">A5</label>
                <input type="number" step=any id="a5" name="a[]" min="0" max="100000" required>
                <br>
                <label for="a6">A6</label>
                <input type="number" step=any id="a6" name="a[]" min="0" max="100000" required>
                <br>
                <label for="a7">A7</label>
                <input type="number" step=any id="a7" name="a[]" min="0" max="100000" required>
                <br>
                <label for="a8">A8</label>
                <input type="number" step=any id="a8" name="a[]" min="0" max="100000" required>
                <br>
                <button type="submit">Calculate</button>
            </form>

            <div id="ex_3_a_container"></div>
        </li>
        <li>
            <h5>T = min&#10098;𝑎1, 𝑎2&#10099;+min&#10098;𝑎3, 𝑎4&#10099;+...+min&#10098;𝑎9, 𝑎10&#10099;+max&#10098;𝑎1, 𝑎2&#10099;+max&#10098;𝑎3, 𝑎4&#10099;+...+max&#10098;𝑎9, 𝑎10&#10099; unde 𝑎1, 𝑎2, … , 𝑎10 sunt numere reale date.</h5>
            <hr>
            <form class="form" function_name="ex_3_b" action="controller.php" method="POST">
                <input type="hidden" name="function_name" value="ex_3_b">
                <label for="a1">A1</label>
                <input type="number" step=any id="a1" name="a[]">
                <br>
                <label for="a2">A2</label>
                <input type="number" step=any id="a2" name="a[]">
                <br>
                <label for="a3">A3</label>
                <input type="number" step=any id="a3" name="a[]">
                <br>
                <label for="a4">A4</label>
                <input type="number" step=any id="a4" name="a[]">
                <br>
                <label for="a5">A5</label>
                <input type="number" step=any id="a5" name="a[]">
                <br>
                <label for="a6">A6</label>
                <input type="number" step=any id="a6" name="a[]">
                <br>
                <label for="a7">A7</label>
                <input type="number" step=any id="a7" name="a[]">
                <br>
                <label for="a8">A8</label>
                <input type="number" step=any id="a8" name="a[]">
                <br>
                <label for="a9">A9</label>
                <input type="number" step=any id="a9" name="a[]">
                <br>
                <label for="a10">A10</label>
                <input type="number" step=any id="a10" name="a[]">
                <br>
                <button type="submit">Calculate</button>
            </form>

            <div id="ex_3_b_container"></div>
        </li>
    </ol>

    <h4>4. Se dă o mulțime de puncte în plan. Să se calculeze ce mai mică distanță dintre oricare 2 puncte posibile.</h4>
    <form class="form" function_name="ex_4" action="controller.php" method="POST">
        <input type="hidden" name="function_name" value="ex_4">
        <label for="x1">x1</label>
        <input type="number" step=any id="x1" name="x1">
        <br>
        <label for="y1">y1</label>
        <input type="number" step=any id="y1" name="y1">
        <br>
        <label for="x2">x2</label>
        <input type="number" step=any id="x2" name="x2">
        <br>
        <label for="y2">y2</label>
        <input type="number" step=any id="y2" name="y2">
        <br>
        <button type="submit">Calculate</button>
    </form>

    <div id="ex_4_container"></div>

    <h4>7. De la tastatură se citesc două numere întregi. Elaborați un program cu funcții prin intermediul căruia se va determina:</h4>

    <form class="form" function_name="ex_7" action="controller.php" method="POST">
        <input type="hidden" name="function_name" value="ex_7">
        <label for="number_1">Nmber 1</label>
        <input type="number" id="number_1" name="number_1">
        <br>
        <label for="number_2">Number 2</label>
        <input type="number" id="number_2" name="number_2">
        <br>
        <button type="submit">Calculate</button>
    </form>

    <div id="ex_7_container"></div>

    <h4>12. Să se definească un subprogram care va:</h4>

    <ol type="A">
        <li>
            <h5>Aduna o dată calendaristică (o dată calendaristică este exprimată de un triplet de forma (zi, luna, an)) cu un număr de zile, rezultatul fiind o dată calendaristică;</h5>
            <hr>
            <form class="form" function_name="ex_12_a" action="controller.php" method="POST">
                <input type="hidden" name="function_name" value="ex_12_a">
                <label for="date">Data</label>
                <input type="date" id="date" name="date">
                <br>
                <label for="add_days">Aduna un numar de zile</label>
                <input type="number" id="add_days" name="add_days" min="0" required>
                <br>
                <button type="submit">Calculate</button>
            </form>

            <div id="ex_12_a_container"></div>
        </li>
        <li>
            <h5>Aduna o dată calendaristică cu un număr de luni, rezultatul fiind o dată calendaristică;</h5>
            <hr>
            <form class="form" function_name="ex_12_b" action="controller.php" method="POST">
                <input type="hidden" name="function_name" value="ex_12_b">
                <label for="date">Data</label>
                <input type="date" id="date" name="date">
                <br>
                <label for="add_months">Aduna un numar de luni</label>
                <input type="number" id="add_months" name="add_months" min="0" required>
                <br>
                <button type="submit">Calculate</button>
            </form>

            <div id="ex_12_b_container"></div>
        </li>
        <li>
            <h5>Scădea dintr-o dată calendaristică un număr de zile, rezultatul fiind o dată calendaristică;</h5>
            <hr>
            <form class="form" function_name="ex_12_c" action="controller.php" method="POST">
                <input type="hidden" name="function_name" value="ex_12_c">
                <label for="date">Data</label>
                <input type="date" id="date" name="date">
                <br>
                <label for="remove_days">Scade un numar de zile</label>
                <input type="number" id="remove_days" name="remove_days" min="0" required>
                <br>
                <button type="submit">Calculate</button>
            </form>

            <div id="ex_12_c_container"></div>
        </li>
        <li>
            <h5>Scădea dintr-o dată calendaristică un număr de luni, rezultatul fiind o dată calendaristică;</h5>
            <hr>
            <form class="form" function_name="ex_12_d" action="controller.php" method="POST">
                <input type="hidden" name="function_name" value="ex_12_d">
                <label for="date">Data</label>
                <input type="date" id="date" name="date">
                <br>
                <label for="remove_months">Scade un numar de luni</label>
                <input type="number" id="remove_months" name="remove_months" min="0" required>
                <br>
                <button type="submit">Calculate</button>
            </form>

            <div id="ex_12_d_container"></div>
        </li>
        <li>
            <h5>Scădea două date calendaristice, rezultatul fiind numărul de zile dintre aceste date.</h5>
            <hr>
            <form class="form" function_name="ex_12_e" action="controller.php" method="POST">
                <input type="hidden" name="function_name" value="ex_12_e">
                <label for="date_1">Scade datile</label>
                <input type="date" id="date_1" name="date_1">
                <span> - </span>
                <input type="date" id="date_2" name="date_2">
                <br>
                <button type="submit">Calculate</button>
            </form>

            <div id="ex_12_e_container"></div>
        </li>
    </ol>


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