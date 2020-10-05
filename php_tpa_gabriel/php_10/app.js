var forms = document.querySelectorAll(".form");

forms.forEach((form) => {
  form.onsubmit = async function (event) {
    event.preventDefault();
    let action = form.getAttribute("action");
    let method = form.getAttribute("method");
    let function_name = form.getAttribute("function_name");
    let body = new FormData(form);

    // console.log(form.elements);

    console.log(...body);

    let response = await fetch(action, {
      method: method,
      body: body,
      headers: {
        function_name,
      },
    });

    response
      .json()
      .then((res) => {
        document.getElementById(`${function_name}_container`).innerHTML = "";
        for (const [key, value] of Object.entries(res)) {
          let html = `<strong>${value.title}: </strong>`;
          switch (typeof value.value) {
            case "number":
              html += value.value;
              break;
            case "string":
              html += value.value;
              break;

            case "object":
              html += "<br/>";
              for (const [_key, _value] of Object.entries(value.value)) {
                html += `${_value}, `;
              }

            default:
              break;
          }
          html += "<br/>";
          document.getElementById(
            `${function_name}_container`
          ).innerHTML += html;
        }
        if (res.errors === undefined)
          form.innerHTML = '<a href="">Try again</a>';
      })
      .catch((err) => {
        console.log(err);
      });
  };
});

window.onload = async (event) => {
  await fetch("controller.php", {
    method: "get",
    cache: "no-cache",
    headers: {
      function_name: "getQuestions",
    },
  })
    .then((body) => body.json())
    .then((response) => {
      console.log(response);
      let html = "";

      if (typeof response === "array" || typeof response === "object") {
        response
          .map((a) => ({ sort: Math.random(), value: a }))
          .sort((a, b) => a.sort - b.sort)
          .map((a) => a.value)
          .forEach((item) => {
            html += `
                        <div class="question" data-question_id="${
                          item.id
                        }" style="margin-bottom: 40px;">
                            <h4 style="margin-bottom: 5px;">${
                              item.question
                            }</h4>
                            ${
                              item.description !== undefined
                                ? '<p style="margin-top: 5px;">' +
                                  item.description +
                                  "</p>"
                                : ""
                            }
                            <div class="question_answers">`;

            if (item.type === "text")
              html += `<input type="text" name="question_${item.id}[answer]">`;

            if (item.type === "select")
              html += `<select name="question_${item.id}[answer]">`;

            item.options
              .map((a) => ({ sort: Math.random(), value: a }))
              .sort((a, b) => a.sort - b.sort)
              .map((a) => a.value)
              .forEach((_item) => {
                switch (item.type) {
                  case "radio":
                    html += `<input type="radio" id="question_${item.id}_${_item.id}" name="question_${item.id}[answer]" class="input" value="${_item.id}"><label for="question_${item.id}_${_item.id}">${_item.title}</label></br>`;
                    break;
                  case "checkbox":
                    html += `<input type="checkbox" id="question_${item.id}_${_item.id}" name="question_${item.id}[answers][]" class="input" value="${_item.id}"><label for="question_${item.id}_${_item.id}">${_item.title}</label></br>`;
                    break;
                  case "select":
                    html += `<option value="${_item.id}">${_item.title}</option>`;
                    break;
                }
              });

            if (item.type === "select") html += `</select>`;

            html += "</div></div>";
          });

        document.getElementById("questions").innerHTML = html;
      }
    })
    .catch((error) => console.log(error));
};
