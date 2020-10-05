const intersect = function(a, b) {
    var setB = new Set(b);
    return [...new Set(a)].filter(x => setB.has(x));
}

const diff = function(a, b) {
    return a.filter(x => !b.includes(x));
}

$(".slick").slick({
    arrows: false,
});

function changeSlide() {
  $(".slick").slick("slickNext");
}

function removeSlider() {
  $(".slick").remove();
}

$(".slick").submit(function (event) {
  event.preventDefault();
    var questions = [
        {
            question: "Care este anul aparitiei primului computer commercial?",
            type: "select",
            answers: [
                "1920",
                "1890",
                "1950",
                "1998"
            ],
            right_answers: [2]
            },
        {
            question: "Cind Japonia a lansat primul computer denumit NEAC 1101?",
            type: "radio",
            answers: [
                "1959 - Japonia lanseaza si ea primul sau computer",
                "1958 - Japonia lanseaza si ea primul sau computer, denumit NEAC 1101",
                "1955 - Japonia lanseaza si ea primul sau computer"
            ],
            right_answers: [1]
        },
        {
            question: "In ce an apare primul PowerMac G4/AMD Athlon 750 MHz?",
            type: "radio",
            answers: [
                "1999 - Apare PowerMac G4/AMD Athlon 750 MHz",
                "2000 - Apare PowerMac G4/AMD Athlon 750 MHz"
            ],
            right_answers: [0]
        },
        {
            question: "Cind lanseaza primul  smarthphone BlackBerry?",
            type: "radio",
            answers: [
                "2000 - RIM lanseaza primul smarthphone",
                "2002 - RIM lanseaza primul smarthphone BlackBerry",
                "2001 - RIM lanseaza primul smarthphone BlkBerDy"
            ],
            right_answers: [1]
        },
        {
            question: "In ce an Intel si AMD elaboreaza primul lor dual-core 64-bit, in timp ce Microsoft creeaza primul Xbox 360?",
            type: "select",
            answers: [
                "2003",
                "2004",
                "2005",
                "2006",
                "2007",
                "2008"
            ],
            right_answers: [2]
        },
        {
            question: "In ce an Apple lanseaza primul iPhone?",
            type: "check",
            answers: [
                "2006",
                "2007",
                "2008"
            ],
            right_answers: [1]
        },
        {
            question: "Cind Mac OSX/Windows XP/Linux 2.4.0 isi face  prezenta?",
            type: "check",
            answers: [
                "2001 - Mac OSX/Windows XP/Linux 2.4.0 isi face simtita prezenta, cu noua sa tripla versiune operativa",
                "2000 - Mac OSX/Windows XP/Linux 2.4.4",
                "2004 - Mac OSX/Windows XP"
            ],
            right_answers: [0]
        },
        {
            question: "In ce a fost fondata compania Hewlett Packard?",
            type: "check",
            answers: [
                "1956",
                "1940",
                "1944",
                "1939"
            ],
            right_answers: [3]
        },
        {
            question: "Cel mai scump Laptop din lume ?",
            type: "select",
            answers: [
                "500 EUR",
                "2000 EUR",
                "5000 EUR",
                "50000 EUR",
            ],
            right_answers: [3]
        },
        {
            question: "Care sunt cele mai Mari Companii care fac telefoane mobile din 2020?",
            type: "check",
            answers: [
                "Apple",
                "Samsung",
                "LG",
                "Huawei",
                "Nokia",
                "Xiaomi"
            ],
            right_answers: [0, 1, 3, 5]
        },
        {
            question: "Cind Compania Xiaomi a lansat primul lelefon mobil?",
            type: "radio",
            answers: [
                "2009",
                "2012",
                "2010",
                "2011",
                "2014"
            ],
            right_answers: [2]
        },
    ];

    var answers = [];

    for (let i = 0; i < questions.length; i++) {
        if ($("[type='radio'][name='question_" + i + "']").length > 0) answers[i] = parseInt($('input[type="radio"][name="question_' + i + '"]:checked').val());
        else if ($('input[type="checkbox"][name="question_' + i + '[]"]:checked').length > 0) {
            answers[i] = $('input[type="checkbox"][name="question_' + i + '[]"]:checked').toArray().map(function (item) {
                return parseInt($(item).val());
            });
        } else answers[i] = parseInt($("[name='question_" + i + "']").val());
    }

    console.log(answers);
    var show = [];
    var right_answers = 0;
    var wrong_answers = [];

    answers.forEach((answer, key) => {
        var question = questions[key];
        var right_answers_temp = question["right_answers"].map(value => ($.isNumeric(value) ? value + 1 : value)).join(", ");

        if (typeof answer == "number") {
            if ($.inArray(answer, question["right_answers"]) > -1) {
                right_answers++;
            } else {
                wrong_answers.push(`<li>Ai gresit raspunsul la intrebarea ${key + 1}, raspunsul corect este ${right_answers_temp}</li>`);
            }
        }
        
        if (typeof answer == "object") {
            var right = intersect(answer, question["right_answers"]);
            var wrong = diff(answer, question["right_answers"]);

            if (right.length > 0) {
                if (wrong.length == 0) right_answers++;
                else if (right.length == question["right_answers"].length) {
                    wrong_answers.push(`<li>Ai ales ${right.length} puncte corecte la intrebarea ${key + 1}, dar ai gresit alegand celelalte raspunsuri. Raspunsul corect este ${right_answers_temp}</li>`);
                } else {
                    wrong_answers.push(`<li>Ai ales ${right.length} puncte corecte la intrebarea ${key + 1}, dar ai scapat urmatoarele: ${right_answers_temp}</li>`);
                }
            } else {
                wrong_answers.push(`<li>Ai gresit raspunsul la intrebarea ${key + 1}, raspunsul corect este ${right_answers_temp}</li>`);
            }
        }
    });



    show.push(`<ul>${(wrong_answers.length > 0 ? wrong_answers.join(" ") : "Felicitari")}</ul>`);
    show.push(`<ol>${questions.map(value => {
        return `<li><h4>${value["question"]}</h4><ul>${value["answers"].map(_value => (`<li>${_value}</li>`)).join("")}</ul></li>`;
    }).join("<br>")}</ol>`);
    show.push(`<h2>${right_answers} / ${questions.length}</h2>`);

    removeSlider();
    $("body").append(show.reverse().join(" "));
});
