$("#put").bind("input propertychange", function (e) {
  let name = e.target.value;
  if (name == "") {
    document.getElementById("content").innerText = "";
  }
  let template = ``;
  $.ajax({
    url: `search.php?name=${name}`,
    success: function (result) {
      let data = JSON.parse(result);
      data.forEach((item) => {
        template += `
          <li onclick="showId(${item.uuid},'${item.uuid}')">${item.name}</li>
         `;
      });
      document.getElementById("ul-list").innerHTML = template;
    },
  });
});

function showId(id, name) {
  document.getElementById("content").innerText = id;
  document.querySelector(".form-control").value = name;
  document.getElementById("ul-list").innerHTML = "";
}

$("#put2").bind("input propertychange", function (e) {
  let name = e.target.value;
  if (name == "") {
    document.getElementById("content2").innerText = "";
  }
  let template = ``;
  $.ajax({
    url: `asearch.php?name=${name}`,
    success: function (result) {
      let data = JSON.parse(result);
      data.forEach((item) => {
        template += `
          <li onclick="showId2(${item.uuid},'${item.uuid}')">${item.name}</li>
         `;
      });
      document.getElementById("ul-list2").innerHTML = template;
    },
  });
});

function showId2(id, name) {
  document.getElementById("content2").innerText = id;
  document.querySelector("#put2").value = name;
  document.getElementById("ul-list2").innerHTML = "";
}

$("#put3").bind("input propertychange", function (e) {
  let name = e.target.value;
  if (name == "") {
    document.getElementById("content3").innerText = "";
  }
  let template = ``;
  $.ajax({
    url: `bsearch.php?name=${name}`,
    success: function (result) {
      let data = JSON.parse(result);
      data.forEach((item) => {
        template += `
          <li onclick="showId3(${item.uuid},'${item.uuid}')">${item.name}</li>
         `;
      });
      document.getElementById("ul-list3").innerHTML = template;
    },
  });
});

function showId3(id, name) {
  document.getElementById("content3").innerText = id;
  document.querySelector("#put3").value = name;
  document.getElementById("ul-list3").innerHTML = "";
}

$("#put4").bind("input propertychange", function (e) {
  let name = e.target.value;
  if (name == "") {
    document.getElementById("content4").innerText = "";
  }
  let template = ``;
  $.ajax({
    url: `csearch.php?name=${name}`,
    success: function (result) {
      let data = JSON.parse(result);
      data.forEach((item) => {
        template += `
          <li onclick="showId4(${item.uuid},'${item.uuid}')">${item.name}</li>
         `;
      });
      document.getElementById("ul-list4").innerHTML = template;
    },
  });
});

function showId4(id, name) {
  document.getElementById("content4").innerText = id;
  document.querySelector("#put4").value = name;
  document.getElementById("ul-list4").innerHTML = "";
}
