<?php
$questions = [
    [
        "question" => "Se permite circulaţia (exploatarea) pe drumul public a autovehiculului cu instalaţia de iluminare defectată?",
        "type" => "select",
        "answers" => [
            "da",
            "da, deoarece drumul pe care se circulă este iluminat",
            "nu"
        ],
        "right_answers" => [2]
    ],
    [
        "question" => "Autovehiculele şi remorcile pot circula pe drumurile publice dacă:",
        "type" => "radio",
        "answers" => [
            "corespund actelor normative privind siguranţa traficului rutier",
            "au un aspect exterior plăcut",
            "au o greutate mai mare, decât masa maximă autorizată"
        ],
        "right_answers" => [0]
    ],
    [
        "question" => "Când se interzice exploatarea vehiculelor dacă aţi depistat defecţiuni la sistemul de frânare?",
        "type" => "check",
        "answers" => [
            "nu funcţionează semnalul de control al frânei de mână",
            "este defectat sau eficienţa acestuia nu corespunde cerinţelor standardelor în vigoare",
            "este mic jocul pedalei frânei",
            "este modificată construcţia sistemului de frânare, subansamblurile sau piesele nu corespund modelului vehiculului în cauză, precum şi exigenţelor întreprinderii producătoare"
        ],
        "right_answers" => [1, 3]
    ],
    [
        "question" => "Se interzice deplasarea ulterioară a vehiculelor dacă:",
        "type" => "check",
        "answers" => [
            "nu funcţionează farurile şi lanternele de gabarit din spate",
            "nu funcţionează sistemul de direcţie",
            "nu funcţionează dispozitivele de ştergere, de spălare şi dezaburire a parbrizului din partea conducătorului",
            "nu funcţionează frâna de serviciu şi/sau autovehiculul prezintă scurgeri de carburanţi"
        ],
        "right_answers" => [1, 3]
    ],
    [
        "question" => "Care este înălţimea reziduală minimă permisă a profilului benzii de rulare a pneurilor autoturismului?",
        "type" => "select",
        "answers" => [
            "0,8 mm",
            "1,0 mm",
            "1,6 mm",
            "2,0 mm"
        ],
        "right_answers" => [2]
    ],
    [
        "question" => "Este permisă montarea altui dispozitiv de semnalizare sonoră decât cel revăzut prin construcţie de către proprietarul autovehiculului?",
        "type" => "radio",
        "answers" => [
            "nu",
            "da"
        ],
        "right_answers" => [0]
    ]
];

?>

<form action="check.php" method="get">
    <?php foreach ($questions as $key => $question) : ?>
        <h4><?php echo $question["question"]; ?></h4>

        <?php if ($question["type"] === "select") : ?>
            <select name="answers[<?php echo $key; ?>]">
            <?php endif; ?>

            <?php foreach ($question["answers"] as $_key => $answer) : ?>
                <?php if ($question["type"] === "radio") : ?>
                    <input type="radio" id="" name="answers[<?php echo $key; ?>]" value="<?php echo $_key; ?>">
                    <label for="<?php echo $key; ?>_<?php echo $_key; ?>"><?php echo $answer; ?></label>
                    <br>
                <?php endif; ?>

                <?php if ($question["type"] === "check") : ?>
                    <input type="checkbox" name="answers[<?php echo $key; ?>][]" value="<?php echo $_key; ?>">
                    <label for="<?php echo $key; ?>_<?php echo $_key; ?>"><?php echo $answer; ?></label>
                    <br>
                <?php endif; ?>

                <?php if ($question["type"] === "select") : ?>
                    <option value="<?php echo $_key; ?>"><?php echo $answer; ?></option>
                <?php endif; ?>
            <?php endforeach; ?>

            <?php if ($question["type"] === "select") : ?>
            </select>
        <?php endif; ?>

        <br>
    <?php endforeach; ?>

    <br>
    <button type="submit">Trimite</button>
</form>