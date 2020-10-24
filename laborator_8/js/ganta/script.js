// Ex.1
// Lists Operations
function getItemsByText(text) {
  return [...document.querySelectorAll("li")].filter((item) => {
    return item.innerText == text;
  });
}

function appendItemToList(item, list) {
  document.getElementById(list).innerHTML += `<li>${item}</li>`;
}

function replaceItemWithNew(old_item, new_item) {
  getItemsByText(old_item).forEach((item) => {
    item.innerHTML = new_item;
  });
}

function removeItemByKey(key) {
  document.querySelectorAll("li")[--key].remove();
}

function removeItemByText(item) {
  getItemsByText(item).forEach((item) => {
    item.remove();
  });
}

// Forms Submits
function itemToList(form, event) {
  event.preventDefault();

  var item = form.elements.namedItem("item").value;
  var list = form.elements.namedItem("list").value;

  if (item == "" || list == "") return;

  appendItemToList(item, list);
}

function replaceItem(form, event) {
  event.preventDefault();

  var new_item = form.elements.namedItem("new_item").value;
  var old_item = form.elements.namedItem("old_item").value;

  if (new_item == "" || old_item == "") return;

  replaceItemWithNew(old_item, new_item);
}

function removeItem(form, event) {
  event.preventDefault();

  var key = form.elements.namedItem("key").value;
  var item = form.elements.namedItem("item").value;

  if (key && !item) removeItemByKey(key);
  if (item && !key) removeItemByText(item);
}

// Ex.2
const is_null = (variable) => variable == null;
const is_empty = (variable) =>
  variable == null || variable == undefined || variable == "";

const keys = {
  paragraph: ["text", "color", "size"],
  img: ["src", "width", "height"],
  list: ["item1", "item2", "item3", "item4", "item5"],
};

function get(form, selected) {
  var data = {};
  data["data"] = selected;

  keys[selected].forEach((item) => {
    data[item] = form.elements.namedItem(`${selected}_${item}`).value;
  });

  return data;
}

function resetResults() {
  [...document.getElementsByClassName("result")].forEach((item) =>
    item.remove()
  );
}

function ex2Form(form, event) {
  event.preventDefault();
  resetResults();

  var my_select = form.elements.namedItem("my_select").value;
  var data = get(form, my_select) || null;
  var stop = false;

  if (!is_null(data))
    Object.entries(data).forEach(
      ([key, value]) => (stop = key != "data" && is_empty(value) ? true : false)
    );
  else return;

  if (stop === true) return;

  switch (data.data) {
    case "paragraph":
      var html = `<div class="result" style="margin: 2rem 0;"><p style="color: ${data.color}; font-size: ${data.size}">${data.text}</p></div>`;
      document.getElementById(data.data).innerHTML += html;
      break;

    case "img":
      var html = `<div class="result" style="margin: 2rem 0;"><img src="${data.src}" width="${data.width}" height="${data.height}"></div>`;
      document.getElementById(data.data).innerHTML += html;
      break;

    case "list":
      var html = `<div class="result" style="margin: 2rem 0;"><ol>`;

      Object.entries(data).forEach(
        ([key, value]) => (html += key != "data" ? `<li>${value}</li>` : "")
      );

      html += "</ol></div>";

      document.getElementById(data.data).innerHTML += html;
      break;

    default:
      return;
      break;
  }
}

function ex2Select(select) {
  [...document.getElementsByClassName("input_groups")].forEach((item) => {
    item.style.display = "none";
  });

  document.getElementById(select.value).style.display = "block";
}

// Ex.3
function ex3Form(form, event) {
  event.preventDefault();

  var styles = form.elements.namedItem("styles").value;

  document.getElementById("style").setAttribute("style", styles.trim());
}
